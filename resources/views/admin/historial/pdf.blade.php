<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Todas las reservas</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{url('css/bootstrap.min.css')}}" rel="stylesheet" type="text/css">
</head>
<body>

    <table>
        <tr>
            <td class="text-center">
                {{$configuracion->nombre}} <br>
                {{$configuracion->direccion}} <br>
                {{$configuracion->telefono}} <br>
                {{$configuracion->correo}} <br>
            </td>
            <td width="500px"></td>
            <td>
            <img src="{{url('storage/' . $configuracion->logo)}}" alt="logo" width="100px">
            </td>
        </tr>
    </table>

    <br>

    <h2 class="text-center"><u><b>Historial de cliente</b></u></h2>

    <br>

    <h4>Información de cliente</h4>
    <table>
        <tr>
            <td><b>Cliente:</b></td>
            <td>{{$historial->cliente->nombres." ".$historial->cliente->apellidos}}</td>
        </tr>
        <tr>
            <td><b>Celular:</b></td>
            <td>{{$historial->cliente->celular}}</td>
        </tr>
        <tr>
            <td><b>Correo:</b></td>
            <td>{{$historial->cliente->correo}}</td>
        </tr>
    </table>

    <hr>

    <h4>Información de profesional</h4>
    <table>
        <tr>
            <td><b>Nombre:</b></td>
            <td>{{$historial->empleado->nombres." ".$historial->empleado->apellidos}}</td>
        </tr>
        <tr>
            <td><b>Celular:</b></td>
            <td>{{$historial->empleado->telefono}}</td>
        </tr>
        <tr>
            <td><b>Correo:</b></td>
            <td>{{$historial->empleado->user->email}}</td>
        </tr>
    </table>

    <hr>

    <h4>Informe de citas</h4>
    <table>
        <tr>
            <td><b>Fecha:</b></td>
            <td>{{$historial->fecha_visita}}</td>   
        </tr>
        <tr>
            <td><b>Detalles:</b></td>
            <td>{!!$historial->detalle!!}</td>
        </tr>
    </table>

</body>
</html>         