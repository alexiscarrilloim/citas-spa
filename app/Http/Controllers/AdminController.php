<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Cliente;
use App\Models\Empleado;
use App\Models\Event;
use App\Models\Horario;
use App\Models\Secretaria;
use App\Models\Servicio;
use App\Models\Sucursal;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $total_usuarios = User::count();
        $total_secretarias = Secretaria::count();
        $total_clientes = Cliente::count();
        $total_empleados = Empleado::count();
        $total_categorias = Categoria::count();
        $total_servicios = Servicio::count();
        $total_horarios = Horario::count();
        $total_eventos = Event::count();

        $servicios = Servicio::with('empleados')->get();
        $empleados = Empleado::all();
        $horarios = Horario::all();
        $eventos = Event::all();

        #Funcion que retorna la vista al admin/index
        return view('admin.index',compact('total_usuarios',
        'total_secretarias',
        'total_clientes',           
        'total_empleados',
        'total_categorias',
        'total_servicios',
        'total_horarios',
        'total_eventos',
        'servicios',
        'empleados',
        'horarios',
        'eventos',
        )); 
    }

    public function ver_reservas($id)
    {
        $eventos = Event::where('user_id',$id)->get();
        return view('admin.ver_reservas',compact('eventos'));
    }
}
