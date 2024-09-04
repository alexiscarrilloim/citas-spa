<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categorias = Categoria::all();
        return view("admin.categorias.index", compact("categorias"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("admin.categorias.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //$datos = $request->all();
        //return response()->json($datos);

        $request->validate([
            'nombre'=> 'required|max:150|unique:categorias',
            'estado'=> 'required',
        ]);

        Categoria::create($request->all());  

        return redirect()->route('admin.categorias.index')
                ->with('mensaje','Se registró la categoría de forma correcta')
                ->with('icono','success');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $categoria = Categoria::find($id);
        return view('admin.categorias.show', compact('categoria'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $categoria = Categoria::find($id);
        return view('admin.categorias.edit', compact('categoria'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'required|max:150',
            'estado' => 'required',
        ]);

        $categoria = Categoria::find($id);
        $categoria->update($request->all());

        return redirect()->route('admin.categorias.index')
                ->with('mensaje','Se actualizó la categoria de forma correcta')
                ->with('icono','success');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function confirmDelete($id)
     {
        $categoria = Categoria::find($id);
        return view('admin.categorias.delete', compact('categoria'));
     }

    public function destroy($id)
    {
        $categoria = Categoria::find($id);
        $categoria->delete();
        return redirect()->route('admin.categorias.index')
        ->with('mensaje','Se eliminó la categoria de forma correcta')
        ->with('icono','success');
    }
}
