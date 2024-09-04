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
                            <td style="text-align:center"><b>Servicio</b></td>
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
                            <td>{{$horario->servicio->nombre}}</td>
                            <td>{{$horario->dia}}</td>
                            <td style="text-align:center">{{$horario->hora_inicio}}</td>
                            <td style="text-align:center">{{$horario->hora_fin}}</td>
                            <td style="text-align:center">
                                <div class="btn-group" role="group" aria-label="Basic example">
                                    <a href="{{url('admin/horarios/'.$horario->id)}}" type="button" class="btn btn-info btn-sm"><i class="bi bi-eye"></i></a> <!-- Accion: ver -->
                                    <!------- Accion: editar---->
                                    <!-- <a href="{{url('admin/horarios/'.$horario->id.'/edit')}}" type="button" class="btn btn-success btn-sm"><i class="bi bi-pencil-square"></i></a> -->   
                                    <a href="{{url('#')}}" type="button" class="btn btn-danger btn-sm"><i class="bi bi-trash"></i></a> <!-- Accion: eliminar ----  admin/horarios/'.$horario->id.'/confirm-delete-->
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <script>
                    $(function() {
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
                            <option value="">Seleccionar servicio</option>
                            @foreach ($servicios as $servicio)
                            <option value={{$servicio->id}}>{{$servicio->nombre}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <script>
                    $('#servicio_select').on('change', function() {
                        var servicio_id = $('#servicio_select').val();
                        //alert(sucursal_id);

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
                <div id="sucursal_info"></div>
                <div id="servicio_info"></div>
            </div>
        </div>
    </div>
</div>

@endsection