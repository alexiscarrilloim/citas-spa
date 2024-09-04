@extends('layouts.admin')
@section('content')
<div class="row">
    <h1>Listado de servicios</h1>
</div>
<hr>

<div class="row">
    <div class="col-md-10">
        <div class="card card-outline card-primary">
            <div class="card-header">
                <h3 class="card-title">Servicios registradas</h3>
                <div class="card-tools">
                    <a href="{{url('admin/servicios/create')}}" class="btn btn-primary">
                        Registrar nuevo
                    </a>
                </div>
            </div>
            <div class="card-body">

                <table id="example1" style="text-align: center;" class="table table-striped table-bordered table-hover table-sm">
                    <thead class="table-dark">
                        <tr>
                            <td style="text-align:center"><b>Número</b></td>
                            <td style="text-align:center"><b>Nombre</b></td>
                            <td style="text-align:center"><b>Descripción</b></td>
                            <td style="text-align:center"><b>Duración (min.)</b></td>
                            <td style="text-align:center"><b>Empleados</b></td>
                            <td style="text-align:center"><b>Categoría</b></td>
                            <td style="text-align:center"><b>Acciones</b></td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $contador = 1 ?>
                        @foreach ($servicios as $servicio)
                            <tr>
                                <td style="text-align:center"><b>{{$contador++}}</b></td>
                                <td>{{$servicio->nombre}}</td>
                                <td>{{$servicio->descripcion}}</td>
                                <td>{{$servicio->duracion}}</td>
                                <td>
                                    @foreach ($servicio->empleados as $empleado)
                                        {{ $empleado->nombres }} {{ $empleado->apellidos }}@if (!$loop->last), @endif
                                    @endforeach
                                </td>
                                <td>{{$servicio->categoria->nombre}}</td>
                                <td style="text-align:center">
                                    <div class="btn-group" role="group" aria-label="Basic example">
                                        <a href="{{url('admin/servicios/'. $servicio->id)}}" type="button" class="btn btn-info btn-sm"><i class="bi bi-eye"></i></a> <!-- Accion: ver -->
                                        <a href="{{url('admin/servicios/'. $servicio->id . '/edit')}}" type="button" class="btn btn-success btn-sm"><i class="bi bi-pencil-square"></i></a> <!-- Accion: editar -->
                                        <form action="{{url('/admin/servicios/destroy', $servicio->id)}}" id="formulario{{$servicio->id}}"
                                            onclick="preguntar{{$servicio->id}} (event)" method="get">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                        </form>
                                        <script>
                                            function preguntar{{$servicio->id}}(event) {
                                                event.preventDefault();
                                                Swal.fire({
                                                    title: "¿Eliminar el servicio {{$servicio->nombre}}? ",
                                                    text: "Se eliminará de forma permanente.",
                                                    icon: "warning",
                                                    showCancelButton: true,
                                                    confirmButtonColor: "#3085d6",
                                                    cancelButtonColor: "#d33",
                                                    confirmButtonText: "Sí, eliminar",
                                                    cancelButtonText: "Cancelar",
                                                }).then((result) => {
                                                    if (result.isConfirmed) {
                                                        var form = $('#formulario{{$servicio->id}}');
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
                    $(function() {
                        $("#example1").DataTable({
                            "pageLength": 10,
                            "language": {
                                "emptyTable": "No hay información",
                                "info": "Mostrando _START_ a _END_ de _TOTAL_ de Servicios",
                                "infoEmpty": "Mostrando 0 a 0 de 0 Servicios",
                                "infoFiltered": "(Filtrado de _MAX_ total de Servicios)",
                                "lengthMenu": "Mostrar _MENU_ de Servicios",
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