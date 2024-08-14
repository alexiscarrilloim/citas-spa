@extends('layouts.admin')
@section('content')
    <div class="row">
        <h1>Registro de una nueva recepcionista</h1>
    </div>

    <hr>

    <div class="row">
        <div class="col-md-12">
            <div class="card card-outline card-primary">
                <div class="card-header">
                    <h3 class="card-title">Ingrese los datos</h3>
                </div>
                <div class="card-body">
                    <form action="{{url('/admin/secretarias/create')}}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form group">
                                    <label for="">Nombre</label> <b style="color:#FF0000">*</b>
                                    <input type="text" value="{{old('nombres')}}" name="nombres" class="form-control" required>
                                    @error('nombres')
                                        <small style="color:red">{{$message}}</small>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form group">
                                    <label for="">Apellidos</label> <b style="color:#FF0000">*</b>
                                    <input type="text" value="{{old('apellidos')}}" name="apellidos" class="form-control" required>
                                    @error('apellidos')
                                        <small style="color:red">{{$message}}</small>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form group">
                                    <label for="">RFC</label> <b style="color:#FF0000">*</b>
                                    <input type="text" value="{{old('rfc')}}" name="rfc" class="form-control" required>
                                    @error('rfc')
                                        <small style="color:red">{{$message}}</small>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <br>

                        <div class="row">
                        <div class="col-md-3">
                                <div class="form group">
                                    <label for="">Celular</label> <b style="color:#FF0000">*</b>
                                    <input type="text" value="{{old('celular')}}" name="celular" class="form-control" required>
                                    @error('celular')
                                        <small style="color:red">{{$message}}</small>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-9">
                                <div class="form group">
                                    <label for="">Dirección</label> <b style="color:#FF0000">*</b>
                                    <input type="text" value="{{old('direccion')}}" name="direccion" class="form-control" required>
                                    @error('direccion')
                                        <small style="color:red">{{$message}}</small>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <br>

                        <div class="row">

                            <div class="col-md-4">
                                <div class="form group">
                                    <label for="">Email</label> <b style="color:#FF0000">*</b>
                                    <input type="text" value="{{old('email')}}" name="email" class="form-control" required>
                                    @error('email')
                                        <small style="color:red">{{$message}}</small>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form group">
                                    <label for="">Contraseña</label> <b style="color:#FF0000">*</b>
                                    <input type="password" value="{{old('password')}}" name="password" class="form-control" required>
                                    @error('password')
                                        <small style="color:red">{{$message}}</small>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form group">
                                    <label for="">Verificación de contraseña</label> <b style="color:#FF0000">*</b>
                                    <input type="password" name="password_confirmation" class="form-control" required>
                                    @error('password_confirmation')
                                        <small style="color:red">{{$message}}</small>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <hr>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form group">
                                    <a href="{{url('admin/secretarias')}}" class="btn btn-secondary"> Cancelar </a>
                                    <button type="submit" class="btn btn-primary"> Registrar nuevo</buttonty>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection