<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Horario extends Model
{
    use HasFactory;

    protected $fillable = ['dia','hora_inicio','hora_fin','empleado_id','sucursal_id'];

    public function empleado(){
        return $this->belongsTo(Empleado::class);
    }

    public function sucursal(){
        return $this->belongsTo(Sucursal::class);
    }
}
