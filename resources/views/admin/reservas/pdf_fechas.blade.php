<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Reservas entre fechas</title>
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

    <h2 class="text-center"><u><b>Listado de reservas de citas</b></u></h2>

    <br>

    <p>Reporte desde: {{$fecha_inicio}} hasta {{$fecha_fin}}</p>

    <table class="table table-bordered table-striped table-sm">
        <thead>
            <tr style="background-color: #e7e7e7;">
                <th>Número</th>
                <th>Nombre del cliente</th>
                <th>Nombre del profesional</th>
                <th>Servicio</th>
                <th>Fecha de reserva</th>
                <th>hora de reserva</th>
            </tr>
        </thead>
        <tbody>
            <?php $contador = 1 ?>
            @foreach ($eventos as $evento)
                <tr>
                    <td style="text-align:center"><b>{{$contador++}}</b></td>
                    <td>{{$evento->user->name}}</td>
                    <td>{{$evento->empleado->nombres." ".$evento->empleado->apellidos}}</td>
                    <td>{{$evento->servicio->nombre}}</td>
                    <td>{{\Carbon\Carbon::parse($evento->start)->format('Y-m-d')}}</td>
                    <td>{{\Carbon\Carbon::parse($evento->start)->format('H:i')}}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>