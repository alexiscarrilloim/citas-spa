@extends('layouts.admin')
@section('content')
    <div class="row">
        <h1>Cliente: {{$historial->cliente->nombres . " " . $historial->cliente->apellidos}}</h1>
    </div>

    <hr>

    <div class="row">
        <div class="col-md-12">
            <div class="card card-outline card-info">
                <div class="card-header">
                    <h3 class="card-title">Datos registrados</h3>
                </div>
                <div class="card-body">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form group">
                                    <label for="">Nombre del cliente</label>
                                    <p>{{$historial->cliente->nombres . " " . $historial->cliente->apellidos}}</p>
                                </div>
                            </div>
                        
                            <div class="col-md-6">
                                <div class="form group">
                                    <label for="">Fecha de la cita</label>
                                    <p>{{$historial->fecha_visita}}</p>
                                </div>
                            </div>
                        </div>

                        <br>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form group">
                                    <label for="">Detalles de visita</label> 
                                    <p>{!!$historial->detalle!!}</p>
                                </div>
                            </div>
                        </div>

                        <hr>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form group">
                                    <a href="{{url('admin/historial')}}" class="btn btn-secondary"> Regresar </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection