@extends('layouts.admin')
@section('content')
    <div class="row">
        <h1>Listado de historiales</h1>
    </div>
    <hr>

    <div class="row">
        <div class="col-md-12">
            <div class="card card-outline card-primary">
                <div class="card-header">
                <h3 class="card-title">Historiales registradas</h3>
                <div class="card-tools">
                            <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                        Registrar nuevo
                    </button>
                </div>
            </div>
            <div class="card-body">

                <table id="example1" class="table table-striped table-bordered table-hover table-sm">
                <thead class="table-dark">
                    <tr>
                        <td style="text-align:center"><b>Numero</b></td>
                        <td style="text-align:center"><b>Nombre del cliente</b></td>
                        <td style="text-align:center"><b>Fecha de la cita</b></td>
                        <td style="text-align:center"><b>Detalles de cita</b></td>
                        <td style="text-align:center"><b>Acciones</b></td>
                    </tr>
                </thead>
                <tbody>
                    <?php $contador = 1 ?>
                    @foreach ($historiales as $historial)
                        @if ($historial->empleado_id == Auth::user()->empleado->id)
                            <tr>
                                <td style="text-align:center"><b>{{$contador++}}</b></td>
                                <td>{{$historial->cliente->nombres." ".$historial->cliente->apellidos}}</td>
                                <td style="text-align:center">{{$historial->fecha_visita}}</td>
                                <td>
                                   {!!\Illuminate\Support\Str::limit($historial->detalle, 105, '...')!!}  <a href="{{url('admin/historial/' .$historial->id)}}">ver más</a>
                                </td>
                                <td style="text-align:center">
                                    <div class="btn-group" role="group" aria-label="Basic example">
                                        <a href="{{url('admin/historial/'.$historial->id)}}" type="button" class="btn btn-info btn-sm"><i class="bi bi-eye"></i></a> <!-- Accion: ver -->
                                        <a href="{{url('admin/historial/'.$historial->id . '/edit')}}" type="button" class="btn btn-success btn-sm"><i class="bi bi-pencil-square"></i></a> <!-- Accion: editar -->
                                        <a href="{{url('admin/historial/pdf/'.$historial->id)}}" type="button" class="btn btn-warning btn-sm"><i class="bi bi-printer"></i></a> <!-- Accion: imprimir -->
                                        <form action="{{url('/admin/historial/destroy', $historial->id)}}" 
                                            id="formulario{{$historial->id}}" onclick="preguntar{{$historial->id}} (event)" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                        </form>
                                        <script>
                                            function preguntar{{$historial->id}} (event){
                                                event.preventDefault();
                                                Swal.fire({
                                                    title: "¿Eliminar el historial seleccionado?",
                                                    text: "Se eliminará de forma permanente.",
                                                    icon: "warning",
                                                    showCancelButton: true,
                                                    confirmButtonColor: "#3085d6",
                                                    cancelButtonColor: "#d33",
                                                    confirmButtonText: "Sí, eliminar",
                                                    cancelButtonText: "Cancelar",
                                                }).then((result) => {
                                                            if (result.isConfirmed) {
                                                                var form = $('#formulario{{$historial->id}}');
                                                                form.submit();
                                                        }
                                                    });
                                                }
                                        </script>
                                    </div>
                                </td>
                            </tr>
                        @endif
                    @endforeach
                    </tbody>
                </table>
                <script>
                    $(function () {
                        $("#example1").DataTable({
                        "pageLength": 10,
                        "language": {
                            "emptyTable": "No hay información",
                            "info": "Mostrando _START_ a _END_ de _TOTAL_ de historiales",
                            "infoEmpty": "Mostrando 0 a 0 de 0 historiales",
                            "infoFiltered": "(Filtrado de _MAX_ total de historiales)",
                            "lengthMenu": "Mostrar _MENU_ de historiales",
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

        <!--------------------- Modal // ACCION REGISTRAR NUEVO ----------------------->
         <form action="{{url('/admin/historial/create')}}" method="POST">
            @csrf
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-scrollable modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Registro de un nuevo historial</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form group">
                                        <label for="">Cliente</label> <b style="color:#FF0000">*</b>
                                        <select name="cliente_id" id="cliente_select" class="form-control" required>
                                            <option hidden value="">--Seleccione un cliente--</option>
                                            @foreach ($clientes as $cliente)
                                                <option value="{{$cliente->id}}">{{$cliente->nombres." ".$cliente->apellidos}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form group">
                                        <label for="">Fecha de visita</label> <b style="color:#FF0000">*</b>
                                        <input type="date" id="fecha_visita" value="<?php  echo date('Y-m-d'); ?>" name="fecha_visita" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form group">
                                        <label for="">Descripción de la cita</label> <b style="color:#FF0000">*</b>
                                        <textarea name="detalle" id="editor" class="form-control" style="width: 100%"></textarea>
                                        <script type="importmap">
                                            {
                                                "imports": {
                                                    "ckeditor5": "https://cdn.ckeditor.com/ckeditor5/43.0.0/ckeditor5.js",
                                                    "ckeditor5/": "https://cdn.ckeditor.com/ckeditor5/43.0.0/"
                                                }
                                            }
                                        </script>
                                        <script type="module">
                                            import {
                                                ClassicEditor,
                                                Essentials,
                                                Bold,
                                                Italic,
                                                Font,
                                                Paragraph
                                            } from 'ckeditor5';

                                            ClassicEditor
                                                .create(document.querySelector('#editor'), {
                                                    plugins: [Essentials, Bold, Italic, Font, Paragraph],
                                                    toolbar: {
                                                        items: [
                                                            'undo', 'redo', '|', 'bold', 'italic', '|',
                                                            'fontSize', 'fontFamily', 'fontColor', 'fontBackgroundColor'
                                                        ]
                                                    }
                                                })
                                                .then( /* ... */)
                                                .catch( /* ... */);
                                        </script>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                            <button type="submit" class="btn btn-primary">Registrar configuración</button>
                        </div>
                    </div>
                </div>
            </div>
         </form>
    </div>
    
    <br>
    <br>

@endsection

