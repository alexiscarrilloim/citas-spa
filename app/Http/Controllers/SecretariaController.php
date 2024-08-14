<?php

namespace App\Http\Controllers;

use App\Models\Secretaria;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class SecretariaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $secretarias = Secretaria::with('user')->get(); //Esta relacionada con tabla usuario
        return view("admin.secretarias.index",compact('secretarias'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("admin.secretarias.create");

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //$datos = $request->all();
        //return response()->json($datos);
        $request->validate([
            'nombres' => 'required|max:150',
            'apellidos' => 'required|max:150',
            'rfc' => 'required|max:13|unique:secretarias',
            'celular'=> 'required|max:10',
            'direccion'=> 'required',
            'email' => 'required|unique:users',
            'password'=> 'required|max:150|confirmed',
        ]);

        $usuario = new User();
        $usuario->name = $request->nombres;
        $usuario->email = $request->email;
        $usuario->password = Hash::make( $request['password']);
        $usuario->save();

        $secretaria = new Secretaria();
        $secretaria->user_id = $usuario->id;
        $secretaria->nombres = $request->nombres;
        $secretaria->apellidos = $request->apellidos;
        $secretaria->rfc = $request->rfc;
        $secretaria->celular = $request->celular;
        $secretaria->direccion = $request->direccion;
        $secretaria->save();

        return redirect()->route('admin.secretarias.index')
                ->with('mensaje','Se registró a la secretaria de forma correcta')
                ->with('icono','success');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $secretaria = Secretaria::with('user')->findOrFail($id); #Buscando al id de tabla secretarias con relacion a tabla usuarios
        return view('admin.secretarias.show',compact('secretaria'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $secretaria = Secretaria::with('user')->findOrFail($id); #Buscando al id de tabla secretarias con relacion a tabla usuarios
        return view('admin.secretarias.edit',compact('secretaria'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $secretaria = Secretaria::find($id); //Buscamos el id de la secretaria

        $request->validate([
            'nombres' => 'required|max:150',
            'apellidos' => 'required|max:150',
            'rfc' => 'required|max:13|unique:secretarias,rfc,'.$secretaria->id,  //validacion
            'celular'=> 'required|max:10',
            'direccion'=> 'required',
            'email' => 'required|unique:users,email,'.$secretaria->user->id,
            'password'=> 'nullable|max:150|confirmed',
        ]);

        $secretaria->nombres = $request->nombres;
        $secretaria->apellidos = $request->apellidos;
        $secretaria->rfc = $request->rfc;              //Se actualizan los datos de secretaria
        $secretaria->celular = $request->celular;
        $secretaria->direccion = $request->direccion;
        $secretaria->save();

        $usuario = User::find($secretaria->user->id); 
        $usuario->name = $request->nombres;   //Se actualizan los datos de secretaria relacionados con usuario
        $usuario->email = $request->email;

        if($request->filled('password')){
            $usuario->password = Hash::make( $request['password']); //Si el password tiene info. se actualiza la contra
        }

        $usuario->save();
        return redirect()->route('admin.secretarias.index')
                ->with('mensaje','Se actualizó a la secretaria de forma correcta')
                ->with('icono','success');
    }

    /**
     * Remove the specified resource from storage.
     */
     public function confirmDelete($id)
     {
        $secretaria = Secretaria::with('user')->findOrFail($id); #Buscando al id de tabla secretarias con relacion a tabla usuarios
        return view('admin.secretarias.delete',compact('secretaria'));
     }

    public function destroy($id)
    {
        $secretaria = Secretaria::find($id);

        //Eliminar al usuario asociado
        $user = $secretaria->user;
        $user->delete();

        //Eliminar a la secretaria
        $secretaria->delete();
  
        return redirect()->route('admin.secretarias.index')
            ->with('mensaje','Se eliminó el registro de forma correcta')
            ->with('icono','success');
    }
}
