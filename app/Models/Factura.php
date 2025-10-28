<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Factura extends Model
{
    protected $fillable = ['numero', 'user_id', 'cliente_id', 'fecha', 'subtotal', 'iva', 'total'];

    protected $casts = [
        'fecha' => 'date',
        'subtotal' => 'decimal:2',
        'iva' => 'decimal:2',
        'total' => 'decimal:2',
    ];

    public function user()
    {
        return $this->belongsTo(\App\Models\User::class);
    }

    public function cliente()
    {
        return $this->belongsTo(Cliente::class);
    }

    public function items()
    {
        return $this->hasMany(FacturaItem::class);
    }

    public static function generarNumero()
    {
        $fecha = now()->format('Ymd');
        $ultimo = static::where('numero', 'like', "FAC-{$fecha}-%")->count();
        return "FAC-{$fecha}-" . str_pad($ultimo + 1, 4, '0', STR_PAD_LEFT);
    }
}