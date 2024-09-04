@extends('layouts.admin')
@section('content')
    <div class="row">
        <h1>Modificar servicio: {{$servicio->nombre}}</h1>
    </div>

    <hr>

    <div class="row">
        <div class="col-md-12">
            <div class="card card-outline card-success">
                <div class="card-header">
                    <h3 class="card-title">Ingrese los datos</h3>
                </div>
                <div class="card-body">
                    <form action="{{url('/admin/servicios',$servicio->id)}}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form group">
                                    <label for="">Nombre</label> <b style="color:#FF0000">*</b>
                                    <input type="text" value="{{$servicio->nombre}}" name="nombre" class="form-control" required>
                                    @error('nombre')
                                        <small style="color:red">{{$message}}</small>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form group">
                                    <label for="">Descripción</label>
                                    <input type="text" value="{{$servicio->descripcion}}" name="descripcion" class="form-control" required>
                                    @error('descripcion')
                                        <small style="color:red">{{$message}}</small>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form group">
                                    <label for="">Duración (min.)</label>
                                    <input type="text" value="{{$servicio->duracion}}" name="duracion" class="form-control" required>
                                    @error('duracion')
                                        <small style="color:red">{{$message}}</small>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <br>

                        <div class="row">
                        <div class="col-md-4">
                                <div class="form group">
                                <label for="">Empleado</label> 
                                    <select name="empleado_id" id="" class="form-control">
                                        @foreach ($empleados as $empleado)
                                            <option value={{$empleado->id}}>{{$empleado->nombres." ".$empleado->apellidos}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form group">
                                <label for="">Categoria</label> 
                                    <select name="categoria_id" id="" class="form-control">
                                        @foreach ($categorias as $categoria)
                                            <option value={{$categoria->id}}>{{$categoria->nombre}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>

                        <hr>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form group">
                                    <a href="{{url('admin/servicios')}}" class="btn btn-secondary"> Cancelar </a>
                                    <button type="submit" class="btn btn-success"> Actualizar registro</buttonty>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection