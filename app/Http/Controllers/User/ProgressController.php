<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Grade;
use App\Models\Curriculum;
use App\Models\CurriculumProgress;
use App\Models\ClassesClearCheck;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class ProgressController extends Controller
{

    //配信（仮）
    public function showDelivery($curriculumId)
    {
        $curriculum = Curriculum::findOrFail($curriculumId);
        return view('user.delivery', compact('curriculum'));
    }

    //進捗画面表示
    public function showProgress()
    {
        $user = Auth::user();
        $grades = Grade::with(['curriculums' => function ($query) use ($user) {
            $query->leftJoin('curriculum_progress', function ($join) use ($user) {
                $join->on('curriculums.id', '=', 'curriculum_progress.curriculums_id')
                    ->where('curriculum_progress.users_id', '=', $user->id);
            })
                ->select('curriculums.*', 'curriculum_progress.clear_flg');
        }])->orderBy('id')->get();

        if (!$user->profile_image) {
            $user->profile_image = 'storage/images/profile/no_image.jpg';
        }

        return view('user.curriculum_progress', compact('grades', 'user'));
    }

    //進捗〜受講済フラグ、全部の受講済フラグが1になったかの確認
    public function checkCurriculumClearFlg($curriculumId)
    {

        /** @var User $user */
        $user = Auth::user();

        CurriculumProgress::updateOrCreate(
            ['users_id' => $user->id, 'curriculums_id' => $curriculumId],
            ['clear_flg' => 1]
        );

        DB::beginTransaction();
        try {
            $currentGradeCurriculums = Curriculum::where('grade_id', $user->grade_id)->get();

            $curriculumProgresses = CurriculumProgress::where('users_id', $user->id)
                ->whereIn('curriculums_id', $currentGradeCurriculums->pluck('id'))
                ->get()
                ->keyBy('curriculums_id');

            $allCompleted = $currentGradeCurriculums->every(function ($curriculum) use ($curriculumProgresses) {
                return isset($curriculumProgresses[$curriculum->id]) && $curriculumProgresses[$curriculum->id]->clear_flg === 1;
            });

            if ($allCompleted) {
                $nextGrade = Grade::where('id', '>', $user->grade_id)->orderBy('id')->first();

                if ($nextGrade) {
                    $user->grade_id = $nextGrade->id;
                    $user->save();

                    ClassesClearCheck::updateOrCreate(
                        ['users_id' => $user->id, 'grade_id' => $user->grade_id],
                        ['clear_flg' => 1]
                    );
                }
            }

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }
        return redirect()->back();
    }
}
