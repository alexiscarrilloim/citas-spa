@extends('layouts.admin')
@section('content')
    <div class="row">
        <h1>Listado de reservas</h1>
    </div>
    <hr>

    <div class="row">
        <div class="col-md-12">
            <div class="card card-outline card-primary">
                <div class="card-header">
                <h3 class="card-title">Reservas registradas</h3>
            </div>
            <div class="card-body">

                <table id="example1" class="table table-striped table-bordered table-hover table-sm">
                <thead class="table-dark">
                    <tr>
                        <td style="text-align:center"><b>Numero</b></td>
                        <td style="text-align:center"><b>profesional</b></td>
                        <td style="text-align:center"><b>Servicio</b></td>
                        <td style="text-align:center"><b>Fecha de reserva</b></td>
                        <td style="text-align:center"><b>Hora de reserva</b></td>
                        <td style="text-align:center"><b>Fecha y hora de registro</b></td>
                        <td style="text-align:center"><b>Acciones</b></td>
                    </tr>
                </thead>
                <tbody>
                    <?php $contador = 1 ?>
                    @foreach ($eventos as $evento)
                    <tr>
                        <td style="text-align:center"><b>{{$contador++}}</b></td>
                        <td style="text-align:center">{{$evento->empleado->nombres." ".$evento->empleado->apellidos}}</td>
                        <td style="text-align:center">{{$evento->servicio->nombre}}</td>
                        <td style="text-align:center">{{\Carbon\Carbon::parse($evento->start)->format('Y-m-d')}}</td>
                        <td style="text-align:center">{{\Carbon\Carbon::parse($evento->start)->format('H:i')}}</td>
                        <td style="text-align:center">{{$evento->created_at}}</td>
                        <td style="text-align:center">
                        <div class="btn-group" role="group" aria-label="Basic example">
                            <form action="{{url('/admin/eventos/destroy',$evento->id)}}" 
                                id="formulario{{$evento->id}}" onclick="preguntar{{$evento->id}} (event)" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </form>
                            <script>
                                function preguntar{{$evento->id}} (event){
                                    event.preventDefault();
                                    Swal.fire({
                                        title: "¿Eliminar este registro de reserva?",
                                        text: "Si lo elimina, otro usuario podrá reservar en este mismo horario.",
                                        icon: "warning",
                                        showCancelButton: true,
                                        confirmButtonColor: "#3085d6",
                                        cancelButtonColor: "#d33",
                                        confirmButtonText: "Sí, eliminar",
                                        cancelButtonText: "Cancelar",
                                    }).then((result) => {
                                                if (result.isConfirmed) {
                                                    var form = $('#formulario{{$evento->id}}');
                                                    form.submit();
                                            }
                                        });
                                    }
                            </script>
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
@endsection

