<?php

namespace App\Http\Controllers;

use App\Models\Empleado;
use App\Models\Event;
use App\Models\Servicio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class WebController extends Controller
{
    public function cargar_reserva_empleados($id)
    {
        try {
            $eventos = Event::where('empleado_id', $id)
            ->select('id','title', DB::raw('DATE_FORMAT(start, "%Y-%m-%d") as start'), DB::raw('DATE_FORMAT(END, "%Y-%m-%d") as END'),'color')
            ->get();
            //print_r($horarios);
            return response()->json($eventos);
        } catch (\Exception $exception) {
            return response()->json(['mensaje' => 'Error', 'detalle' => $exception->getMessage()]);
        }
    }
}
