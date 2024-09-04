<?php

namespace App\Http\Controllers;

use App\Models\Sucursal;
use Illuminate\Http\Request;

class SucursalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sucursals = Sucursal::all();
        return view("admin.sucursales.index", compact("sucursals"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("admin.sucursales.create");
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
            'ubicacion' => 'required|max:150',
            'estado' => 'required',
        ]);

        //Hace una nueva instanciacion con los datos del protected fillable en el model
        Sucursal::create($request->all());  

        return redirect()->route('admin.sucursales.index')
                ->with('mensaje','Se registró la sucursal de forma correcta')
                ->with('icono','success');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $sucursal = Sucursal::find($id);
        return view('admin.sucursales.show', compact('sucursal'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $sucursal = Sucursal::find($id);
        return view('admin.sucursales.edit', compact('sucursal'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'required|max:150',
            'ubicacion' => 'required|max:150',
            'estado' => 'required',
        ]);

        $sucursal = Sucursal::find($id);
        $sucursal->update($request->all());

        return redirect()->route('admin.sucursales.index')
                ->with('mensaje','Se actualizó la sucursal de forma correcta')
                ->with('icono','success');
    }

    /**
     * Remove the specified resource from storage.
     */

     public function confirmDelete($id)
     {
        $sucursal = Sucursal::find($id);
        return view('admin.sucursales.delete', compact('sucursal'));
     }
    public function destroy($id)
    {
        $sucursal = Sucursal::find($id);
        $sucursal->delete();
        return redirect()->route('admin.sucursales.index')
                ->with('mensaje','Se eliminó la sucursal de forma correcta')
                ->with('icono','success');
    }


    public function asignarServicioSucursal(Request $request, Sucursal $sucursal)
    {
        $sucursal->servicios()->sync($request->servicio_id);
    }
}
