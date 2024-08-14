@extends('layouts.admin')
@section('content')
    <div class="row">
        <h1>Registro de un nueva sucursal</h1>
    </div>

    <hr>

    <div class="row">
        <div class="col-md-10">
            <div class="card card-outline card-primary">
                <div class="card-header">
                    <h3 class="card-title">Ingrese los datos</h3>
                </div>
                <div class="card-body">
                    <form action="{{url('/admin/sucursales/create')}}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form group">
                                    <label for="">Nombre</label> <b style="color:#FF0000">*</b>
                                    <input type="text" value="{{old('nombre')}}" name="nombre" class="form-control" required>
                                    @error('nombre')
                                        <small style="color:red">{{$message}}</small>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form group">
                                    <label for="">Ubicación</label> <b style="color:#FF0000">*</b>
                                    <input type="text" value="{{old('ubicacion')}}" name="ubicacion" class="form-control" required>
                                    @error('ubicacion')
                                        <small style="color:red">{{$message}}</small>
                                    @enderror
                                </div>
                            </div>
                        
                        </div>

                        <br>

                        <div class="row">
                        <div class="col-md-6">
                                <div class="form group">
                                    <label for="">Teléfono</label>
                                    <input type="text" value="{{old('telefono')}}" name="telefono" class="form-control">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form group">
                                    <label for="">Estado</label> <b style="color:#FF0000">*</b>
                                    <select name="estado" class="form-control">
                                        <option value="Activo">Activo</option>
                                        <option value="Inactivo">Inactivo</option>
                                    </select>
                                </div>
                            </div>

                        </div>

                        

                        <hr>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form group">
                                    <a href="{{url('admin/sucursales')}}" class="btn btn-secondary"> Cancelar </a>
                                    <button type="submit" class="btn btn-primary"> Registrar sucursal</buttonty>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection