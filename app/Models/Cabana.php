<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Cabana extends Model
{
    protected $fillable = [
        'nombre',
        'descripcion',
        'capacidad',
        'precio_noche',
        'estado',
    ];

    public function reservas(): HasMany
    {
        return $this->hasMany(Reserva::class);
    }
}