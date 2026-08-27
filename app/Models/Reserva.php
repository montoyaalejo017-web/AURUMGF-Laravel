<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Reserva extends Model
{
    protected static function booted(): void
    {
        static::creating(function (Reserva $reserva) {
            $reserva->numero_reserva = 'RES-' . now()->format('Y') . '-' . str_pad(
                (string) ((Reserva::max('id') ?? 0) + 1),
                6,
                '0',
                STR_PAD_LEFT
            );
        });
    }

    protected $fillable = [
        'cliente_id',
        'cabana_id',
        'fecha_entrada',
        'fecha_salida',
        'cantidad_huespedes',
        'precio_total',
        'estado',
        'observaciones',
        'numero_reserva',
    ];

    protected $casts = [
        'fecha_entrada' => 'date',
        'fecha_salida' => 'date',
        'precio_total' => 'decimal:2',
    ];

    public function cliente(): BelongsTo
    {
        return $this->belongsTo(Cliente::class);
    }

    public function cabana(): BelongsTo
    {
        return $this->belongsTo(Cabana::class);
    }
}