@extends('layouts.admin')
@section('content')
    <div class="row">
        <h1>Modificar historial</h1>
    </div>

    <hr>

    <div class="row">
        <div class="col-md-12">
            <div class="card card-outline card-success">
                <div class="card-header">
                    <h3 class="card-title">Datos registrados</h3>
                </div>
                <div class="card-body">
                    <form action="{{url('/admin/historial', $historial->id)}}"  method="POST">
                            @csrf
                            @method('PUT')
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form group">
                                            <label for="">Nombre del cliente</label>
                                            <select name="cliente_id" id="cliente_select" class="form-control">
                                            @foreach ($clientes as $cliente)
                                                <option value="{{$cliente->id}}" {{$historial->cliente_id == $cliente->id ? 'selected' : ''}}>{{$cliente->nombres . " " . $cliente->apellidos}}</option>
                                            @endforeach
                                        </select>
                                        </div>
                                    </div>
                                
                                    <div class="col-md-6">
                                        <div class="form group">
                                            <label for="">Fecha de la cita</label>
                                            <input type="date" name="fecha_visita" id="fecha_visita" value="{{$historial->fecha_visita}}" class="form-control">
                                        </div>
                                    </div>
                                </div>

                                <br>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form group">
                                            <label for="">Detalles de visita</label> 
                                            <textarea name="detalle" id="editor" class="form-control" style="width: 100%"> {!!$historial->detalle!!} </textarea>
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
                            <hr>
                        
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form group">
                                    <a href="{{url('admin/historial')}}" class="btn btn-secondary"> Regresar </a>
                                    <button type="submit" class="btn btn-success">Actualizar</button>
                                </div>
                            </div>
                        </div>
                        </div>
                        
                        
                                        </div>
                                    </div>
                                </div>

                               
                            </div>
                        </div>
                    </form>
            </div>
    </div>
@endsection