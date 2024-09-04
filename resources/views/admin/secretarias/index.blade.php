@extends('layouts.admin')
@section('content')
    <div class="row">
        <h1>Listado de secretarias</h1>
    </div>
    <hr>

    <div class="row">
        <div class="col-md-12">
            <div class="card card-outline card-primary">
                <div class="card-header">
                    <h3 class="card-title">Secretarias registradas</h3>
                    <div class="card-tools">
                        <a href="{{url('admin/secretarias/create')}}" class="btn btn-primary">
                            Registrar nueva
                        </a>
                    </div>
                </div>
            <div class="card-body">
                <table id="example1" class="table table-striped table-bordered table-hover table-sm">
                <thead class="table-dark">
                    <tr>
                        <td style="text-align:center"><b>Número</b></td>
                        <td style="text-align:center"><b>Nombre y apellidos</b></td>
                        <td style="text-align:center"><b>RFC</b></td>
                        <td style="text-align:center"><b>Celular</b></td>
                        <td style="text-align:center"><b>Dirección</b></td>
                        <td style="text-align:center"><b>Email</b></td>
                        <td style="text-align:center"><b>Acciones</b></td>
                    </tr>
                </thead>
                <tbody>
                    <?php $contador = 1 ?>
                    @foreach ($secretarias as $secretaria)
                    <tr>
                        <td style="text-align:center"><b>{{$contador++}}</b></td>
                        <td>{{$secretaria->nombres}}  {{$secretaria->apellidos}}</td>
                        <td>{{$secretaria->rfc}}</td>
                        <td>{{$secretaria->celular}}</td>
                        <td>{{$secretaria->direccion}}</td>
                        <td>{{$secretaria->user->email}}</td> <!--Se hace la relacion de secretaria con usuario -->
                        <td style="text-align:center">
                        <div class="btn-group" role="group" aria-label="Basic example">
                            <a href="{{url('admin/secretarias/'.$secretaria->id)}}" type="button" class="btn btn-info btn-sm"><i class="bi bi-eye"></i></a> <!-- Accion: ver -->
                            <a href="{{url('admin/secretarias/'.$secretaria->id.'/edit')}}" type="button" class="btn btn-success btn-sm"><i class="bi bi-pencil-square"></i></a> <!-- Accion: editar -->
                            <a href="{{url('admin/secretarias/'.$secretaria->id.'/confirm-delete')}}" type="button" class="btn btn-danger btn-sm"><i class="bi bi-trash"></i></a> <!-- Accion: eliminar -->
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
                            "info": "Mostrando _START_ a _END_ de _TOTAL_ de Secretarias",
                            "infoEmpty": "Mostrando 0 a 0 de 0 Secretarias",
                            "infoFiltered": "(Filtrado de _MAX_ total de Secretarias)",
                            "lengthMenu": "Mostrar _MENU_ de Secretarias",
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
@endsection

