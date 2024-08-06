<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\User;

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

    //use AuthenticatesUsers;
    use AuthenticatesUsers {                                        logout as performLogout;                            
    } 

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/user/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest:user')->except('logout');
        
    }
    
    protected function guard()                              //追記
    {                                                       //追記
        return Auth::guard('user');                        //追記
    }  

    
    public function logout(Request $request)                //追記
    {                                                       //追記
        $this->performLogout($request);                     //追記
        return redirect('user/login');                     //追記
    } 
}
