<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empleado extends Model
{
    use HasFactory;
    protected $guarded = ['id','created_at','updated_at'];
    
    public function getRouteKeyName()
    {
        return "slug";
    }

    public function tipodocumento()
    {
        return $this->belongsTo(Tipodocumento::class);
    }

    public function departamento()
    {
        return $this->belongsTo(Departamento::class);
    }

    public function cargo()
    {
        return $this->belongsTo(Cargo::class);
    }

    public function getDisplayEmpleadoAttribute()
    {
        return $this->tipodocumento->abreviado. '-' . $this->cedula . ' ' .$this->nombres . ' ' . $this->apellidos;
    }
}
