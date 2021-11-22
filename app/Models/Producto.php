<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;
    protected $guarded = ['id', 'created_at', 'updated_at'];

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

    public function detalleingreso()
    {
        return $this->belongsTo(Detalleingreso::class);
    }

    public function detalleinventarios()
    {
        return $this->hasMany(DetalleInventario::class);
    }

    public function getDisplayProductoAttribute()
    {
        return $this->id . '' . $this->clacificacion->abreviado . ' ' . $this->nombre . '  - stock    (' . $this->stock . ')';
    }

    public function getDisplayProductAttribute()
    {
        return $this->id . '' . $this->clacificacion->abreviado . ' ' . $this->nombre;
    }



    //Query Scope
    public function scopeClacificacion($query, $clacificacion)
    {
        if ($clacificacion)
            return $query->orWhere('clacificacion_id', 'LIKE', "%$clacificacion%");
    }
}
