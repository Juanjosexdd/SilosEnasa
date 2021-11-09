<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Biennacional extends Model
{
    use HasFactory;
    protected $table = 'biennacionals';

    protected $guarded = ['id','created_at','updated_at'];
    public function getRouteKeyName()
    {
        return "slug";
    }
    public function clacificacion()
    {
        return $this->belongsTo(Clacificacionbienes::class);
    }

    public function asignacionbienes()
    {
        return $this->hasMany(Asignacionbien::class);
    }

    public function getDisplayBienesAttribute()
    {
        return $this->codigo. ' - ' . $this->nombre;
    }
    
}
