<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proveedor extends Model
{
    use HasFactory;
    protected $guarded = ['id','created_at','updated_at'];
    
    public function getRouteKeyName()
    {
        return "slug";
    }

    public function getDisplayProveedorAttribute()
    {
        return $this->tipodocumento->abreviado . '-' . $this->cedularif . ' ' . $this->nombre;
    }
    
    public function tipodocumento()
    {
        return $this->belongsTo(Tipodocumento::class);
    }

    public function ingresos()
    {
        return $this->hasMany(Ingreso::class);
    }
    public function egresos()
    {
        return $this->hasMany(Egreso::class);
    }
}
