@extends('layouts.admin')
@section('content')
    <div class="row">
        <h1>Listado de configuraciones</h1>
    </div>
    <hr>

    <div class="row">
        <div class="col-md-12">
            <div class="card card-outline card-primary">
                <div class="card-header">
                <h3 class="card-title">Configuraciones registradas</h3>
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
                        <td style="text-align:center"><b>Nombre de sucursal</b></td>
                        <td style="text-align:center"><b>Dirección</b></td>
                        <td style="text-align:center"><b>Telefono</b></td>
                        <td style="text-align:center"><b>Correo electrónico</b></td>
                        <td style="text-align:center"><b>Logotipo</b></td>
                        <td style="text-align:center"><b>Acciones</b></td>
                    </tr>
                </thead>
                <tbody>
                    <?php $contador = 1 ?>
                    @foreach ($configuraciones as $configuracione)
                    <tr>
                        <td style="text-align:center"><b>{{$contador++}}</b></td>
                        <td>{{$configuracione->nombre}}</td>
                        <td>{{$configuracione->direccion}}</td>
                        <td style="text-align:center">
                            @if ($configuracione->telefono == null)
                                <p>Sin Teléfono fijo</p>
                            @else
                                <p>{{$configuracione->telefono}}</p>
                            @endif
                        </td>
                        <td>{{$configuracione->correo}}</td>
                        <td>
                            <img src="{{url('storage/'.$configuracione->logo)}}" alt="logo" width="100px">
                        </td>
                        <td style="text-align:center">
                            <div class="btn-group" role="group" aria-label="Basic example">
                                <a href="{{url('admin/configuraciones/' . $configuracione->id)}}" type="button" class="btn btn-info btn-sm"><i class="bi bi-eye"></i></a> <!-- Accion: ver -->
                                <a href="{{url('admin/configuraciones/'.$configuracione->id . '/edit')}}" type="button" class="btn btn-success btn-sm"><i class="bi bi-pencil-square"></i></a> <!-- Accion: editar -->
                                <form action="{{url('/admin/configuraciones/destroy',$configuracione->id)}}" 
                                    id="formulario{{$configuracione->id}}" onclick="preguntar{{$configuracione->id}} (event)" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </form>
                                <script>
                                    function preguntar{{$configuracione->id}} (event){
                                        event.preventDefault();
                                        Swal.fire({
                                            title: "¿Eliminar la configuración de {{$configuracione->nombre}}?",
                                            text: "Se eliminará de forma permanente.",
                                            icon: "warning",
                                            showCancelButton: true,
                                            confirmButtonColor: "#3085d6",
                                            cancelButtonColor: "#d33",
                                            confirmButtonText: "Sí, eliminar",
                                            cancelButtonText: "Cancelar",
                                        }).then((result) => {
                                                    if (result.isConfirmed) {
                                                        var form = $('#formulario{{$configuracione->id}}');
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
                            "info": "Mostrando _START_ a _END_ de _TOTAL_ de configuraciones",
                            "infoEmpty": "Mostrando 0 a 0 de 0 configuraciones",
                            "infoFiltered": "(Filtrado de _MAX_ total de configuraciones)",
                            "lengthMenu": "Mostrar _MENU_ de configuraciones",
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

            <!---------------- Modal // ACCION REGISTRAR NUEVO --------------->
         <form action="{{url('/admin/configuraciones/create')}}" method="POST"  enctype="multipart/form-data">
            @csrf
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Registro de nueva configuración</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form group">
                                        <label for="">Nombre de negocio</label> <b style="color:#FF0000">*</b>
                                        <input type="text" value="{{old('nombre')}}" name="nombre" class="form-control" placeholder="Nombre de negocio" required>
                                        @error('nombre')
                                            <small style="color:red">{{$message}}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form group">
                                        <label for="">Dirección</label> <b style="color:#FF0000">*</b>
                                        <input type="adress" value="{{old('direccion')}}" name="direccion" placeholder="Dirección" class="form-control" required>
                                        @error('direccion')
                                            <small style="color:red">{{$message}}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form group">
                                        <label for="">Teléfono</label> <b style="color:#FF0000">*</b>
                                        <input type="text" value="{{old('telefono')}}" name="telefono" placeholder="Número de teléfono" class="form-control" required>
                                        @error('telefono')
                                            <small style="color:red">{{$message}}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form group">
                                        <label for="">Correo electrónico</label> <b style="color:#FF0000">*</b>
                                        <input type="email" value="{{old('correo')}}" name="correo" placeholder="ejemplo@ejemplo.com" class="form-control" required>
                                        @error('correo')
                                            <small style="color:red">{{$message}}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <!--Imagen-->
                                    <div class="form-group">
                                        <label for="">Logotipo</label>
                                        <input type="file" id="file" name="logo" class="form-control" required>
                                        <br>
                                        {{--Visualizar la Imagen--}}
                                        <center>
                                            <output id="list"></output>
                                        </center>
                                        <script>
                                            function archivo(evt) {
                                                var files = evt.target.files; // FileList object
                                                //Obtenemos la imagen del campo "file".
                                                for (var i = 0, f; f = files[i]; i++) {
                                                    //Solo admitimos imágenes.
                                                    if (!f.type.match('image.*')) {
                                                        continue;
                                                    }
                                                    var reader = new FileReader();
                                                    reader.onload = (function (theFile) {
                                                        return function (e) {
                                                            // Insertamos la imagen.
                                                            document.getElementById("list").innerHTML = ['<img class="thumb thumbnail" src="', e.target
                                                                .result, '"width="60%" title="', escape(theFile.name), '"/>'
                                                            ].join('');
                                                        };
                                                    })(f);
                                                    reader.readAsDataURL(f);
                                                }
                                            }
                                            document.getElementById('file').addEventListener('change', archivo, false);
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
@endsection

