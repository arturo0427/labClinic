<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\User;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        //roles
        Permission::create(['name' => 'roles.index', 'description' => 'Vista de roles']);
        Permission::create(['name' => 'roles.edit', 'description' => 'Editar rol']);
        Permission::create(['name' => 'roles.show', 'description' => 'Ver rol']);
        Permission::create(['name' => 'roles.create', 'description' => 'Crear rol']);
        Permission::create(['name' => 'roles.destroy', 'description' => 'Eliminar rol']);

        //Users list
        Permission::create(['name' => 'users.index', 'description' => 'Vista de usuarios']);
        Permission::create(['name' => 'users.edit', 'description' => 'Editar usuario']);
        Permission::create(['name' => 'users.show', 'description' => 'Ver usuario']);
        Permission::create(['name' => 'users.create', 'description' => 'Crear usuario']);
        Permission::create(['name' => 'users.destroy', 'description' => 'Eliminar usuario']);

        //reservations -> reservacion de citas
        Permission::create(['name' => 'reservations.index', 'description' => 'Vista de reservaciones']);
        Permission::create(['name' => 'reservations.create', 'description' => 'Crear reservación']);
        Permission::create(['name' => 'reservations.show', 'description' => 'Ver reservación']);
        Permission::create(['name' => 'reservations.destroy', 'description' => 'Eliminar reservación']);
        Permission::create(['name' => 'reservations.atenderCita', 'description' => 'Atender reservación']);

        //Crear Consultas
        Permission::create(['name' => 'crearConsultas.index', 'description' => 'Vista de crear consultas médica']);
        Permission::create(['name' => 'crearConsultas.create', 'description' => 'Crear consulta médica']);
        Permission::create(['name' => 'crearConsultas.show', 'description' => 'Ver consulta médica']);
        Permission::create(['name' => 'crearConsultas.edit', 'description' => 'Editar consulta médica']);
        Permission::create(['name' => 'crearConsultas.destroy', 'description' => 'Eliminar consulta médica']);

        //Consultas
        Permission::create(['name' => 'consultas.index', 'description' => 'Vista de consultas']);
        Permission::create(['name' => 'consultas.edit', 'description' => 'Editar consulta']);
        Permission::create(['name' => 'consultas.atender', 'description' => 'Atender consulta']);
        Permission::create(['name' => 'consultas.show', 'description' => 'Ver resultados de la consulta']);


        //Historias de usuario
        Permission::create(['name' => 'historia.index', 'description' => 'Vista de historias']);
        Permission::create(['name' => 'historia.show', 'description' => 'Ver historia']);
        Permission::create(['name' => 'historia.destroy', 'description' => 'Eliminar historia']);

        //Inventario
        Permission::create(['name' => 'inventario.index', 'description' => 'Vista de inventario']);
        Permission::create(['name' => 'inventario.create', 'description' => 'Insertar insumos médicos en el inventario']);
        Permission::create(['name' => 'inventario.show', 'description' => 'Ver insumos médico']);
        Permission::create(['name' => 'inventario.edit', 'description' => 'Editar insumo médico']);
        Permission::create(['name' => 'inventario.destroy', 'description' => 'Eliminar insumo médico']);




        //Admin
        $admin = Role::create(['name' => 'Administrador', 'description' => 'Es el administrador de todo el sistema']);

        $admin->givePermissionTo([
            'roles.index',
            'roles.edit',
            'roles.show',
            'roles.create',
            'roles.destroy',
            'users.index',
            'users.edit',
            'users.show',
            'users.create',
            'users.destroy',
            'reservations.index',
            'reservations.create',
            'reservations.show',
            'reservations.destroy',
            'reservations.atenderCita',
            'crearConsultas.index',
            'crearConsultas.create',
            'crearConsultas.show',
//            'crearConsultas.edit',
            'crearConsultas.destroy',
            'consultas.index',
            'consultas.show',
            'consultas.edit',
            'consultas.atender',
            'historia.index',
            'historia.show',
            'historia.destroy',
            'inventario.index',
            'inventario.create',
            'inventario.show',
            'inventario.edit',
            'inventario.destroy',
        ]);
        //$admin->givePermissionTo('products.index');
        //$admin->givePermissionTo(Permission::all());

        //Admin
        $laboratorista = Role::create(['name' => 'Laboratorista', 'description' => 'Laboratorista auxiliar']);

        $laboratorista->givePermissionTo([
            'roles.index',
            'users.index',
            'users.edit',
            'users.show',
            'users.create',
            'users.destroy',
            'reservations.index',
            'reservations.create',
            'reservations.show',
            'reservations.destroy',
            'reservations.atenderCita',
            'crearConsultas.index',
            'crearConsultas.create',
            'crearConsultas.show',
//            'crearConsultas.edit',
            'crearConsultas.destroy',
            'consultas.index',
            'consultas.show',
            'consultas.edit',
            'consultas.atender',
            'historia.index',
            'historia.show',
            'historia.destroy',
        ]);


        //Paciente
        $paciente = Role::create(['name' => 'Paciente', 'description' => 'Solo tiene acceso a los permisos asignados por el administrador']);

        $paciente->givePermissionTo([
            'reservations.index',
            'reservations.create',
            'reservations.show',
            'reservations.destroy',
        ]);

        //Medico
        $medico = Role::create(['name' => 'Médico', 'description' => 'Solo tiene acceso a los permisos asignados por el administrador']);

        $medico->givePermissionTo([
            'crearConsultas.index',
            'crearConsultas.create',
            'crearConsultas.show',
            'crearConsultas.edit',
            'crearConsultas.destroy',
            'consultas.index',
            'consultas.show',
            'users.index',
            'users.create',
        ]);


        //User Paciente
        $user = User::find(8); //Italo Morales
        $user->assignRole('Paciente');

        //User Administrador
        $user = User::find(1); //Italo Morales
        $user->assignRole('Administrador');


        User::create([
            'name' => 'Wilson Arturo',
            'apellido' => 'Muñoz Ruano',
            'sexo' => 'Hombre',
            'age' => 25,
            'cedula' => '0401872866',
            'fecha_nacimiento' => '1995-12-04',
            'email' => 'boomer_rap@hotmail.com',
            'password' => bcrypt('12345678'),
            'direccion' => 'Ibarra',
        ]);

        User::create([
            'name' => 'David Mateo',
            'apellido' => 'López Meza',
            'sexo' => 'Mujer',
            'age' => 24,
            'cedula' => '123',
            'fecha_nacimiento' => '1996-11-10',
            'email' => 'm@m.com',
            'password' => bcrypt('12345678'),
            'direccion' => 'El Angel',
        ]);

        User::create([
            'name' => 'Julieta Benigna',
            'apellido' => 'Ruano Osejos',
            'sexo' => 'Mujer',
            'age' => 55,
            'cedula' => '321',
            'fecha_nacimiento' => '1963-11-10',
            'email' => 'l@l.com',
            'password' => bcrypt('12345678'),
            'direccion' => 'El Angel',
        ]);

        $user = User::find(9);
        $user->assignRole('Paciente');

        $user = User::find(10);
        $user->assignRole('Médico');

        $user = User::find(11);
        $user->assignRole('Laboratorista');

    }
}
