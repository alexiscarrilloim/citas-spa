@extends('layouts.admin')
@section('content')
    <div class="row">
        <h1>Panel principal</h1>
    </div>
    <hr>
    <div class="row">
        <div class="col-lg-3 col-6">
            <div class="small-box bg-info">
                <div class="inner">
                    <h3>{{$total_usuarios}}</h3>
                    <p>Usuarios</p>
                </div>
                <div class="icon">
                    <i class="ion fas bi bi-file-person"></i>
                </div>
                    <a href="{{url('admin/usuarios')}}" class="small-box-footer"> Mas información <i class="fas bi bi-plus-circle"></i></i></a>
            </div>
        </div>

        <div class="col-lg-3 col-6">
            <div class="small-box bg-primary">
                <div class="inner">
                    <h3>{{$total_secretarias}}</h3>
                    <p>Recepcionistas</p>
                </div>
                <div class="icon">
                    <i class="ion fas bi bi-person-workspace"></i>
                </div>
                    <a href="{{url('admin/secretarias')}}" class="small-box-footer"> Mas información <i class="fas bi bi-plus-circle"></i></i></a>
            </div>
        </div>

        <div class="col-lg-3 col-6">
            <div class="small-box bg-success">
                <div class="inner">
                    <h3>{{$total_clientes}}</h3>
                    <p>Clientes</p>
                </div>
                <div class="icon">
                    <i class="ion fas bi bi-person-fill-check"></i>
                </div>
                    <a href="{{url('admin/clientes')}}" class="small-box-footer"> Mas información <i class="fas bi bi-plus-circle"></i></i></a>
            </div>
        </div>

        <div class="col-lg-3 col-6">
            <div class="small-box bg-warning">
                <div class="inner">
                    <h3>{{$total_sucursales}}</h3>
                    <p>Sucursales</p>
                </div>
                <div class="icon">
                    <i class="ion fas bi bi-building-fill-add"></i>
                </div>
                    <a href="{{url('admin/sucursales')}}" class="small-box-footer"> Mas información <i class="fas bi bi-plus-circle"></i></i></a>
            </div>
        </div>

        <div class="col-lg-3 col-6">
            <div class="small-box bg-danger">
                <div class="inner">
                    <h3>{{$total_empleados}}</h3>
                    <p>Empleados</p>
                </div>
                <div class="icon">
                    <i class="ion fas bi bi-person-vcard"></i>
                </div>
                    <a href="{{url('admin/sucursales')}}" class="small-box-footer"> Mas información <i class="fas bi bi-plus-circle"></i></i></a>
            </div>
        </div>

    </div>
@endsection