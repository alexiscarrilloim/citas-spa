<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Categoria;
use App\Models\Configuracione;
use App\Models\Empleado;
use App\Models\Secretaria;
use App\Models\Servicio;
use App\Models\Sucursal;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        //Seeder para los roles y permisos admin, secretaria, doctores, clientes y usuarios
        $this->call(RoleSeeder::class);

        //Creacion de usuarios con seeder
        User::create([
            'name'=> 'Administrador',
            'email'=> 'admin@admin.com',
            'password'=>Hash::make('12345678')
        ])->assignRole('admin');


        User::create([
            'name'=> 'Secretaria1',
            'email'=> 'secretaria1@admin.com',
            'password'=>Hash::make('12345678')
        ])->assignRole('secretaria');

        Secretaria::create([
            'nombres' => 'Secretaria',
            'apellidos' => '1',
            'rfc' => 'SE12345678910',
            'celular'=> '7442367645',
            'direccion'=> 'Av. Lazaro Cardenas #205 int. 98',
            'user_id'=> '2',
        ]);


        User::create([
            'name'=> 'Guadalupe',
            'email'=> 'lupe@admin.com',
            'password'=>Hash::make('12345678')
        ])->assignRole('empleado');

        Empleado::create([
            'nombres' => 'Guadalupe',
            'apellidos' => 'Reyes',
            'telefono'=> '3121013234',
            'user_id'=> '3',
        ]);

        User::create([
            'name'=> 'Esperanza',
            'email'=> 'espe@admin.com',
            'password'=>Hash::make('12345678')
        ])->assignRole('empleado');

        Empleado::create([
            'nombres' => 'Esperanza',
            'apellidos' => 'Gomez',
            'telefono'=> '3121013232',
            'user_id'=> '4',
        ]);

        User::create([
            'name'=> 'Sasha',
            'email'=> 'sasha@admin.com',
            'password'=>Hash::make('12345678')
        ])->assignRole('empleado');

        Empleado::create([
            'nombres' => 'Sasha',
            'apellidos' => 'Gray',
            'telefono'=> '3121043234',
            'user_id'=> '5',
        ]);

        Sucursal::create([
            'nombre' => 'MäDI Studio & Spa ',
            'ubicacion' => 'Eliaz Zamora Verduzco, Barrio 2, #70',
            'estado' => 'Activo',
            'telefono'=> '',
        ]);

        Categoria::create([
            'nombre'=> 'Masajes',
            'estado'=> 'Activa',
        ]);

        Categoria::create([
            'nombre'=> 'Rostro',
            'estado'=> 'Activa',
        ]);

        Servicio::create([
            'nombre'=> 'Masaje relajante',
            'descripcion'=> 'Masaje relajante para cuerpo en general',
            'duracion'=> '60',
            'categoria_id'=> '1',
            'empleado_id'=> '2',
        ]);

        User::create([
            'name'=> 'Ivan',
            'email'=> 'ivan@gmail.com',
            'password'=>Hash::make('12345678')
        ])->assignRole('usuario');

        User::create([
            'name'=> 'Fermin',
            'email'=> 'fer@gmail.com',
            'password'=>Hash::make('12345678')
        ])->assignRole('usuario');

        Configuracione::create([
            'nombre'=> 'MäDI Studio & Spa ',
            'direccion'=> 'Valle de las garzas barrio 2, #30',
            'telefono'=> '3141635097',
            'correo'=> 'madispa@gmail.com',
            'logo'=> 'logos/Y7G8gX49wJiHmSRMpXEhQoxf2wguKfvoMBy9HcXa.jpg',
        ]);
        
        $this->call([ClienteSeeder::class,]);

    }
}
