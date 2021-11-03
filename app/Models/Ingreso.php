<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Ingreso extends Model
{
    use HasFactory;
    protected $guarded = ['id','created_at','updated_at'];
    
    // public function getRouteKeyName()
    // {
    //     return "slug";
    // }

    public function proveedor()
    {
        return $this->belongsTo(Proveedor::class);
    }

    public function requisicion()
    {
        return $this->belongsTo(Requisicion::class);
    }

    public function tipomovimiento()
    {
        return $this->belongsTo(Tipomovimiento::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function detalleingresos()
    {
        return $this->hasMany(Detalleingreso::class);
    }

    public function productos()
    {
        return $this->hasManyThrough(Producto::class, Detalleingreso::class);
    }


    //Query Scope
    public function scopeEstatus($query, $estatus)
    {
        if($estatus)
            return $query->where('estatus','LIKE',"%$estatus%");
    }
    public function scopeUser($query, $user)
    {
        if($user)
            return $query->where('user_id','LIKE',"%$user%");
    }
}
