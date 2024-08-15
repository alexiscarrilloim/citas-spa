@extends('layouts.admin')
@section('content')
    <div class="row">
        <h1>Registro de un nuevo horario</h1>
    </div>

    <hr>

    <div class="row">
        <div class="col-md-10">
            <div class="card card-outline card-primary">
                <div class="card-header">
                    <h3 class="card-title">Ingrese los datos</h3>
                </div>
                <div class="card-body">
                    <form action="{{url('/admin/horarios/create')}}" method="POST">
                        @csrf
                        <div class="row">
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

                            <div class="col-md-6">
                                <div class="form group">
                                    <label for="">Sucursal</label> <b style="color:#FF0000">*</b>
                                    <select name="sucursal_id" id="" class="form-control">
                                        @foreach ($sucursales as $sucursal)
                                            <option value={{$sucursal->id}}>{{$sucursal->nombre." - ".$sucursal->ubicacion}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                        </div>

                        <br>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form group">
                                    <label for="">Día</label> <b style="color:#FF0000">*</b>
                                    <select name="dia" id="" class="form-control">
                                        <option value="Martes">Martes</option>
                                        <option value="Miercoles">Miércoles</option>
                                        <option value="Jueves">Jueves</option>
                                        <option value="Jueves">Viernes</option>
                                        <option value="Sabado">Sábado</option>
                                        <option value="Domingo">Domingo</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form group">
                                    <label for="">Hora de inicio</label> <b style="color:#FF0000">*</b>
                                    <input type="time" value="{{old('hora_inicio')}}" name="hora_inicio" class="form-control" required>
                                    @error('hora_inicio')
                                        <small style="color:red">{{$message}}</small>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form group">
                                    <label for="">Hora final</label> <b style="color:#FF0000">*</b>
                                    <input type="time" value="{{old('hora_fin')}}" name="hora_fin" class="form-control" required>
                                    @error('hora_fin')
                                        <small style="color:red">{{$message}}</small>
                                    @enderror
                                </div>
                            </div>
                        
                        </div>

                        <hr>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form group">
                                    <a href="{{url('admin/horarios')}}" class="btn btn-secondary"> Cancelar </a>
                                    <button type="submit" class="btn btn-primary"> Registrar horaio</buttonty>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection