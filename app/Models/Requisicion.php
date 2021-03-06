<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Requisicion extends Model
{
    use HasFactory;
    protected $table = 'requisicions';

    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function departamento()
    {
        return $this->belongsTo(Departamento::class);
    }

    public function empleado()
    {
        return $this->belongsTo(Empleado::class);
    }

    public function solicitud()
    {
        return $this->belongsTo(Solicitud::class);
    }

    public function detallerequisicion()
    {
        return $this->hasMany(Detallerequisicion::class);
    }

    public function ingresos()
    {
        return $this->hasMany(Ingreso::class);
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
