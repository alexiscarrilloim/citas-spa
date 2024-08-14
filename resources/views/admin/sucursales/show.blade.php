@extends('layouts.admin')
@section('content')
    <div class="row">
        <h1>Sucursal: {{$sucursal->nombre}}</h1>
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
                                    <p>{{$sucursal->nombre}}</p>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form group">
                                    <label for="">Ubicación</label> 
                                    <p>{{$sucursal->ubicacion}}</p>
                                </div>
                            </div>
                        </div>

                        <br>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form group">
                                    <label for="">Teléfono</label> 
                                    @if ($sucursal->telefono==null)
                                        <p>Sin Teléfono fijo</p>
                                    @else
                                        <p>{{$sucursal->telefono}}</p>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form group">
                                    <label for="">Estado</label> 
                                    <p>{{$sucursal->estado}}</p>
                                </div>
                            </div>
                        </div>

                        <hr>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form group">
                                    <a href="{{url('admin/sucursales')}}" class="btn btn-secondary"> Regresar </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection