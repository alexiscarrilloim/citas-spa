@extends('layouts.admin')
@section('content')
<div class="row">
    <h3><b>Bienvenido:</b> {{Auth::user()->email}} / <b>Rol:</b> {{Auth::user()->roles->pluck('name')->first()}}</h3>
</div>
<hr>
<div class="row">

    @can('admin.usuarios.index')
        <div class="col-lg-3 col-6">
            <div class="small-box bg-info">
                <div class="inner">
                    <h3>{{$total_usuarios}}</h3>
                    <p>Usuarios</p>
                </div>
                <div class="icon">
                    <i class="ion fas bi bi-file-person"></i>
                </div>
                <a href="{{url('admin/usuarios')}}" class="small-box-footer"> Mas información <i class="fas bi bi-arrow-right-circle"></i></i></a>
            </div>
        </div>
    @endcan

    @can('admin.secretarias.index')
        <div class="col-lg-3 col-6">
            <div class="small-box bg-primary">
                <div class="inner">
                    <h3>{{$total_secretarias}}</h3>
                    <p>Secretarias</p>
                </div>
                <div class="icon">
                    <i class="ion fas bi bi-person-workspace"></i>
                </div>
                <a href="{{url('admin/secretarias')}}" class="small-box-footer"> Mas información <i class="fas bi bi-arrow-right-circle"></i></i></a>
            </div>
        </div>
    @endcan

    @can('admin.empleados.index')
        <div class="col-lg-3 col-6">
            <div class="small-box bg-danger">
                <div class="inner">
                    <h3>{{$total_empleados}}</h3>
                    <p>Empleados</p>
                </div>
                <div class="icon">
                    <i class="ion fas bi bi-person-vcard"></i>
                </div>
                <a href="{{url('admin/empleados')}}" class="small-box-footer"> Mas información <i class="fas bi bi-arrow-right-circle"></i></i></a>
            </div>
        </div>
    @endcan

    @can('admin.clientes.index')
        <div class="col-lg-3 col-6">
            <div class="small-box bg-success">
                <div class="inner">
                    <h3>{{$total_clientes}}</h3>
                    <p>Clientes</p>
                </div>
                <div class="icon">
                    <i class="ion fas bi bi-person-fill-check"></i>
                </div>
                <a href="{{url('admin/clientes')}}" class="small-box-footer"> Mas información <i class="fas bi bi-arrow-right-circle"></i></i></a>
            </div>
        </div>
    @endcan

    @can('admin.categorias.index')
        <div class="col-lg-3 col-6">
            <div class="small-box bg-lightblue">
                <div class="inner">
                    <h3>{{$total_categorias}}</h3>
                    <p>Categorias</p>
                </div>
                <div class="icon">
                    <i class="ion fas bi bi-list-ul"></i>
                </div>
                <a href="{{url('admin/categorias')}}" class="small-box-footer"> Mas información <i class="fas bi bi-arrow-right-circle"></i></i></a>
            </div>
        </div>
    @endcan

    @can('admin.servicios.index')
        <div class="col-lg-3 col-6">
            <div class="small-box bg-secondary">
                <div class="inner">
                    <h3>{{$total_servicios}}</h3>
                    <p>Servicios</p>
                </div>
                <div class="icon">
                    <i class="ion fas bi bi-tags-fill"></i>
                </div>
                <a href="{{url('admin/servicios')}}" class="small-box-footer"> Mas información <i class="fas bi bi-arrow-right-circle"></i></i></a>
            </div>
        </div>
    @endcan
    @can('admin.horarios.index')
        <div class="col-lg-3 col-6">
            <div class="small-box bg-indigo">
                <div class="inner">
                    <h3>{{$total_horarios}}</h3>
                    <p>Horarios</p>
                </div>
                <div class="icon">
                    <i class="ion fas  bi bi-clock-history"></i>
                </div>
                <a href="{{url('admin/horarios')}}" class="small-box-footer"> Mas información <i class="fas bi bi-arrow-right-circle"></i></i></a>
            </div>
        </div>
    @endcan
    @can('admin.horarios.index')
        <div class="col-lg-3 col-6">
            <div class="small-box bg-purple">
                <div class="inner">
                    <h3>{{$total_eventos}}</h3>
                    <p>Reservas</p>
                </div>
                <div class="icon">
                    <i class="ion fas bi bi-calendar-check"></i>
                </div>
                <a href="" class="small-box-footer"> <i class="fas bi bi-calendar-check"></i></i></a>
            </div>
        </div>
    @endcan

