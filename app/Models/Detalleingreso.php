<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detalleingreso extends Model
{
    use HasFactory;

    protected $table = 'detalle_ingreso';

    protected $guarded = ['id','created_at','updated_at'];
    
}
