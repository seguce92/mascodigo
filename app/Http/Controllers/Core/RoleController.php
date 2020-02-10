<?php

namespace App\Http\Controllers\Core;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Permission;
use DB;

class RoleController extends Controller
{
    protected $entity;

    public function __construct () {
        $this->middleware('permission:listar roles|crear roles|editar roles|eliminar roles', ['only' => ['index', 'store']]);
        $this->middleware('permission:crear roles', ['only' => ['create', 'store']]);
        $this->middleware('permission:editar roles', ['only' => ['edit', 'update']]);
        $this->middleware('permission:eliminar roles', ['only' => ['destroy']]);

        $this->entity = app(\Spatie\Permission\Models\Role::class);
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
            ->where('name', 'like', '%'.$request->q.'%')
            ->paginate(12);
        else
            $data = $this->entity->paginate(12);

        return view('admin::core.role.index', [
            'roles' =>  $data,
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
        return view('admin::core.role.create', [
            'permissions'   =>  Permission::get()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $role       =   new  $this->entity;
        $role->name =   $request->name;
        $role->guard_name   =   'web';
        $role->save();

        $role->syncPermissions($request->permission);

        session()->flash('message', 'Rol Registrado Exitosamente');

        return redirect()->route('roles.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $role = $this->entity->find($id);

        abort_unless($role, 404);

        $rolePermissions = DB::table("role_has_permissions")->where("role_has_permissions.role_id",$id)
            ->pluck('role_has_permissions.permission_id','role_has_permissions.permission_id')
            ->all();

        return view('admin::core.role.show', [
            'role'  =>  $role,
            'permissions'   =>  Permission::get(),
            'rolePermissions'   =>  $rolePermissions
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
        $role = $this->entity->find($id);

        abort_unless($role, 404);

        $rolePermissions = DB::table("role_has_permissions")->where("role_has_permissions.role_id",$id)
            ->pluck('role_has_permissions.permission_id','role_has_permissions.permission_id')
            ->all();

        return view('admin::core.role.edit', [
            'role'  =>  $role,
            'permissions'   =>  Permission::get(),
            'rolePermissions'   =>  $rolePermissions
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $role       =   $this->entity->find($id);
        $role->name =   $request->name;
        $role->save();

        session()->flash('message', 'Rol Actualizado Exitosamente');

        return redirect()->route('roles.index');
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
