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

    public function empleado()
    {
        return $this->belongsTo(Empleado::class);
    }

    public function solicitud()
    {
        return $this->belongsTo(Solicitud::class);
    }

    public function tipomovimiento()
    {
        return $this->belongsTo(Tipomovimiento::class);
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

    //Query Scope
    public function scopeEstatus($query, $estatus)
    {
        if($estatus)
            return $query->orWhere('estatus','LIKE',"%$estatus%");
    }
    public function scopeUser($query, $user)
    {
        if($user)
            return $query->orWhere('user_id','LIKE',"%$user%");
    }
    public function scopeEmpleados($query, $empleados)
    {
        if($empleados)
            return $query->orWhere('empleado_id','LIKE',"%$empleados%");
    }
}
