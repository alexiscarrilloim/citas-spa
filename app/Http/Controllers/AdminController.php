<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Empleado;
use App\Models\Secretaria;
use App\Models\Sucursal;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(){
        $total_usuarios = User::count();
        $total_secretarias = Secretaria::count();
        $total_clientes = Cliente::count();
        $total_sucursales = Sucursal::count();
        $total_empleados = Empleado::count();

        #Funcion que retorna la vista al admin/index
        return view('admin.index',compact(
        'total_usuarios',
        'total_secretarias',
        'total_clientes',            
        'total_sucursales',
        'total_empleados'
    )); 
    }
}
