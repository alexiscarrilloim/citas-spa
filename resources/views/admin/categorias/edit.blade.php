@extends('layouts.admin')
@section('content')
    <div class="row">
        <h1>Actulizar categoria: {{$categoria->nombre}}</h1>
    </div>

    <hr>

    <div class="row">
        <div class="col-md-10">
            <div class="card card-outline card-success">
                <div class="card-header">
                    <h3 class="card-title">Ingrese los datos</h3>
                </div>
                <div class="card-body">
                    <form action="{{url('/admin/categorias',$categoria->id)}}" method="POST">
                        <!-- Token de seguridad-->
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form group">
                                    <label for="">Nombre de categoría</label> <b style="color:#FF0000">*</b>
                                    <input type="text" value="{{$categoria->nombre}}" name="nombre" class="form-control" required>
                                    @error('nombre')
                                        <small style="color:red">{{$message}}</small>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form group">
                                    <label for="">Estado</label> <b style="color:#FF0000">*</b>
                                    <select name="estado" class="form-control">
                                        <option value="activa" {{ $categoria->estado === 'Activa' ? 'selected' : '' }}>Activa</option>
                                        <option value="inactiva" {{ $categoria->estado === 'Inactiva' ? 'selected' : '' }}>Inactiva</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <hr>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form group">
                                    <a href="{{url('admin/categorias')}}" class="btn btn-secondary"> Cancelar </a>
                                    <button type="submit" class="btn btn-success"> Actualizar categoria</buttont>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection