<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Configuracione;
use App\Models\Historial;
use Barryvdh\Snappy\Facades\SnappyPdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HistorialController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $clientes = Cliente::orderBy('nombres','asc')->get();
        $historiales = Historial::with('cliente','empleado')->get();
        return view("admin.historial.index", compact("historiales","clientes"));
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
        //$datos = $request->all();  //Recibir datos en cadena json
        //return response()->json($datos);

        $request->validate([
            'cliente_id' => 'exists:clientes,id',
            'detalle' => 'required',
            'fecha_visita'=> 'required',
        ]);

        $historial = new Historial();

        $historial->detalle = $request->detalle;
        $historial->fecha_visita = $request->fecha_visita;
        $historial->cliente_id = $request->cliente_id;
        $historial->empleado_id = Auth::user()->empleado->id;

        $historial->save();

        return redirect()->route('admin.historial.index')
                ->with('mensaje','Se registró el nuevo historial de la cita de forma correcta')
                ->with('icono','success');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $historial = Historial::find($id);
        return view('admin.historial.show',compact('historial'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $historial = Historial::find($id);
        $clientes = Cliente::orderBy('nombres','asc')->get();
        return view('admin.historial.edit',compact('historial','clientes'));
    }
    

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //$datos = $request->all();  //Recibir datos en cadena json
        //return response()->json($datos);

        $historial = Historial::find($id);

        $historial->detalle = $request->detalle;
        $historial->fecha_visita = $request->fecha_visita;
        $historial->cliente_id = $request->cliente_id;
        $historial->empleado_id = Auth::user()->empleado->id;

        $historial->save();

        return redirect()->route('admin.historial.index')
                ->with('mensaje','Se actualizó el nuevo historial de la cita de forma correcta')
                ->with('icono','success');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Historial::destroy($id);
        return redirect()->route('admin.historial.index')
        ->with('mensaje','Se eliminó el nuevo historial de la cita de forma correcta')
        ->with('icono','success');
    }

    public function pdf($id)
    {
        $configuracion = Configuracione::latest()->first();
        $historial = Historial::find($id);
        $pdf = SnappyPdf::loadView('admin.historial.pdf', compact('configuracion','historial'))
        ->setOption('footer-left', 'Impreso por: '.Auth::user()->email)  // Quien lo imprimio
        ->setOption('footer-center', 'Página [page] de [topage]')  // Numeración de página
        ->setOption('footer-right', 'Generado el: [date] - [time]')  // Fecha en el pie de página
        ->setOption('footer-font-size', 8)  // Tamaño de la fuente del pie de página
        ->setOption('footer-line', true)  // Línea separadora del pie de página
        ->setOption('margin-bottom', '15mm');  // Espacio para el pie de página

        return $pdf->inline('reporte.pdf');
    }
}
