<?php

use App\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class AssyncTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = Role::create([
            'name'  =>  'administrador'
        ]);

        Permission::create([ 'name'    =>  'listar roles', 'guard_name' =>  'web' ]);
        Permission::create([ 'name'    =>  'crear roles', 'guard_name' =>  'web' ]);
        Permission::create([ 'name'    =>  'editar roles', 'guard_name' =>  'web' ]);
        Permission::create([ 'name'    =>  'eliminar roles', 'guard_name' =>  'web' ]);

        Permission::create([ 'name'    =>  'listar usuarios', 'guard_name' =>  'web' ]);
        Permission::create([ 'name'    =>  'crear usuarios', 'guard_name' =>  'web' ]);
        Permission::create([ 'name'    =>  'editar usuarios', 'guard_name' =>  'web' ]);
        Permission::create([ 'name'    =>  'eliminar usuarios', 'guard_name' =>  'web' ]);

        Permission::create([ 'name'    =>  'listar habilidades', 'guard_name' =>  'web' ]);
        Permission::create([ 'name'    =>  'crear habilidades', 'guard_name' =>  'web' ]);
        Permission::create([ 'name'    =>  'editar habilidades', 'guard_name' =>  'web' ]);
        Permission::create([ 'name'    =>  'eliminar habilidades', 'guard_name' =>  'web' ]);

        Permission::create([ 'name'    =>  'listar cursos', 'guard_name' =>  'web' ]);
        Permission::create([ 'name'    =>  'crear cursos', 'guard_name' =>  'web' ]);
        Permission::create([ 'name'    =>  'editar cursos', 'guard_name' =>  'web' ]);
        Permission::create([ 'name'    =>  'eliminar cursos', 'guard_name' =>  'web' ]);

        Permission::create([ 'name'    =>  'listar lecciones', 'guard_name' =>  'web' ]);
        Permission::create([ 'name'    =>  'crear lecciones', 'guard_name' =>  'web' ]);
        Permission::create([ 'name'    =>  'editar lecciones', 'guard_name' =>  'web' ]);
        Permission::create([ 'name'    =>  'eliminar lecciones', 'guard_name' =>  'web' ]);

        Permission::create([ 'name'    =>  'listar categorias', 'guard_name' =>  'web' ]);
        Permission::create([ 'name'    =>  'crear categorias', 'guard_name' =>  'web' ]);
        Permission::create([ 'name'    =>  'editar categorias', 'guard_name' =>  'web' ]);
        Permission::create([ 'name'    =>  'eliminar categorias', 'guard_name' =>  'web' ]);

        Permission::create([ 'name'    =>  'listar posts', 'guard_name' =>  'web' ]);
        Permission::create([ 'name'    =>  'crear posts', 'guard_name' =>  'web' ]);
        Permission::create([ 'name'    =>  'editar posts', 'guard_name' =>  'web' ]);
        Permission::create([ 'name'    =>  'eliminar posts', 'guard_name' =>  'web' ]);

        $permissions = Permission::pluck('id', 'id')->all();

        $user = User::find(1);
        $role->syncPermissions($permissions);
        $user->assignRole([$role->id]);
    }
}
