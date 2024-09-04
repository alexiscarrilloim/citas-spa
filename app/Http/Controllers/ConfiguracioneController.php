<?php

namespace App\Http\Controllers;

use App\Models\Configuracione;
use Illuminate\Http\Request;
use illuminate\Support\Facades\Storage;

class ConfiguracioneController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $configuraciones = Configuracione::all();
        return view("admin.configuraciones.index", compact('configuraciones'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //$datos = $request->all();
        //return response()->json($datos);
        $request->validate([
            'nombre' => 'required|max:150',
            'direccion' => 'required|max:150',
            'telefono' => 'required|max:10',
            'correo' => 'required',
            'logo' => 'required',
        ]);

        $configuracion = new Configuracione();

        $configuracion->nombre = $request->nombre;
        $configuracion->direccion = $request->direccion;
        $configuracion->telefono = $request->telefono;
        $configuracion->correo = $request->correo;
        $configuracion->logo = $request->file('logo')->store('logos','public');

        $configuracion->save();

        return redirect()->route('admin.configuraciones.index')
                ->with('mensaje','Se registró la configuración de forma correcta')
                ->with('icono','success');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $configuracion = Configuracione::find($id);
        return view('admin.configuraciones.show', compact('configuracion'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $configuracion = Configuracione::find($id);
        return view('admin.configuraciones.edit', compact('configuracion'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'required|max:150',
            'direccion' => 'required|max:150',
            'telefono' => 'required|max:10',
            'correo' => 'required',
        ]);

        $configuracion = Configuracione::find($id);

        $configuracion->nombre = $request->nombre;
        $configuracion->direccion = $request->direccion;
        $configuracion->telefono = $request->telefono;
        $configuracion->correo = $request->correo;
        if ($request->hasFile('logo')) {
            Storage::delete('public/'.$configuracion->logo);
            $configuracion->logo = $request->file('logo')->store('logos','public');
        }

        $configuracion->save();

        return redirect()->route('admin.configuraciones.index')
                ->with('mensaje','Se actualizó la configuración de forma correcta')
                ->with('icono','success');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $configuracion = Configuracione::find($id);
        Storage::delete('public/'.$configuracion->logo);
        Configuracione::destroy($id);
        return redirect()->back()->with([
            'mensaje' => 'Se eliminó la configuración de forma correcta',
            'icono' => 'success',
        ]);
    }
}