</div>

<br>

@can('admin.horarios.cargar_datos_servicios')
    <div class="row">
        <div class="col-md-12">
            <div class="card card-outline card-primary">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-4">
                            <h3 class="card-title">Calendario de horarios</h3>
                        </div>
                        <div class="col-md-4">
                            <div class="" style="float: right">
                                <label for="">Servicio:</label>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <select name="servicio_id" id="servicio_select" class="form-control">
                                <option hidden value="">--Seleccionar servicio--</option>
                                @foreach ($servicios as $servicio)
                                    <option value="{{$servicio->id}}"> {{$servicio->nombre}} </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <script>
                        $('#servicio_select').on('change', function() {
                            var servicio_id = $('#servicio_select').val();

                            if (servicio_id) {
                                $.ajax({
                                    url: "{{url('/servicios/')}}" + '/' + servicio_id,
                                    type: 'GET',
                                    success: function(data) {
                                        $('#servicio_info').html(data);
                                    },
                                    error: function() {
                                        alert('Error al obtener los datos del servicio');
                                    }
                                });
                            } else {
                                $('#servicio_info').html('');
                            }
                        });
                    </script>
                    <div id="servicio_info"></div>
                </div>
            </div>
        </div>
    </div>

    <br>

    <div class="row">
        <div class="col-md-12">
            <div class="card card-outline card-warning">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-4">
                            <h3 class="card-title">Calendario de reservas de citas</h3>
                        </div>
                        <div class="col-md-4">
                            <div class="" style="float: right">
                                <label for="">profesional: </label> 
                            </div>
                        </div>
                        <div class="col-md-4">
                            <select name="empleado_id" id="empleado_select2" class="form-control">
                                <option hidden value="">--Seleccione al profesional--</option>
                                    @foreach ($empleados as $empleado)
                                        <option value="{{$empleado->id}}"> {{$empleado->nombres . " " . $empleado->apellidos}} </option>
                                    @endforeach
                            </select>
                            <script>
                                $('#empleado_select2').on('change', function () {
                                    var empleado_id = $('#empleado_select2').val();
                                  
                                    var calendarEl = document.getElementById('calendar');
                                    var calendar = new FullCalendar.Calendar(calendarEl, {
                                        initialView: 'dayGridMonth',
                                        locales: 'es',
                                        headerToolbar: {
                                            left: 'prev,next,today',
                                            center: 'title',
                                            right: 'dayGridMonth,timeGridWeek,timeGridDay' // user can switch between the two
                                        },
                                        events: [],
                                    });

                                    if (empleado_id) {
                                        $.ajax({
                                            url: "{{url('/cargar_reserva_empleados/')}}" + '/' + empleado_id,
                                            type: 'GET',
                                            dataType: 'json',
                                            success: function (data) {
                                                calendar.removeAllEventSources();
                                                calendar.addEventSource(data);
                                            },
                                            error: function () {
                                                alert('Error al obtener los datos de la sucursal');
                                            }
                                        });
                                    } else {
                                        $('#empleado').html('');
                                    }
                                    calendar.render();
                                });
                            </script>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                            Reservar cita
                        </button>

                        <a href="{{url('/admin/ver_reservas', Auth::user()->id)}}" class="btn btn-success"> <i class="bi bi-calendar-check"></i> Ver las reservas</a>

                        <!-- Modal -->
                        <form action="{{url('/admin/eventos/create')}}" method="post">
                            @csrf
                            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Reserva de cita para Spa</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="">Servicio</label> <b style="color:#FF0000">*</b>
                                                        <select name="servicio_id" id="servicio_select" class="form-control" required>
                                                            <option hidden value="">--Seleccione un servicio--</option>
                                                            @foreach ($servicios as $servicio)  
                                                                <option value="{{$servicio->id}}">{{$servicio->nombre}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="">Profesional</label> <b style="color:#FF0000">*</b>
                                                        <select name="empleado_id" id="empleado_select2" class="form-control" required>
                                                            <option hidden value="">--Seleccione un profesional--</option>
                                                                @foreach($empleados as $empleado)
                                                                        <option value="{{$empleado->id}}" data-servicio="{{$servicio->id}}">
                                                                            {{ $empleado->nombres }} {{ $empleado->apellidos }}
                                                                        </option>
                                                                @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <script>
                                                    // JavaScript para filtrar empleados basado en el servicio seleccionado
                                                    document.getElementById('servicio_select').addEventListener('change', function () {
                                                        var servicioId = this.value;
                                                        var empleadoSelect = document.getElementById('empleado_select');

                                                        // Mostrar todas las opciones antes de aplicar el filtro
                                                        Array.from(empleadoSelect.options).forEach(function (option) {
                                                            option.style.display = '';
                                                        });

                                                        // Filtrar opciones de empleados basadas en el servicio seleccionado
                                                        Array.from(empleadoSelect.options).forEach(function (option) {
                                                            if (option.getAttribute('data-servicio') === servicioId || servicioId === '') {
                                                                option.style.display = '';
                                                            } else {
                                                                option.style.display = 'none';
                                                            }
                                                        });
                                                    });
                                                </script>
                                        
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="">Fecha de reserva</label> <b style="color:#FF0000">*</b>
                                                        <input type="date" id="fecha_reserva"  value="<?php  echo date('Y-m-d'); ?>" name="fecha_reserva" class="form-control" required>
                                                        <script>
                                                            document.addEventListener('DOMContentLoaded',function (){
                                                                const fechaReservaInput=document.getElementById('fecha_reserva');

                                                                //Escuchar el evento de cambio en el campo de fecha reserva
                                                                fechaReservaInput.addEventListener('change',function (){
                                                                    let selectedDate=this.value;//Obtener la Fecha seleccionada
                                                                    //Obtener la fecha actual en formato ISO (yyyy-mm-dd)
                                                                    let today=new Date().toISOString().slice(0,10);
                                                                    //Verificar si la fecha seleccionada es anterior a la fecha actual
                                                                    if (selectedDate < today){
                                                                        //Si es así, establecer la fecha seleccionada en null
                                                                        this.value=null;
                                                                        alert ('No se puede reservar en una fecha pasada.');
                                                                    }
                                                                });
                                                            });
                                                        </script>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="">Hora de reserva</label> <b style="color:#FF0000">*</b>
                                                        <input type="time" id="hora_reserva" name="hora_reserva" class="form-control" required>
                                                        @error('hora_reserva')
                                                            <small style="color:red">{{$message}}</small>
                                                        @enderror
                                                        @if (($message = Session::get('hora_reserva')))
                                                            <script>
                                                                document.addEventListener('DOMContentLoaded', function (){
                                                                    $('#exampleModal').modal('show');
                                                                });
                                                            </script>
                                                            <small style="color:red">{{$message}}</small>
                                                        @endif
                                                        <script>
                                                            document.addEventListener('DOMContentLoaded', function (){
                                                                const horaReservaInput = document.getElementById('hora_reserva');

                                                                horaReservaInput.addEventListener('change',function (){
                                                                    let seletedTime = this.value; //Obtener valor de la hora seleccionada

                                                                    //Asegurar que solo se capture la parte de la hora
                                                                    if(seletedTime){
                                                                        seletedTime = seletedTime.split(':'); // Dividir la cadena en horas y minutos
                                                                        seletedTime = seletedTime[0]+ ':00'; // Conservar solo la hora, ignorar minutos
                                                                        this.value = seletedTime; //Establecer la hora modificada en ele campo de entrada
                                                                    }

                                                                    //Verificar si la hora seleccionada esta fuera de rango permitido
                                                                    if(seletedTime<'10:00' || seletedTime>'19:00'){
                                                                        //Si es asi, establecer la hora seleccionada en null
                                                                        this.value = null;
                                                                        alert('Porfavor ingrese un horario entre las 10:00 de la mañana y 19:00 de la tarde');
                                                                    };
                                                                });
                                                            });
                                                        </script>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                            <button type="submit" class="btn btn-primary">Registrar</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div id='calendar'></div>
                </div>
            </div>
        </div>
    </div>
@endcan

@if (Auth::check() && Auth::user()->empleado)
    <div class="row">
        <div class="col-md-12">
            <div class="card card-outline card-primary">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-4">
                            <h3 class="card-title">Calendario de reservas</h3>
                        </div>
                    </div>
                </div>
                <div class="card-body">
    
                    <table id="example1" class="table table-striped table-bordered table-hover table-sm">
                        <thead class="table-dark">
                            <tr>
                                <td style="text-align:center"><b>Numero</b></td>
                                <td style="text-align:center"><b>Usuario</b></td>
                                <td style="text-align:center"><b>Fecha de reserva</b></td>
                                <td style="text-align:center"><b>Hora de reserva</b></td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $contador = 1 ?>
                            @foreach (collect($eventos)->where('empleado_id', Auth::user()->empleado->id)->all() as $evento)                                                  
                                <tr>    
                                    <td style="text-align:center"><b>{{$contador++}}</b></td>
                                    <td style="text-align:center">{{$evento->user->name}}</td>
                                    <td style="text-align:center">{{\Carbon\Carbon::parse($evento->start)->format('Y-m-d')}}</td>
                                    <td style="text-align:center">{{\Carbon\Carbon::parse($evento->start)->format('H:i')}}</td> 
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <script>
                        $(function () {
                            $("#example1").DataTable({
                            "pageLength": 10,
                            "language": {
                                "emptyTable": "No hay información",
                                "info": "Mostrando _START_ a _END_ de _TOTAL_ de Reservas",
                                "infoEmpty": "Mostrando 0 a 0 de 0 Reservas",
                                "infoFiltered": "(Filtrado de _MAX_ total de Reservas)",
                                "lengthMenu": "Mostrar _MENU_ de Reservas",
                                "loadingRecords": "Cargando...",
                                "processing": "Procesando...",
                                "search": "Buscador:",
                                "zeroRecords": "Sin resultados encontrados",
                                "paginate": {
                                "first": "Primero",
                                "last": "Último",
                                "next": "Siguiente",
                                "previous": "Anterior"
                                }
                            },
                            "responsive": true,
                            "lengthChange": true,
                            "autoWidth": false,
                            buttons: [{
                                extend: 'collection',
                                text: 'Reportes',
                                orientation: 'landscape',
                                buttons: [{
                                text: 'Copiar',
                                extend: 'copy',
                                }, {
                                extend: 'pdf'
                                }, {
                                extend: 'csv'
                                }, {
                                extend: 'excel'
                                }, {
                                text: 'Imprimir',
                                extend: 'print'
                                }]
                            }, {
                                extend: 'colvis',
                                text: 'Visor de columnas',
                                collectionLayout: 'absolute five-column'
                            }],
                            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
                        });
                    </script>
                </div>
            </div>
        </div>
    </div>
@endif


@endsection