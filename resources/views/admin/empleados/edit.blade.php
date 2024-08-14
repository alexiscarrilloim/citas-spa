@extends('layouts.admin')
@section('content')
    <div class="row">
        <h1>Empleado: {{$empleado->nombres." ".$empleado->apellidos}}</h1>
    </div>

    <hr>

    <div class="row">
        <div class="col-md-10">
            <div class="card card-outline card-success">
                <div class="card-header">
                    <h3 class="card-title">Ingrese los datos</h3>
                </div>
                <div class="card-body">
                    <form action="{{url('/admin/empleados',$empleado->id)}}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form group">
                                    <label for="">Nombre</label> <b style="color:#FF0000">*</b>
                                    <input type="text" value="{{$empleado->nombres}}" name="nombres" class="form-control" required>
                                    @error('nombres')
                                        <small style="color:red">{{$message}}</small>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form group">
                                    <label for="">Apellidos</label> <b style="color:#FF0000">*</b>
                                    <input type="text" value="{{$empleado->apellidos}}" name="apellidos" class="form-control" required>
                                    @error('apellidos')
                                        <small style="color:red">{{$message}}</small>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form group">
                                    <label for="">Teléfono</label> <b style="color:#FF0000">*</b>
                                    <input type="text" value="{{$empleado->telefono}}" name="telefono" class="form-control" required>
                                    @error('telefono')
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
                                    <input type="email" value="{{$empleado->user->email}}" name="email" class="form-control" required>
                                    @error('email')
                                        <small style="color:red">{{$message}}</small>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form group">
                                    <label for="">Contraseña</label> 
                                    <input type="password" name="password" class="form-control">
                                    @error('password')
                                        <small style="color:red">{{$message}}</small>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form group">
                                    <label for="">Verificación de contraseña</label> 
                                    <input type="password" name="password_confirmation" class="form-control">
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
                                    <a href="{{url('admin/empleados')}}" class="btn btn-secondary"> Cancelar </a>
                                    <button type="submit" class="btn btn-success"> Actualizar empleado</buttonty>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection