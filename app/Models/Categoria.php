<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Categoria extends Model
{
    use HasFactory;
    protected $fillable = ['nombre','estado'];


    /**
     * Relación entre Categoría y Servicios.
     * Una categoría puede tener muchos servicios.
     */
    public function servicios(): HasMany
    {
        return $this->hasMany(Servicio::class); 
    }

    public function horarios(): HasMany
    {
        return $this->hasMany(Horario::class); 
    }
    
}
