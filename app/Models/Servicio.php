<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Servicio extends Model
{
    use HasFactory;

    protected $fillable = ['nombre','descripcion','duracion','categoria_id','empleado_id'];


    /**
     * Relación entre Servicio y Categoría.
     * Un servicio pertenece a una categoría.
     */
    public function categoria()
    {
        return $this->belongsTo(Categoria::class); //relacion empleado-sucursal, uno a muchos
    }

    public function empleados()
    {
        return $this->belongsToMany(Empleado::class, 'empleado_servicio');
    }

    public function sucursals()
    {
        return $this->hasMany(Sucursal::class, 'sucursal_servicio');
    }

    public function horarios()
    {
        return $this->belongsToMany(Horario::class);
    }

    public function events()
    {
        return $this->hasMany(Event::class, 'sucursal_servicio');
    }

}
