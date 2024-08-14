<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empleado extends Model
{
    use HasFactory;

    protected $fillable = ['nombres','apellidos','telefono'];  //rellenar mas rapido estos datos

    public function sucursal()
    {
        return $this->belongsTo(Sucursal::class); //relacion empleado-sucursal, uno a uno
    }

    public function horario()
    {
        return $this->hasMany(Horario::class);  //relacion empleado-horario, uno a muchos
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }


}
