<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Solicitud extends Model
{
    use HasFactory;
    
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function empleado()
    {
        return $this->belongsTo(Empleado::class);
    }

    public function departamento()
    {
        return $this->belongsTo(Departamento::class);
    }

    public function detallesolicitud()
    {
        return $this->hasMany(DetalleSolicitud::class);
    }

    public function egresos()
    {
        return $this->hasMany(Egreso::class);
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
