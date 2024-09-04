@extends('layouts.admin')
@section('content')
    <div class="row">
        <h1>Registro de un nuevo servicio</h1>
    </div>

    <hr>

    <div class="row">
        <div class="col-md-10">
            <div class="card card-outline card-primary">
                <div class="card-header">
                    <h3 class="card-title">Ingrese los datos</h3>
                </div>
                <div class="card-body">
                    <form action="{{url('/admin/servicios/create')}}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form group">
                                    <label for="">Nombre</label> <b style="color:#FF0000">*</b>
                                    <input type="text" value="{{old('nombre')}}" name="nombre" class="form-control" required>
                                    @error('nombre')
                                        <small style="color:red">{{$message}}</small>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form group">
                                    <label for="">Descripción</label> <b style="color:#FF0000">*</b>
                                    <input type="text" value="{{old('descripcion')}}" name="descripcion" class="form-control" required>
                                    @error('descripcion')
                                        <small style="color:red">{{$message}}</small>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form group">
                                    <label for="">Categoria</label> <b style="color:#FF0000">*</b>
                                    <select name="categoria_id" id="" class="form-control">
                                        @foreach ($categorias as $categoria)
                                            <option value={{$categoria->id}}>{{$categoria->nombre}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        
                        </div>

                        <br>

                        <div class="row">
                        <div class="col-md-6">
                                <div class="form group">
                                    <label for="">Duración (min.)</label> <b style="color:#FF0000">*</b>
                                    <input type="int" value="{{old('duracion')}}" name="duracion" class="form-control" required>
                                    @error('duracion')
                                        <small style="color:red">{{$message}}</small>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form group">
                                    <label for="">Empleado</label> <b style="color:#FF0000">*</b>
                                    <select name="empleado_id" id="" class="form-control">
                                        @foreach ($empleados as $empleado)
                                            <option value={{$empleado->id}}>{{$empleado->nombres." ".$empleado->apellidos}}</option>
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
                                    <button type="submit" class="btn btn-primary"> Registrar servicio</buttont>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection