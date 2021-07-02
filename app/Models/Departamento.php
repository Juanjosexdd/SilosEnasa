<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Departamento extends Model
{
    use HasFactory;
    protected $guarded = ['id','created_at','updated_at'];
    
    public function getRouteKeyName()
    {
        return "slug";
    }
    public function user()
    {
        return $this->hasMany(User::class);
    }

    public function empleados()
    {
        return $this->hasMany(Empleado::class);
    }
}
