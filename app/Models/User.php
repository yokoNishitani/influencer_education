<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function grade() {
        return $this->belongsTo(Grade::class);
    }

    public function classesClearChecks() {
        return $this->hasMany(ClassesClearCheck::class, 'users_id');
    }

    public function checkGradeClearFlg() {
        /** @var User $user */
        $user = Auth::user();

        DB::beginTransaction();
        try {
            $currentGradeCurriculums = Curriculum::where('grade_id', $user->grade_id)->get();

            $allCompleted = $currentGradeCurriculums->every(function ($curriculum) use ($user) {
                return CurriculumProgress::where('users_id', $user->id)
                    ->where('curriculums_id', $curriculum->id)
                    ->value('clear_flg') === 1;
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
    }
}
