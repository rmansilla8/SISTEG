<?php

namespace IntelGUA\Sisteg\Http\Controllers\Auth;

use IntelGUA\Sisteg\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

use Illuminate\Http\Request;

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

    use AuthenticatesUsers;


    protected function credentials(Request $request)
    {
        $request['status'] = 1;
        return $request->only($this->username(), 'password', 'status');
    }
    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    // protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    // public function redirectTo()
    // {
    //     if (\Auth::user()->rol == 'administrador' || \Auth::user()->rol == 'registrador' || \Auth::user()->rol == 'finanzas') {
    //         return '/home';
    //     } else {
    //         return '/';
    //     }
    // }
}
