<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Empleado;
use App\Models\Servicio;
use Illuminate\Http\Request;

class ServicioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $empleados = Empleado::all();
        $servicios = Servicio::with('categoria','empleados')->get();
        return view('admin.servicios.index', compact('servicios','empleados'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $empleados = Empleado::all();
        $categorias = Categoria::all();
        return view("admin.servicios.create", compact("empleados","categorias"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string',
            'descripcion' => 'required|max:200',
            'duracion'=> 'required|numeric|integer|max:60',
            'empleado_id' => 'required|integer|exists:empleados,id',
        ]);
        
    
        $servicio = Servicio::create($request->all());

        // Asocia los empleados seleccionados al servicio
        $servicio->empleados()->attach($request->empleado_id);
    
        return redirect()->route('admin.servicios.index')
                ->with('mensaje','Se registró el servicio de forma correcta')
                ->with('icono','success');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $servicio = Servicio::find($id);
        return view('admin.servicios.show', compact('servicio'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $empleados = Empleado::all();
        $categorias = Categoria::all();
        $servicio = Servicio::with('empleados')->findOrFail($id); #Buscando al id de tabla secretarias con relacion a tabla usuarios
        return view('admin.servicios.edit',compact('servicio','empleados','categorias'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'required|string',
            'descripcion' => 'nullable|string|max:200',
            'duracion'=> 'nullable|numeric|integer|max:60',
            'empleado_id' => 'nullable|integer|exists:empleados,id',
        ]);

        $servicio = Servicio::find($id);
        $servicio->update($request->all());

        if($request->filled('empleado_id')){
           // Asocia los empleados seleccionados al servicio
           $servicio->empleados()->sync($request->empleado_id);
        }
        
        return redirect()->route('admin.servicios.index')
        ->with('mensaje','Se actualizó el servicio de forma correcta')
        ->with('icono','success');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Servicio::destroy($id);
        return redirect()->back()->with([
            'mensaje' => 'Se eliminó el servicio de forma correcta',
            'icono' => 'success',
        ]);
    }
}
