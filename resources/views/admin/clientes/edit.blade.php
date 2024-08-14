@extends('layouts.admin')
@section('content')
    <div class="row">
        <h1>Modificar cliente: {{$cliente->nombres." ".$cliente->apellidos}}</h1>
    </div>

    <hr>

    <div class="row">
        <div class="col-md-10">
            <div class="card card-outline card-success">
                <div class="card-header">
                    <h3 class="card-title">Ingrese los datos</h3>
                </div>
                <div class="card-body">
                    <form action="{{url('/admin/clientes',$cliente->id)}}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form group">
                                    <label for="">Nombre</label> <b style="color:#FF0000">*</b>
                                    <input type="text" value="{{$cliente->nombres}}" name="nombres" class="form-control" required>
                                    @error('nombres')
                                        <small style="color:red">{{$message}}</small>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form group">
                                    <label for="">Apellidos</label> <b style="color:#FF0000">*</b>
                                    <input type="text" value="{{$cliente->apellidos}}" name="apellidos" class="form-control" required>
                                    @error('apellidos')
                                        <small style="color:red">{{$message}}</small>
                                    @enderror
                                </div>
                            </div>
                        
                        </div>

                        <br>

                        <div class="row">
                        <div class="col-md-6">
                                <div class="form group">
                                    <label for="">Celular</label> <b style="color:#FF0000">*</b>
                                    <input type="text" value="{{$cliente->celular}}" name="celular" class="form-control" required>
                                    @error('celular')
                                        <small style="color:red">{{$message}}</small>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form group">
                                    <label for="">Email</label> <b style="color:#FF0000">*</b>
                                    <input type="email" value="{{$cliente->correo}}" name="correo" class="form-control" required>
                                    @error('correo')
                                        <small style="color:red">{{$message}}</small>
                                    @enderror
                                </div>
                            </div>

                        </div>

                        

                        <hr>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form group">
                                    <a href="{{url('admin/clientes')}}" class="btn btn-secondary"> Cancelar </a>
                                    <button type="submit" class="btn btn-success"> Actualizar cliente</buttonty>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection