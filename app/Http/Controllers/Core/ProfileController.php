<?php

namespace App\Http\Controllers\Core;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProfileController extends Controller
{
    protected $entity;

    public function __construct () {
        $this->entity = app(\App\User::class);
    }

    public function index () {
        return view('admin::core.user.profile', [
            'user'  =>  \Auth::user()
        ]);
    }

    public function store (\App\Http\Requests\Core\ProfileUpdateRequest $request, $user) {

        $user = $this->entity->find(\Auth::id());
        $user->username =   $request->username;
        $user->fullname =   $request->fullname;
        $user->email    =   $request->email;
        $user->profile  =   $request->profile;
        $user->save();

        $user->information->facebook    =   $request->facebook;
        $user->information->twitter     =   $request->twitter;
        $user->information->youtube     =   $request->youtube;
        $user->information->linkedin    =   $request->linkedin;
        $user->information->medium      =   $request->medium;
        $user->information->pinterest   =   $request->pinterest;
        $user->information->github      =   $request->github;
        $user->information->codepen     =   $request->codepen;
        $user->information->jsfiddle    =   $request->jsfiddle;
        $user->information->gitlab      =   $request->gitlab;
        $user->information->reddit      =   $request->reddit;
        $user->information->telegram    =   $request->telegram;
        $user->information->whatsapp    =   $request->whatsapp;
        $user->information->content     =   $request->content;
        $user->information->save();

        session()->flash('message', 'Información Actualizado Exitosamente');

        return redirect()->back();
    }

    public function passwordIndex () {
        return view('admin::core.user.password');
    }

    public function passwordStore (\App\Http\Requests\Core\PasswordUpdateRequest $request) {
        $user = $this->entity->find(\Auth::id());
        $user->password = bcrypt($request->password);
        $user->save();

        session()->flash('message', 'Contraseña Actualizada Exitosamente');

        return redirect()->back();
    }
}