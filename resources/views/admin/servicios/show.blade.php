@extends('layouts.admin')
@section('content')
    <div class="row">
        <h1>Servicio: {{$servicio->nombre}}</h1>
    </div>

    <hr>

    <div class="row">
        <div class="col-md-6">
            <div class="card card-outline card-info">
                <div class="card-header">
                    <h3 class="card-title">Datos registrados</h3>
                </div>
                <div class="card-body">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form group">
                                    <label for="">Nombre del servicio</label> 
                                    <p>{{$servicio->nombre}}</p>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form group">
                                    <label>Descripción del servicio</label> 
                                    <p>{{$servicio->descripcion}}</p>
                                </div>
                            </div>
                        </div>

                        <br>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form group">
                                    <label for="">Duración</label> 
                                    <p>{{$servicio->duracion}}</p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form group">
                                    <label for="">Empleado</label> 
                                    @if($servicio->empleados->isNotEmpty())
                                        <p>{{ $servicio->empleados->first()->nombres." ".$servicio->empleados->first()->apellidos}}</p>
                                    @else
                                        <p>No hay empleados asignados a este servicio.</p>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <hr>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form group">
                                    <a href="{{url('admin/servicios')}}" class="btn btn-secondary"> Regresar </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection