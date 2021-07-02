<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ciudad extends Model
{
    use HasFactory;

    //protected $fillable = ['id','nombre','slug','estados_id','created_at','updated_at'];
    protected $guarded = ['id','created_at','updated_at'];
    
    public function getRouteKeyName()
    {
        return "slug";
    }

    public function estado()
    {
        //return $this->belongsTo(Estado::class);
        return $this->belongsTo(Estado::class, 'estados_id');
    }

}