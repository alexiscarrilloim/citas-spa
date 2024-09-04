@extends('layouts.admin')
@section('content')
    <div class="row">
        <h1>Datos del horario</h1>
    </div>

    <hr>

    <div class="row">
        <div class="col-md-6">
            <div class="card card-outline card-info">
                <div class="card-header">
                    <h3 class="card-title">Datos registrados</h3>
                </div>
                <div class="card-body">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form group">
                                    <label for="">Empleado</label> <b style="color:#FF0000">*</b>
                                    <p>{{$horario->empleado->nombres." ".$horario->empleado->apellidos}}</p>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form group">
                                    <label for="">Día</label> <b style="color:#FF0000">*</b>
                                   <p>{{$horario->dia}}</p>
                                </div>
                            </div>

                        </div>

                        <br>

                        <div class="row">

                            <div class="col-md-6">
                                <div class="form group">
                                    <label for="">Hora de inicio</label> <b style="color:#FF0000">*</b>
                                    <p>{{$horario->hora_inicio}}</p>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form group">
                                    <label for="">Hora final</label> <b style="color:#FF0000">*</b>
                                    <p>{{$horario->hora_fin}}</p>
                                </div>
                            </div>
                        
                        </div>

                        <hr>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form group">
                                    <a href="{{url('admin/horarios')}}" class="btn btn-secondary"> Regresar </a>
                                </div>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div>
@endsection