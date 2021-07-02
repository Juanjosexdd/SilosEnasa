<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;
    protected $guarded = ['id','created_at','updated_at'];

    public function getRouteKeyName()
    {
        return "slug";
    }

    public function almacenes()
    {
        return $this->belongsToMany(Almacen::class);
    }

    public function clacificacion()
    {
        return $this->belongsTo(Clacificacion::class);
    }
}
