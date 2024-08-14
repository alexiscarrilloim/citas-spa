@extends('layouts.admin')
@section('content')
    <div class="row">
        <h1>Recepcionista: {{$secretaria->nombres}} {{$secretaria->apellidos}} </h1>
    </div>

    <hr>

    <div class="row">
        <div class="col-md-10">
            <div class="card card-outline card-info">
                <div class="card-header">
                    <h3 class="card-title">Datos registrados</h3>
                </div>
                <div class="card-body">
                        @csrf
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form group">
                                    <label for="">Nombre</label> 
                                    <p>{{$secretaria->nombres}}</p>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form group">
                                    <label for="">Apellidos</label> 
                                    <p>{{$secretaria->apellidos}}</p>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form group">
                                    <label for="">RFC</label> 
                                    <p>{{$secretaria->rfc}}</p>
                                </div>
                            </div>

                        </div>

                    

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form group">
                                    <label for="">Dirección</label> 
                                    <p>{{$secretaria->direccion}}</p>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form group">
                                    <label for="">Celular</label> 
                                    <p>{{$secretaria->celular}}</p>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form group">
                                    <label for="">Email</label> 
                                    <p>{{$secretaria->user->email}}</p>
                                </div>
                            </div>
                        </div>

                        <hr>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form group">
                                    <a href="{{url('admin/secretarias')}}" class="btn btn-secondary"> Regresar </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection