@extends('layouts.admin')
@section('content')
    <div class="row">
        <h1>Categoria: {{$categoria->nombre}}</h1>
    </div>

    <hr>

    <div class="row">
        <div class="col-md-6">
            <div class="card card-outline card-primary">
                <div class="card-header">
                    <h3 class="card-title">Ingrese los datos</h3>
                </div>
                <div class="card-body">
                        <!-- Token de seguridad-->
                        @csrf
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
                                </div>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div>
@endsection