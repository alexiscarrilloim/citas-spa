<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
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

    <h2 class="text-center"><u><b>Listado del profesional</b></u></h2>
    <br>
    <table class="table table-bordered table-striped table-sm">
        <thead>
            <tr style="background-color: #e7e7e7;">
                <th>Número</th>
                <th>Nombre y apellidos</th>
                <th>Télefono</th>
                <th>Correo electrónico</th>
            </tr>
        </thead>
        <tbody>
            <?php $contador = 1 ?>
            @foreach ($empleados as $empleado)
                <tr>
                    <td style="text-align:center"><b>{{$contador++}}</b></td>
                    <td>{{$empleado->nombres . "  " . $empleado->apellidos}}</td>
                    <td>{{$empleado->telefono}}</td>
                    <td>{{$empleado->user->email}}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>