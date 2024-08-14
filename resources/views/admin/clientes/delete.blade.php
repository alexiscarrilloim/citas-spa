@extends('layouts.admin')
@section('content')
    <div class="row">
        <h1>Cliente: {{$cliente->nombres." ".$cliente->apellidos}}</h1>
    </div>

    <hr>

    <div class="row">
        <div class="col-md-6">
            <div class="card card-danger">
                <div class="card-header">
                    <h3 class="card-title">¿Está seguro de eliminar este registro?</h3>
                </div>
                <div class="card-body">
                        <form action="{{url('/admin/clientes',$cliente->id)}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form group">
                                    <label for="">Nombre</label> 
                                    <p>{{$cliente->nombres}}</p>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form group">
                                    <label for="">Apellidos</label> 
                                    <p>{{$cliente->apellidos}}</p>
                                </div>
                            </div>
                        </div>

                        <br>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form group">
                                    <label for="">Celular</label> 
                                    <p>{{$cliente->celular}}</p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form group">
                                    <label for="">Email</label> 
                                    <p>{{$cliente->correo}}</p>
                                </div>
                            </div>
                        </div>

                        <hr>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form group">
                                    <a href="{{url('admin/clientes')}}" class="btn btn-secondary"> Regresar </a>
                                    <button type="submit" class="btn btn-danger"> Eliminar cliente</buttonty>
                                </div>
                            </div>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
@endsection