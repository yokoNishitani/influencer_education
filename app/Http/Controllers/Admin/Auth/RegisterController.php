<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

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

<<<<<<< HEAD
    use RegistersUsers;
=======
    use RegistersAdmins;
>>>>>>> d617656c259657ce65326b22ad36d8bf43685aff

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
<<<<<<< HEAD
    protected $redirectTo = '/admin/top';
=======
    protected $redirectTo = '/admin/home';
>>>>>>> d617656c259657ce65326b22ad36d8bf43685aff

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest:admin');
    }

    protected function guard()
    {
        return Auth::guard('admin');
    }

<<<<<<< HEAD
    public function showRegisterForm()
    {
        return view('admin.auth.register');
    }

=======
>>>>>>> d617656c259657ce65326b22ad36d8bf43685aff
    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
<<<<<<< HEAD
            'kana' => ['required', 'katakana', 'max:255'],
=======
>>>>>>> d617656c259657ce65326b22ad36d8bf43685aff
            'email' => ['required', 'string', 'email', 'max:255', 'unique:admins'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\Admin
     */
    protected function create(array $data)
    {
        return Admin::create([
            'name' => $data['name'],
<<<<<<< HEAD
            'kana' => $data['kana'],
=======
>>>>>>> d617656c259657ce65326b22ad36d8bf43685aff
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }
}
