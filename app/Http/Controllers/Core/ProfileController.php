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

        $user           =   $this->entity->find(\Auth::id());
        $user->username =   $request->username;
        $user->photo    =   $request->image;
        $user->fullname =   $request->fullname;
        $user->email    =   $request->email;
        $user->profile  =   $request->profile;
        $user->save();

        if ( $user->information ) {
            $user->information->portlet     =   $request->portlet;
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
        } else {
            $information            =   new \App\Entities\Core\Information();
            $information->user_id   =   $user->id;
            $information->portlet     =   $request->portlet;
            $information->facebook    =   $request->facebook;
            $information->twitter     =   $request->twitter;
            $information->youtube     =   $request->youtube;
            $information->linkedin    =   $request->linkedin;
            $information->medium      =   $request->medium;
            $information->pinterest   =   $request->pinterest;
            $information->github      =   $request->github;
            $information->codepen     =   $request->codepen;
            $information->jsfiddle    =   $request->jsfiddle;
            $information->gitlab      =   $request->gitlab;
            $information->reddit      =   $request->reddit;
            $information->telegram    =   $request->telegram;
            $information->whatsapp    =   $request->whatsapp;
            $information->content     =   $request->content;
            $information->save();
        }

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
