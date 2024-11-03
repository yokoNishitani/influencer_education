<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Grade;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/top';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest:user');
    }

    protected function guard()                 
    {                                           
        return Auth::guard('user');           
    }

    public function showRegistrationForm()
    {
        $grades = Grade::all(); // 学年を取得
        return view('user.register', compact('grades'));
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255', new Zenkaku],
            'name_kana' => ['required', 'string', 'max:255', 'regex:/^[\p{Katakana}ー－]+$/u'],
           'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed', ],
        ], [
            'required' => '全ての項目を入力してください。',
            'name_kana.regex' => 'ユーザーネームカナはカタカナで入力してください。',
            'password.confirmed' => 'パスワードと確認用パスワードが一致しません。',
            'email.email' => 'メールアドレスの形式が無効です。',
        ]);
        
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        $defaultGradeId = Grade::first()->id;

        return User::create([
            'name' => $data['name'],
            'name_kana' => $data['name_kana'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }

    protected function registered(Request $request, $user)
    {
        Auth::guard('user')->login($user);
        return redirect()->route('user.login'); // ログイン画面へのリダイレクト
    }
}
