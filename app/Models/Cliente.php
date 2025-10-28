<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $fillable = ['nombre', 'rif', 'direccion', 'telefono', 'email'];

    public function facturas()
    {
        return $this->hasMany(Factura::class);
    }
}