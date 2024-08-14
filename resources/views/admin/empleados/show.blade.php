@extends('layouts.admin')
@section('content')
    <div class="row">
        <h1>Empleado: {{$empleado->nombres." ".$empleado->apellidos}}</h1>
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
                                    <label for="">Nombre</label> 
                                    <p>{{$empleado->nombres}}</p>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form group">
                                    <label for="">Apellidos</label> 
                                    <p>{{$empleado->apellidos}}</p>
                                </div>
                            </div>
                        </div>

                        <br>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form group">
                                    <label for="">Teléfono</label> 
                                    <p>{{$empleado->telefono}}</p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form group">
                                    <label for="">Email</label> 
                                    <p>{{$empleado->user->email}}</p>
                                </div>
                            </div>
                        </div>

                        <hr>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form group">
                                    <a href="{{url('admin/empleados')}}" class="btn btn-secondary"> Regresar </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection