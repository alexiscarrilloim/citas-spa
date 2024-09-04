@extends('layouts.admin')
@section('content')
    <div class="row">
        <h1>Eliminar categoria: {{$categoria->nombre}}</h1>
    </div>

    <hr>

    <div class="row">
        <div class="col-md-6">
            <div class="card card-danger">
                <div class="card-header">
                    <h3 class="card-title">¿Está seguro de eliminar este registro?</h3>
                </div>
                <div class="card-body">
                        <form action="{{url('/admin/categorias',$categoria->id)}}" method="POST">
                            <!-- Token de seguridad-->
                            @csrf
                            @method('DELETE')
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form group">
                                        <label for="">Nombre de categoría</label> <b style="color:#FF0000">*</b>
                                        <p>{{$categoria->nombre}}</p>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form group">
                                        <label for="">Estado</label> <b style="color:#FF0000">*</b>
                                        <p>{{$categoria->estado}}</p>
                                    </div>
                                </div>
                            </div>

                            <hr>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form group">
                                        <a href="{{url('admin/categorias')}}" class="btn btn-secondary"> Regresar </a>
                                        <button type="submit" class="btn btn-danger">Eliminar categoría</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                </div>
            </div>
        </div>
    </div>
@endsection