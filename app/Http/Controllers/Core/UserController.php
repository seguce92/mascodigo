<?php

namespace App\Http\Controllers\Core;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Role;
use DB;

class UserController extends Controller
{

    protected $entity;

    public function __construct () {
        $this->middleware('permission:listar usuarios|crear usuarios|editar usuarios|eliminar roles', ['only' => ['index', 'store']]);
        $this->middleware('permission:crear usuarios', ['only' => ['create', 'store']]);
        $this->middleware('permission:editar usuarios', ['only' => ['edit', 'update']]);
        $this->middleware('permission:eliminar usuarios', ['only' => ['destroy']]);

        $this->entity = app(\App\User::class);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ( $request->q )
            $data = $this->entity
            ->where('username', 'like', '%'.$request->q.'%')
            ->orWhere('email', 'like', '%'.$request->q.'%')
            ->orWhere('fullname', 'like', '%'.$request->q.'%')
            ->orderByDesc('created_at')->paginate(12);
        else
            $data = $this->entity->orderByDesc('created_at')->paginate(12);

        return view('admin::core.user.index', [
            'users' =>  $data,
            'q'     =>  $request->q
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::pluck('name', 'name')->all();

        return view('admin::core.user.create', [
            'roles' =>  $roles
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(\App\Http\Requests\Core\UserStoreRequest $request)
    {
        $user           =   new $this->entity;
        $user->username =   strtolower($request->username);
        $user->fullname =   $request->fullname;
        $user->email    =   $request->email;
        $user->email_verified_at    =   now();
        $user->password =   bcrypt('password_'.$request->username);
        $user->save();

        $information            =   new \App\Entities\Core\Information();
        $information->user_id   =   $user->id;
        $information->save();

        $user->assignRole($request->roles);

        session()->flash('message', 'Usuario Registrado Exitosamente');

        return redirect()->route('users.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = $this->entity->find($id);

        abort_unless($user, 404);

        return view('admin::core.user.show', [
            'user'  =>  $user
        ]);   
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = $this->entity->find($id);

        abort_unless($user, 404);

        $roles = Role::pluck('name', 'name')->all();

        return view('admin::core.user.edit', [
            'user'  =>  $user,
            'roles' =>  $roles
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(\App\Http\Requests\Core\UserUpdateRequest $request, $id)
    {
        $user           =   $this->entity->find($id);
        $user->username =   $request->username;
        $user->fullname =   $request->fullname;
        $user->email    =   $request->email;
        $user->password =   bcrypt('password_'.$request->username);
        $user->status   =   $request->status;
        $user->save();

        DB::table('model_has_roles')->where('model_id', $id)->delete();

        $user->assignRole($request->roles);

        session()->flash('message', 'Usuario Actualizado Exitosamente');

        return redirect()->route('users.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
