@extends('layouts.admin')
@section('content')
    <div class="row">
        <h1>Actuzalización de sucursal: {{$sucursal->nombre}}</h1>
    </div>

    <hr>

    <div class="row">
        <div class="col-md-10">
            <div class="card card-outline card-success">
                <div class="card-header">
                    <h3 class="card-title">Ingrese los datos</h3>
                </div>
                <div class="card-body">
                    <form action="{{url('/admin/sucursales',$sucursal->id)}}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form group">
                                    <label for="">Nombre</label> <b style="color:#FF0000">*</b>
                                    <input type="text" value="{{$sucursal->nombre}}" name="nombre" class="form-control" required>
                                    @error('nombre')
                                        <small style="color:red">{{$message}}</small>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form group">
                                    <label for="">Ubicación</label> <b style="color:#FF0000">*</b>
                                    <input type="text" value="{{$sucursal->ubicacion}}" name="ubicacion" class="form-control" required>
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
                                    <input type="text" value="{{$sucursal->telefono}}" name="telefono" class="form-control">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form group">
                                    <label for="">Estado</label> <b style="color:#FF0000">*</b>
                                    <select name="estado" class="form-control">
                                        @if ($sucursal->estado=='Activo')
                                            <option value="Activo">Activo</option>
                                            <option value="Inactivo">Inactivo</option>
                                        @else
                                            <option value="Activo">Inactivo</option>
                                            <option value="Inactivo">Activo</option>
                                        @endif
                                    </select>
                                </div>
                            </div>

                        </div>
                        
                        <hr>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form group">
                                    <a href="{{url('admin/sucursales')}}" class="btn btn-secondary"> Cancelar </a>
                                    <button type="submit" class="btn btn-success">Actualizar sucursal</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection