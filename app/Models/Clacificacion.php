<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Clacificacion extends Model
{
    use HasFactory;
    protected $guarded = ['id','created_at','updated_at'];

    public function getRouteKeyName()
    {
        return "slug";
    }

    public function productos()
    {
        return $this->hasMany(Producto::class);
    }

    public function getDisplayClacificacionAttribute()
    {
        return $this->abreviado . ' ' . $this->nombre;
    }
}
