<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detallerequisicion extends Model
{
    use HasFactory;
    protected $table = 'detalle_requisicion';

    protected $guarded = ['id'];


    public function requisicion()
    {
        return $this->belongsTo(Requisicion::class);
    }

    public function productos()
    {
        return $this->hasMany(Producto::class);
    }
}
