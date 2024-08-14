@extends('layouts.admin')
@section('content')
    <div class="row">
        <h1>Empleado: {{$empleado->nombres." ".$empleado->apellidos}}</h1>
    </div>

    <hr>

    <div class="row">
        <div class="col-md-6">
            <div class="card card-danger">
                <div class="card-header">
                    <h3 class="card-title">¿Está seguro de eliminar este registro?</h3>
                </div>
                <div class="card-body">
                    <form action="{{url('/admin/empleados',$empleado->id)}}" method="POST">
                        @csrf
                        @method('DELETE')
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
                                    <button type="submit" class="btn btn-danger"> Eliminar empleado</buttonty>
                                </div>
                            </div>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
@endsection