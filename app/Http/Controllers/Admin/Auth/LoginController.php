<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
<<<<<<< HEAD
use Illuminate\Http\Request;
=======
>>>>>>> d617656c259657ce65326b22ad36d8bf43685aff

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

<<<<<<< HEAD
  
    public function showLoginForm()
    {
        return view('admin.auth.login');
    }

=======
>>>>>>> d617656c259657ce65326b22ad36d8bf43685aff
    //use AuthenticatesUsers;
    use AuthenticatesUsers {
        logout as performLogout;
    }  

    /**
     * Where to redirect users after login.
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
        $this->middleware('guest:admin')->except('logout');
        //$this->middleware('auth')->only('logout');
    }

    protected function guard()
    {
        return Auth::guard('admin');
    }

    public function logout(Request $request)
    {
        $this->performLogout($request);
<<<<<<< HEAD
        return redirect('admin/auth/login');
=======
        return redirect('admin/login');
>>>>>>> d617656c259657ce65326b22ad36d8bf43685aff
    }    
}
