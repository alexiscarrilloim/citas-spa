<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sucursal extends Model
{
    use HasFactory;
    //Regisytra los datos
    protected $fillable = ['nombre','ubicacion','telefono','estado'];

    public function empleados(){
        return $this->hasMany(Empleado::class); //Relacion sucursal-empleado, una sucursal tiene varios empleados
    }

    public function horarios(){
        return $this->hasMany(Horario::class); //Relacion sucursal-empleado, una sucursal tiene varios horarios
    }

    public function servicios()
    {
        return $this->belongsToMany(Servicio::class, 'sucursal_servicio');
    }
}
