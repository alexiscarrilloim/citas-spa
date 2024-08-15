@extends('layouts.admin')
@section('content')
    <div class="row">
        <h1>Listado de Horarios</h1>
    </div>
    <hr>

    <div class="row">
        <div class="col-md-12">
            <div class="card card-outline card-primary">
                <div class="card-header">
                <h3 class="card-title">Horarios registrados</h3>
                <div class="card-tools">
                    <a href="{{url('admin/horarios/create')}}" class="btn btn-primary">
                        Registrar nuevo
                    </a>
                </div>
            </div>
            <div class="card-body">

                <table id="example1" class="table table-striped table-bordered table-hover table-sm">
                <thead class="table-dark">
                    <tr>
                        <td style="text-align:center"><b>Numero</b></td>
                        <td style="text-align:center"><b>Empleado</b></td>
                        <td style="text-align:center"><b>Sucursal</b></td>
                        <td style="text-align:center"><b>Día de atención</b></td>
                        <td style="text-align:center"><b>Hora de inicio</b></td>
                        <td style="text-align:center"><b>Hora final</b></td>
                        <td style="text-align:center"><b>Acciones</b></td>
                    </tr>
                </thead>
                <tbody>
                    <?php $contador = 1 ?>
                    @foreach ($horarios as $horario)
                    <tr>
                        <td style="text-align:center"><b>{{$contador++}}</b></td>
                        <td>{{$horario->empleado->nombres." ". $horario->empleado->apellidos}}</td>
                        <td>{{$horario->sucursal->nombre." - ".$horario->sucursal->ubicacion}}</td>
                        <td>{{$horario->dia}}</td>
                        <td style="text-align:center">{{$horario->hora_inicio}}</td>
                        <td style="text-align:center">{{$horario->hora_fin}}</td>
                        <td style="text-align:center">
                        <div class="btn-group" role="group" aria-label="Basic example">
                            <a href="{{url('admin/horarios/'.$horario->id)}}" type="button" class="btn btn-info btn-sm"><i class="bi bi-eye"></i></a> <!-- Accion: ver -->
                            <a href="{{url('admin/horarios/'.$horario->id.'/edit')}}" type="button" class="btn btn-success btn-sm"><i class="bi bi-pencil-square"></i></a> <!-- Accion: editar -->
                            <a href="{{url('admin/horarios/'.$horario->id.'/confirm-delete')}}" type="button" class="btn btn-danger btn-sm"><i class="bi bi-trash"></i></a> <!-- Accion: eliminar -->
                        </div>
                        </td>
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
                            "info": "Mostrando _START_ a _END_ de _TOTAL_ de Horarios",
                            "infoEmpty": "Mostrando 0 a 0 de 0 Horarios",
                            "infoFiltered": "(Filtrado de _MAX_ total de Horarios)",
                            "lengthMenu": "Mostrar _MENU_ de Horarios",
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
                            collectionLayout: 'absolute seven-column'
                        }],
                        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
                    });
                </script>
            </div>
            </div>
        </div>

    </div>

    <br>

    <div class="row">
    <div class="col-md-12">
            <div class="card card-outline card-primary">
                <div class="card-header">
                <h3 class="card-title">Calendario de horarios</h3>
            </div>
            <div class="card-body">
                <table style="text-align: center;" class="table table-striped table-bordered table-hover table-sm">
                    <thead>
                        <tr>
                            <th>Hora</th>
                            <th>Martes</th>
                            <th>Miércoles</th>
                            <th>Jueves</th>
                            <th>Viernes</th>
                            <th>Sábado</th>
                        </tr>
                    </thead>
                    <tbody>
                       @php
                            $horas = ['10:00:00 - 11:00:00','11:00:00 - 12:00:00','12:00:00 - 13:00:00','13:00:00 - 14:00:00','14:00:00 - 15:00:00','15:00:00 - 16:00:00','16:00:00 - 17:00:00','17:00:00 - 18:00:00','18:00:00 - 19:00:00'];
                            $diasSemana = ['Martes','Miercoles','Jueves','Viernes','Sabado','Domingo'];
                       @endphp
                       @foreach ($horas as $hora)
                            @php
                                list($hora_inicio,$hora_fin) = explode(' - ',$hora);
                            @endphp
                            <tr>
                                <td>{{$hora}}</td>
                                @foreach ($diasSemana as $dia)
                                    @php
                                    $nombre_empleado = '';
                                    foreach ($horarios as $horario){
                                        if(strtoupper($horario->dia == $dia && 
                                        $hora_inicio >= $horario->hora_inicio && 
                                        $hora_fin <= $horario->hora_fin)){
                                            $nombre_empleado = $horario->empleado->nombres." ".$horario->empleado->apellidos;
                                            break;
                                        }
                                    }
                                    @endphp
                                    <td>{{$nombre_empleado}}</td>
                                @endforeach
                            </tr>
                       @endforeach
                    </tbody>
                </table>
            </div>
            </div>
        </div>
    </div>
@endsection

