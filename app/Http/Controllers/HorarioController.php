<?php

namespace App\Http\Controllers;

use App\Models\Empleado;
use App\Models\Horario;
use App\Models\Servicio;
use App\Models\Sucursal;
use Illuminate\Http\Request;
use Carbon\Carbon;

class HorarioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $servicios = Servicio::all();
        $horarios = Horario::with('empleado','servicio')->get();
        return view('admin.horarios.index', compact('horarios','servicios'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $empleados = Empleado::all();
        $servicios = Servicio::all();
        $horarios = Horario::with('empleado','servicio')->get();
        return view('admin.horarios.create', compact('empleados','servicios','horarios'));
    }

    /**
     * Store a newly created resource in storage.
     */

    public function validarHorario($dia, $hora_inicio, $hora_fin) {
        Carbon::setLocale('es');
        // Convertir el día a un número (1 = lunes, 2 = martes, ...)
        $diaNumerico = date('N', strtotime($dia));
        
        // Convertir las horas a objetos Carbon
        $horaInicio = Carbon::createFromTime(intval($hora_inicio));
        $horaFin = Carbon::createFromTime(intval($hora_fin));
    
        // Validar según el día de la semana y el rango horario
        if ($diaNumerico >= 2 && $diaNumerico <= 6) { // Martes a sábado
            return $horaInicio->between('10:00:00', '19:00:00') && $horaFin->between('10:00:00', '19:00:00');
        } elseif ($diaNumerico == 7) { // Domingo
            return $horaInicio->between('10:00:00', '14:00:00') && $horaFin->between('10:00:00', '14:00:00');
        } else {
            return false; // Otros días no están permitidos
        }
    }

    public function cargar_datos_servicios($id)
    {
        $servicio = Servicio::find($id);
        try{
            $horarios =  Horario::with('empleado','servicio')->where('servicio_id',$id)->get();
            //print_r($horarios);
            return view('admin.horarios.cargar_datos_servicios', compact('horarios','servicio'));
        }catch(\Exception $exception){
            return response()->json(['mensaje'=> 'Error', 'detalle' => $exception->getMessage()]);
        }
    }

    
    public function store(Request $request)
    {
        //$datos = $request->all();  //Recibir datos en cadena json
        //return response()->json($datos);
        
        //Validar datos del formulario
        $request->validate([
            'dia' => 'required',
            'hora_inicio' => 'required|date_format:H:i',
            'hora_fin'=> 'required|date_format:H:i|after:hora_inicio',
            'servicio_id'=>'required|exists:servicios,id' // validar que el servicio exista
        ]);

        // Verificar si el horario ya existe para ese día y rango de horas
    $horarioExistente = Horario::where('dia', $request->dia)
        ->where('servicio_id', $request->servicio_id)
        ->where(function ($query) use ($request) {
            $query->where(function ($query) use ($request) {
                $query->where('hora_inicio', '>=', $request->hora_inicio)
                    ->where('hora_inicio', '<', $request->hora_fin);
            })
                ->orWhere(function ($query) use ($request) {
                    $query->where('hora_fin', '>', $request->hora_inicio)
                        ->where('hora_fin', '<=', $request->hora_fin);
                })
                ->orWhere(function ($query) use ($request) {
                    $query->where('hora_inicio', '<', $request->hora_inicio)
                        ->where('hora_fin', '>', $request->hora_fin);
            });
        })
        ->exists();

    if ($horarioExistente) {
    return redirect()->back()
        ->withInput()
        ->with('mensaje', 'Ya existe un horario que se superpone con el horario ingresado')
        ->with('icono', 'error');
    }

    if (!$this->validarHorario($request->dia, $request->hora_inicio, $request->hora_fin)) {
        return redirect()->back()
            ->withInput()
            ->with('mensaje', 'Fuera de horario permitido')
            ->with('icono', 'error');
    }

    Horario::create($request->all());

    return redirect()->route('admin.horarios.index')
        ->with('mensaje','Se registró el horario de forma correcta')
        ->with('icono','success');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $horario = Horario::find($id);
        return view('admin.horarios.show', compact('horario'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $empleados = Empleado::all();
        $servicios = Servicio::all();
        $horario = Horario::find($id);
        return view('admin.horarios.edit', compact('horario','servicios','empleados'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Horario $horario)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Horario $horario)
    {
        //
    }
}
