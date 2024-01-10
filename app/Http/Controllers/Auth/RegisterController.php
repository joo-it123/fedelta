<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

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
<<<<<<< HEAD
    protected $redirectTo = '/login';
=======
    // protected $redirectTo = RouteServiceProvider::HOME;
    protected $redirectTo = 'login';
>>>>>>> 49d5b26f76c9414c5c664dcc334c8910e1fdb7a1

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
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
<<<<<<< HEAD
            'name' => ['required', 'string', 'max:255'],
=======
            'name' => ['required', 'string', 'max:255', 'regex:/^(?![\s　]+$)[^\s　]/u'],
>>>>>>> 49d5b26f76c9414c5c664dcc334c8910e1fdb7a1
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
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
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }
<<<<<<< HEAD
=======

    protected function redirectTo()
{
    return '/login'; // リダイレクト先をログインページに変更
}
>>>>>>> 49d5b26f76c9414c5c664dcc334c8910e1fdb7a1
}
