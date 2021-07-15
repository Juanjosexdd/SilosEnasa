<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detalleegreso extends Model
{
    use HasFactory;

    protected $table = 'detalle_egreso';

    protected $guarded = ['id','created_at','updated_at'];

    public function ingreso()
    {
        return $this->belongsTo(Egreso::class);
    }

    public function productos()
    {
        return $this->hasMany(Producto::class);
    }
    
}
