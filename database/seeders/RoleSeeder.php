<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //Seeder para los roles y permisos admin, secretaria, doctores, clientes y usuarios
        
        $admin = Role::create(['name'=>'admin']);
        $secretaria = Role::create(['name'=>'secretaria']);
        $empleado = Role::create(['name'=>'empleado']);
        $cliente = Role::create(['name'=>'cliente']);
        $usuario = Role::create(['name'=>'usuario']);

        Permission::create(['name'=> 'admin.index']);

         //rutas para el admin = configuraciones
         Permission::create(['name'=> 'admin.configuraciones.index'])->syncRoles([$admin]);
         Permission::create(['name'=> 'admin.configuraciones.create'])->syncRoles([$admin]);
         Permission::create(['name'=> 'admin.configuraciones.store'])->syncRoles([$admin]);
         Permission::create(['name'=> 'admin.configuraciones.show'])->syncRoles([$admin]);
         Permission::create(['name'=> 'admin.configuraciones.edit'])->syncRoles([$admin]);
         Permission::create(['name'=> 'admin.configuraciones.update'])->syncRoles([$admin]);
         Permission::create(['name'=> 'admin.configuraciones.confirm-delete'])->syncRoles([$admin]);
         Permission::create(['name'=> 'admin.configuraciones.destroy'])->syncRoles([$admin]);

        //rutas para el admin = usuarios
        Permission::create(['name'=> 'admin.usuarios.index'])->syncRoles([$admin]);
        Permission::create(['name'=> 'admin.usuarios.create'])->syncRoles([$admin]);
        Permission::create(['name'=> 'admin.usuarios.store'])->syncRoles([$admin]);
        Permission::create(['name'=> 'admin.usuarios.show'])->syncRoles([$admin]);
        Permission::create(['name'=> 'admin.usuarios.edit'])->syncRoles([$admin]);
        Permission::create(['name'=> 'admin.usuarios.update'])->syncRoles([$admin]);
        Permission::create(['name'=> 'admin.usuarios.confirm-delete'])->syncRoles([$admin]);
        Permission::create(['name'=> 'admin.usuarios.destroy'])->syncRoles([$admin]);

        //Rutas para el admin = secretarias
        Permission::create(['name'=> 'admin.secretarias.index'])->syncRoles([$admin]);
        Permission::create(['name'=> 'admin.secretarias.create'])->syncRoles([$admin]);
        Permission::create(['name'=> 'admin.secretarias.store'])->syncRoles([$admin]);
        Permission::create(['name'=> 'admin.secretarias.show'])->syncRoles([$admin]);
        Permission::create(['name'=> 'admin.secretarias.edit'])->syncRoles([$admin]);
        Permission::create(['name'=> 'admin.secretarias.update'])->syncRoles([$admin]);
        Permission::create(['name'=> 'admin.secretarias.confirm-delete'])->syncRoles([$admin]);
        Permission::create(['name'=> 'admin.secretarias.destroy'])->syncRoles([$admin]);

        //Rutas para el admin = clientes
        Permission::create(['name'=> 'admin.clientes.index'])->syncRoles([$admin, $secretaria]);
        Permission::create(['name'=> 'admin.clientes.create'])->syncRoles([$admin, $secretaria]);
        Permission::create(['name'=> 'admin.clientes.store'])->syncRoles([$admin, $secretaria]);
        Permission::create(['name'=> 'admin.clientes.show'])->syncRoles([$admin, $secretaria]);
        Permission::create(['name'=> 'admin.clientes.edit'])->syncRoles([$admin, $secretaria]);
        Permission::create(['name'=> 'admin.clientes.update'])->syncRoles([$admin, $secretaria]);
        Permission::create(['name'=> 'admin.clientes.confirm-delete'])->syncRoles([$admin, $secretaria]);
        Permission::create(['name'=> 'admin.clientes.destroy'])->syncRoles([$admin, $secretaria]);

        //Rutas para el admin = sucursales
        Permission::create(['name'=> 'admin.sucursales.index'])->syncRoles([$admin, $secretaria]);
        Permission::create(['name'=> 'admin.sucursales.create'])->syncRoles([$admin, $secretaria]);
        Permission::create(['name'=> 'admin.sucursales.store'])->syncRoles([$admin, $secretaria]);
        Permission::create(['name'=> 'admin.sucursales.show'])->syncRoles([$admin, $secretaria]);
        Permission::create(['name'=> 'admin.sucursales.edit'])->syncRoles([$admin, $secretaria]);
        Permission::create(['name'=> 'admin.sucursales.update'])->syncRoles([$admin, $secretaria]);
        Permission::create(['name'=> 'admin.sucursales.confirm-delete'])->syncRoles([$admin, $secretaria]);
        Permission::create(['name'=> 'admin.sucursales.destroy'])->syncRoles([$admin, $secretaria]);

        //Rutas para el admin = empleados
        Permission::create(['name'=> 'admin.empleados.index'])->syncRoles([$admin, $secretaria]);
        Permission::create(['name'=> 'admin.empleados.create'])->syncRoles([$admin, $secretaria]);
        Permission::create(['name'=> 'admin.empleados.store'])->syncRoles([$admin, $secretaria]);
        Permission::create(['name'=> 'admin.empleados.show'])->syncRoles([$admin, $secretaria]);
        Permission::create(['name'=> 'admin.empleados.edit'])->syncRoles([$admin, $secretaria]);
        Permission::create(['name'=> 'admin.empleados.update'])->syncRoles([$admin, $secretaria]);
        Permission::create(['name'=> 'admin.empleados.confirm-delete'])->syncRoles([$admin, $secretaria]);
        Permission::create(['name'=> 'admin.empleados.destroy'])->syncRoles([$admin, $secretaria]);
        Permission::create(['name'=> 'admin.empleados.reportes'])->syncRoles([$admin, $secretaria]);
        Permission::create(['name'=> 'admin.empleados.pdf'])->syncRoles([$admin, $secretaria]);

        //Rutas para el admin = horarios
        Permission::create(['name'=> 'admin.horarios.index'])->syncRoles([$admin, $secretaria]);
        Permission::create(['name'=> 'admin.horarios.create'])->syncRoles([$admin, $secretaria]);
        Permission::create(['name'=> 'admin.horarios.store'])->syncRoles([$admin, $secretaria]);
        Permission::create(['name'=> 'admin.horarios.show'])->syncRoles([$admin, $secretaria]);
        Permission::create(['name'=> 'admin.horarios.edit'])->syncRoles([$admin, $secretaria]);
        Permission::create(['name'=> 'admin.horarios.update'])->syncRoles([$admin, $secretaria]);
        Permission::create(['name'=> 'admin.horarios.confirm-delete'])->syncRoles([$admin, $secretaria]);
        Permission::create(['name'=> 'admin.horarios.destroy'])->syncRoles([$admin, $secretaria]);

        //Ajax
        Permission::create(['name'=> 'admin.horarios.cargar_datos_sucursales'])->syncRoles([$admin, $secretaria]);

        //Rutas para el admin = categorias
        Permission::create(['name'=> 'admin.categorias.index'])->syncRoles([$admin, $secretaria]);
        Permission::create(['name'=> 'admin.categorias.create'])->syncRoles([$admin, $secretaria]);
        Permission::create(['name'=> 'admin.categorias.store'])->syncRoles([$admin, $secretaria]);
        Permission::create(['name'=> 'admin.categorias.show'])->syncRoles([$admin, $secretaria]);
        Permission::create(['name'=> 'admin.categorias.edit'])->syncRoles([$admin, $secretaria]);
        Permission::create(['name'=> 'admin.categorias.update'])->syncRoles([$admin, $secretaria]);
        Permission::create(['name'=> 'admin.categorias.confirm-delete'])->syncRoles([$admin, $secretaria]);
        Permission::create(['name'=> 'admin.categorias.destroy'])->syncRoles([$admin, $secretaria]);

        //Rutas para el admin = servicios
        Permission::create(['name'=> 'admin.servicios.index'])->syncRoles([$admin, $secretaria]);
        Permission::create(['name'=> 'admin.servicios.create'])->syncRoles([$admin, $secretaria]);
        Permission::create(['name'=> 'admin.servicios.store'])->syncRoles([$admin, $secretaria]);
        Permission::create(['name'=> 'admin.servicios.show'])->syncRoles([$admin, $secretaria]);
        Permission::create(['name'=> 'admin.servicios.edit'])->syncRoles([$admin, $secretaria]);
        Permission::create(['name'=> 'admin.servicios.update'])->syncRoles([$admin, $secretaria]);
        Permission::create(['name'=> 'admin.servicios.confirm-delete'])->syncRoles([$admin, $secretaria]);
        Permission::create(['name'=> 'admin.servicios.destroy'])->syncRoles([$admin, $secretaria]);

        //Rutas para usuarios
        //Ajax
        Permission::create(['name'=> 'admin.horarios.cargar_datos_servicios'])->syncRoles([$admin,$usuario,$secretaria, $cliente]);
        Permission::create(['name'=> 'cargar_reserva_empleados'])->syncRoles([$admin, $usuario, $cliente]);
        Permission::create(['name'=> 'ver_reservas'])->syncRoles([$admin, $usuario, $cliente]);
        Permission::create(['name'=> 'admin.eventos.create'])->syncRoles([$admin, $usuario, $cliente]);
        Permission::create(['name'=> 'admin.eventos.destroy'])->syncRoles([$admin, $usuario, $cliente]);

        //Rutas para las reservas
        Permission::create(['name'=> 'admin.reservas.reportes'])->syncRoles([$admin]);
        Permission::create(['name'=> 'admin.reservas.pdf'])->syncRoles([$admin]);
        Permission::create(['name'=> 'admin.reservas.pdf_fechas'])->syncRoles([$admin]);

        //Rutas para el historial
        Permission::create(['name'=> 'admin.historial.index'])->syncRoles([$admin, $empleado]);
        Permission::create(['name'=> 'admin.historial.create'])->syncRoles([$admin, $empleado]);
        Permission::create(['name'=> 'admin.historial.store'])->syncRoles([$admin, $empleado]);
        Permission::create(['name'=> 'admin.historial.pdf'])->syncRoles([$admin, $empleado]);
        Permission::create(['name'=> 'admin.historial.show'])->syncRoles([$admin, $empleado]);
        Permission::create(['name'=> 'admin.historial.edit'])->syncRoles([$admin, $empleado]);
        Permission::create(['name'=> 'admin.historial.update'])->syncRoles([$admin, $empleado]);
        Permission::create(['name'=> 'admin.historial.destroy'])->syncRoles([$admin, $empleado]);
    }
}
