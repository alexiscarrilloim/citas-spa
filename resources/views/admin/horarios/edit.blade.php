@extends('layouts.admin')
@section('content')
<div class="row">
    <h1>Actualizar horario</h1>
</div>

<hr>

<div class="row">
    <div class="col-md-12">
        <div class="card card-outline card-primary">
            <div class="card-header">
                <h3 class="card-title">Ingrese los datos</h3>
            </div>
            <div class="card-body row">
                <div class="col-md-3">
                    <form action="{{url('/admin/horarios/create')}}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form group">
                                    <label for="">Servicio</label> <b style="color:#FF0000">*</b>
                                    <select name="servicio_id" id="servicio_select" class="form-control">
                                        <option hidden value="">--Seleccionar servicio--</option>
                                        @foreach ($servicios as $servicio)
                                            <option value="{{$servicio->id}}" {{$horario->servicio_id == $servicio->id ? 'selected' : ''}}>{{$servicio->nombre}}</option>
                                        @endforeach
                                    </select>
                                    <script>
                                        $('#servicio_select').on('change', function () {
                                            var servicio_id = $('#servicio_select').val();
                                            //alert(sucursal_id);

                                            if (servicio_id) {
                                                $.ajax({
                                                    url: "{{url('/servicios/')}}" + '/' + servicio_id,
                                                    type: 'GET',
                                                    success: function (data) {
                                                        $('#servicio_info').html(data);
                                                    },
                                                    error: function () {
                                                        alert('Error al obtener los datos de la sucursal');
                                                    }
                                                });
                                            } else {
                                                $('#servicio_info').html('');
                                            }
                                        });
                                    </script>
                                </div>
                            </div>
                            <br>
                            <div class="col-md-12">
                                <div class="form group">
                                    <label for="">Empleado</label> <b style="color:#FF0000">*</b>
                                    <select name="empleado_id" id="" class="form-control">
                                        <option hidden value="">--Seleccionar empleado--</option>
                                        @foreach ($empleados as $empleado)
                                        <option value="{{$empleado->id}}" {{$horario->empleado_id == $empleado->id ? 'selected' : ''}}>{{$empleado->nombres . " " . $empleado->apellidos}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <br>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form group">
                                    <label for="">Día</label> <b style="color:#FF0000">*</b>
                                    <select name="dia" id="" class="form-control">
                                        <option value="">Seleccionar día</option>
                                        <option value="Martes">Martes</option>
                                        <option value="Miercoles">Miércoles</option>
                                        <option value="Jueves">Jueves</option>
                                        <option value="Jueves">Viernes</option>
                                        <option value="Sabado">Sábado</option>
                                        <option value="Domingo">Domingo</option>
                                    </select>
                                </div>
                            </div>

                            <br>

                            <div class="col-md-12">
                                <div class="form group">
                                    <label for="">Hora de inicio</label> <b style="color:#FF0000">*</b>
                                    <input type="time" value="{{old('hora_inicio')}}" name="hora_inicio" class="form-control" required>
                                    @error('hora_inicio')
                                    <small style="color:red">{{$message}}</small>
                                    @enderror
                                </div>
                            </div>

                            <br>

                            <div class="col-md-12">
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

                <div class="col-md-9">
                <div id="sucursal_info"></div>
                <div id="servicio_info"></div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection