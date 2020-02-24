<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

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
    protected $redirectTo = '/home';

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
        $messages = [
            'username.unique'   =>  'El Nombre de Usuario :input ya está en uso. Prueba agregando números.',
            'email.unique'      =>  'El correo electrónico :input ya se encuentra registrado.'
        ];

        return Validator::make($data, [
            'fullname'  =>  ['required', 'string', 'min:10', 'max:255'],
            'username'  =>  ['required', 'string', 'min:5', 'max:25', 'unique:users', 'alpha_num'],
            'email'     =>  ['required', 'string', 'email', 'min:10', 'max:255', 'unique:users'],
            'password'  =>  ['required', 'string', 'min:7', 'confirmed'],
            'password_confirmation'  =>  ['required', 'string', 'min:7'],
        ], $messages);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            'username'  =>  $data['username'],
            'email'     =>  $data['email'],
            'fullname'  =>  $data['fullname'],
            'password'  =>  Hash::make($data['password']),
        ]);
    }
}
