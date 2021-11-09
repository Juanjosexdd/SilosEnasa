<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Asignacionbien extends Model
{
    use HasFactory;
    protected $table = 'asignacionbiens';

    protected $guarded = ['id','created_at','updated_at'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function empleado()
    {
        return $this->belongsTo(Empleado::class);
    }

    public function biennacional()
    {
        return $this->belongsTo(Biennacional::class);
    }
}
