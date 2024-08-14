@extends('layouts.admin')
@section('content')
    <div class="row">
        <h1>Listado de clientes</h1>
    </div>
    <hr>

    <div class="row">
        <div class="col-md-10">
            <div class="card card-outline card-primary">
                <div class="card-header">
                <h3 class="card-title">Clientes registrados</h3>
                <div class="card-tools">
                    <a href="{{url('admin/clientes/create')}}" class="btn btn-primary">
                        Registrar nuevo
                    </a>
                </div>
            </div>
            <div class="card-body">

                <table id="example1" class="table table-striped table-bordered table-hover table-sm">
                <thead class="table-dark">
                    <tr>
                        <td style="text-align:center"><b>Numero</b></td>
                        <td style="text-align:center"><b>Nombre y apellidos</b></td>
                        <td style="text-align:center"><b>Celular</b></td>
                        <td style="text-align:center"><b>Email</b></td>
                        <td style="text-align:center"><b>Acciones</b></td>
                    </tr>
                </thead>
                <tbody>
                    <?php $contador = 1 ?>
                    @foreach ($clientes as $cliente)
                    <tr>
                        <td style="text-align:center"><b>{{$contador++}}</b></td>
                        <td>{{$cliente->nombres}}  {{$cliente->apellidos}}</td>
                        <td>{{$cliente->celular}}</td>
                        <td>{{$cliente->correo}}</td>
                        <td style="text-align:center">
                        <div class="btn-group" role="group" aria-label="Basic example">
                            <a href="{{url('admin/clientes/'.$cliente->id)}}" type="button" class="btn btn-info btn-sm"><i class="bi bi-eye"></i></a> <!-- Accion: ver -->
                            <a href="{{url('admin/clientes/'.$cliente->id.'/edit')}}" type="button" class="btn btn-success btn-sm"><i class="bi bi-pencil-square"></i></a> <!-- Accion: editar -->
                            <a href="{{url('admin/clientes/'.$cliente->id.'/confirm-delete')}}" type="button" class="btn btn-danger btn-sm"><i class="bi bi-trash"></i></a> <!-- Accion: eliminar -->
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
                            "info": "Mostrando _START_ a _END_ de _TOTAL_ de Clientes",
                            "infoEmpty": "Mostrando 0 a 0 de 0 Usuarios",
                            "infoFiltered": "(Filtrado de _MAX_ total de Clientes)",
                            "lengthMenu": "Mostrar _MENU_ de Clientes",
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

