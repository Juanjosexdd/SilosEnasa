<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Egreso extends Model
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

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function detalleegresos()
    {
        return $this->hasMany(Detalleegreso::class);
    }

    public function productos()
    {
        return $this->hasManyThrough(Producto::class, Detalleegreso::class);
    }
}
