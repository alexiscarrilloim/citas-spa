@extends('layouts.admin')
@section('content')
    <div class="row">
        <h1>Registro de un nuevo cliente</h1>
    </div>

    <hr>

    <div class="row">
        <div class="col-md-10">
            <div class="card card-outline card-primary">
                <div class="card-header">
                    <h3 class="card-title">Ingrese los datos</h3>
                </div>
                <div class="card-body">
                    <form action="{{url('/admin/clientes/create')}}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form group">
                                    <label for="">Nombre</label> <b style="color:#FF0000">*</b>
                                    <input type="text" value="{{old('nombres')}}" name="nombres" class="form-control" required>
                                    @error('nombres')
                                        <small style="color:red">{{$message}}</small>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form group">
                                    <label for="">Apellidos</label> <b style="color:#FF0000">*</b>
                                    <input type="text" value="{{old('apellidos')}}" name="apellidos" class="form-control" required>
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
                                    <input type="text" value="{{old('celular')}}" name="celular" class="form-control" required>
                                    @error('celular')
                                        <small style="color:red">{{$message}}</small>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form group">
                                    <label for="">Email</label> <b style="color:#FF0000">*</b>
                                    <input type="email" value="{{old('correo')}}" name="correo" class="form-control" required>
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
                                    <button type="submit" class="btn btn-primary"> Registrar usuario</buttonty>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection