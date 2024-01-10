<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
<<<<<<< HEAD
=======
use Illuminate\Support\Facades\Auth;
>>>>>>> 49d5b26f76c9414c5c664dcc334c8910e1fdb7a1

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

=======
    public function redirectPath()
    {
        return '/index'; // ログイン後にリダイレクトされるパス
    }
>>>>>>> 49d5b26f76c9414c5c664dcc334c8910e1fdb7a1
    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
<<<<<<< HEAD
    protected $redirectTo = '/index';
=======
    // protected $redirectTo = RouteServiceProvider::HOME;
    protected $redirectTo = '/index';
    // protected $redirectTo = '/dashboard';

>>>>>>> 49d5b26f76c9414c5c664dcc334c8910e1fdb7a1

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
<<<<<<< HEAD
=======

   

    public function logout()
{
    Auth::logout();
    return redirect('/login');
}


>>>>>>> 49d5b26f76c9414c5c664dcc334c8910e1fdb7a1
}
