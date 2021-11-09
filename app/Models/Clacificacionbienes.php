<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Clacificacionbienes extends Model
{
    use HasFactory;
    protected $table = 'clacificacionbienes';
    protected $guarded = ['id','created_at','updated_at'];
    
    public function getRouteKeyName()
    {
        return "slug";
    }
    public function biennacionalss()
    {
        return $this->hasMany(Biennacional::class);
    }

    public function getDisplayClacificacionAttribute()
    {
        return $this->abreviado . ' - ' . $this->nombre;
    }

}
