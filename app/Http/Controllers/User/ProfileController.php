<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\ProfileRequest;
use App\Http\Requests\PasswordEditRequest;
use Illuminate\Support\Facades\DB;

class ProfileController extends Controller
{
    //プロフィール画面表示
    public function showProfileForm() {
        $user = Auth::user();

        if (!$user->profile_image) {
            $user->profile_image = 'storage/images/profile/no_image.jpg';
        }

        return view('user.profile_edit', ['user' => $user]);
    }

    //プロフィール編集
    public function showProfileEdit(ProfileRequest $request) {
        DB::beginTransaction();
        try {
        /** @var User $user */

            $user = Auth::user();

            $user->name = $request->name;
            $user->name_kana = $request->name_kana;
            $user->email = $request->email;

            if ($request->hasFile('profile_image')) {
                $file = $request->file('profile_image');
                $fileName = $file->getClientOriginalName();
                $file->storeAs('public/images/profile', $fileName);
                $user->profile_image = 'storage/images/profile/' . $fileName;
            } else {
                if (!$user->profile_image || $user->profile_image === 'storage/images/profile/no_image.jpg') {
                    $user->profile_image = 'storage/images/profile/no_image.jpg';
                }
            }

            $user->save();
            DB::commit();
            return redirect()->route('user.show.profile', ['user' => $user])
            ->with('status', '登録できました');
        } catch (\Exception $e) {
            DB::rollBack();
            return back();
        }
    }

    //パスワード編集画面表示
    public function showPasswordForm() {
        return view('user.password_edit');
    }

    //パスワード編集
    public function showPasswordEdit(PasswordEditRequest $request) {
        $user = Auth::user();

        if (!Hash::check($request->current_password, $user->password)) {
            return back();
        }

        $user->password = Hash::make($request->new_password);
        /** @var User $user */

        try {
            $user->save();
        } catch (\Exception $e) {
            return back();
        }

        return redirect()->route('user.show.profile');
    }
}
