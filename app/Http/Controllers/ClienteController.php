<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $clientes = Cliente::all(); //No esta relacionado con ninguna tabla
        return view("admin.clientes.index",compact('clientes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("admin.clientes.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //$datos = $request->all();  //Recibir datos en cadena json
        //return response()->json($datos);

        $request->validate([
            'nombres' => 'required|max:150',
            'apellidos' => 'required|max:150',
            'celular'=> 'required|max:10',
            'correo' => 'required|unique:clientes|max:150',
        ]);

        $cliente = new Cliente();
        $cliente->nombres = $request->nombres;
        $cliente->apellidos = $request->apellidos;
        $cliente->celular = $request->celular;
        $cliente->correo = $request->correo;
        $cliente->save();

        return redirect()->route('admin.clientes.index')
                ->with('mensaje','Se registró al cliente de forma correcta')
                ->with('icono','success');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $cliente = Cliente::findOrFail($id);
        return view('admin.clientes.show',compact('cliente'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $cliente = Cliente::findOrFail($id);
        return view('admin.clientes.edit',compact('cliente'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $cliente = Cliente::find($id);

        $request->validate([
            'nombres' => 'required|max:150',
            'apellidos' => 'required|max:150',
            'celular'=> 'required|max:10',
            'correo' => 'required|max:150|unique:clientes,correo,'.$cliente->id,
        ]);

        $cliente->nombres = $request->nombres;
        $cliente->apellidos = $request->apellidos;
        $cliente->celular = $request->celular;
        $cliente->correo = $request->correo;
        $cliente->save();

        return redirect()->route('admin.clientes.index')
                ->with('mensaje','Se actualizó al cliente de forma correcta')
                ->with('icono','success');
    }

    /**
     * Remove the specified resource from storage.
     */

     public function confirmDelete($id){
        $cliente = Cliente::findOrFail($id);
        return view('admin.clientes.delete',compact('cliente'));
     }
    
    public function destroy($id)
    {
        Cliente::destroy($id);
        return redirect()->route('admin.clientes.index')  //Solo se redirecciona a la vista
                ->with('mensaje','Se eliminó al cliente de forma correcta')
                ->with('icono','success');

    }
}
