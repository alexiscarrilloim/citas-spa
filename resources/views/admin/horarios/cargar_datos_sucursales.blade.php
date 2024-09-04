<?php ?>


<table style="text-align: center;" class="table table-striped table-bordered table-hover table-sm">
                    <thead>
                        <tr>
                            <th>Hora</th>
                            <th>Martes</th>
                            <th>Miércoles</th>
                            <th>Jueves</th>
                            <th>Viernes</th>
                            <th>Sábado</th>
                            <th>Domingo</th>
                        </tr>
                    </thead>
                    <tbody>
                       @php
                            $horas = ['10:00:00 - 11:00:00','11:00:00 - 12:00:00','12:00:00 - 13:00:00','13:00:00 - 14:00:00','14:00:00 - 15:00:00','15:00:00 - 16:00:00','16:00:00 - 17:00:00','17:00:00 - 18:00:00','18:00:00 - 19:00:00'];
                            $diasSemana = ['Martes','Miercoles','Jueves','Viernes','Sabado','Domingo'];
                       @endphp
                       @foreach ($horas as $hora)
                            @php
                                list($hora_inicio,$hora_fin) = explode(' - ',$hora);
                            @endphp
                            <tr>
                                <td>{{$hora}}</td>
                                @foreach ($diasSemana as $dia)
                                    @php
                                    $nombre_empleado = '';
                                    foreach ($horarios as $horario){
                                        if(strtoupper($horario->dia == $dia && 
                                        $hora_inicio >= $horario->hora_inicio && 
                                        $hora_fin <= $horario->hora_fin)){
                                            $nombre_empleado = $horario->empleado->nombres." ".$horario->empleado->apellidos;
                                            break;
                                        }
                                    }
                                    @endphp
                                    <td>{{$nombre_empleado}}</td>
                                @endforeach
                            </tr>
                       @endforeach
                    </tbody>
                </table>



