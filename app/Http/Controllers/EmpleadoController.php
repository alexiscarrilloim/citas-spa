<?php

namespace App\Http\Controllers;

use App\Models\Configuracione;
use App\Models\Empleado;
use App\Models\User;
use Barryvdh\Snappy\Facades\SnappyPdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use illuminate\Support\Facades\Auth;

class EmpleadoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $empleados = Empleado::with('user')->get(); //No esta relacionado con ninguna tabla
        return view("admin.empleados.index",compact('empleados'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("admin.empleados.create");
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
            'telefono'=> 'required|max:10',
            'email' => 'required|unique:users|max:150',
            'password'=> 'required|max:150|confirmed',
        ]);

        $usuario = new User();
        $usuario->name = $request->nombres;
        $usuario->email = $request->email;
        $usuario->password = Hash::make($request['password']);
        $usuario->save();

        $empleado = new Empleado();
        $empleado->user_id = $usuario->id;
        $empleado->nombres = $request->nombres;
        $empleado->apellidos = $request->apellidos;
        $empleado->telefono = $request->telefono;
        $empleado->save();

        $usuario->assignRole('empleado');

        return redirect()->route('admin.empleados.index')
                ->with('mensaje','Se registró al nuevo empleado de forma correcta')
                ->with('icono','success');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $empleado = Empleado::find($id);
        return view('admin.empleados.show',compact('empleado'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $empleado = Empleado::find($id);
        return view('admin.empleados.edit',compact('empleado'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $empleado = Empleado::find($id);

        $request->validate([
            'nombres' => 'required|max:150',
            'apellidos' => 'required|max:150',
            'telefono'=> 'required|max:10',
            'email' => 'required|max:150|unique:users,email,'.$empleado->user->id,
            'password'=> 'nullable|max:150|confirmed',
        ]);

        $empleado->nombres = $request->nombres;
        $empleado->apellidos = $request->apellidos;
        $empleado->telefono = $request->telefono;
        $empleado->save();

        $usuario = User::find($empleado->user->id);
        $usuario->name = $request->nombres;
        $usuario->email = $request->email;

        if($request->filled('password')){
            $usuario->password = Hash::make($request['password']); //Si el password tiene info. se actualiza la contra
        }

        $usuario->save();

        return redirect()->route('admin.empleados.index')
                ->with('mensaje','Se actualizó al empelado de forma correcta')
                ->with('icono','success');
    }

    /**
     * Remove the specified resource from storage.
     */

     public function confirmDelete($id)
     {
        $empleado = Empleado::find($id);
        return view('admin.empleados.delete',compact('empleado'));

     }
    public function destroy($id)
    {
        //Buscamos al empleado a eliminar
        $empleado = Empleado::find($id);  

        //Eliminar al usuario asociado
        $user = $empleado->user;
        $user->delete();

        //Eliminar al empelado
        $empleado->delete();
  
        return redirect()->route('admin.empleados.index')
            ->with('mensaje','Se eliminó el registro de forma correcta')
            ->with('icono','success');
    }

    public function reportes()
    {
        return view('admin.empleados.reportes');
    }

    public function pdf()
    {
        $configuracion = Configuracione::latest()->first();
        $empleados = Empleado::all();
        $pdf = SnappyPdf::loadView('admin.empleados.pdf', compact('configuracion','empleados'))
        ->setOption('footer-left', 'Impreso por: '.Auth::user()->email)  // Quien lo imprimio
        ->setOption('footer-center', 'Página [page] de [topage]')  // Numeración de página
        ->setOption('footer-right', 'Generado el: [date] - [time]')  // Fecha en el pie de página
        ->setOption('footer-font-size', 8)  // Tamaño de la fuente del pie de página
        ->setOption('footer-line', true)  // Línea separadora del pie de página
        ->setOption('margin-bottom', '15mm');  // Espacio para el pie de página

        return $pdf->inline('reporte.pdf');
    }
}
