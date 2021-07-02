<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Ciudad;

class Estado extends Model
{
    use HasFactory;

    protected $guarded = ['id','created_at','updated_at'];
    
    public function getRouteKeyName()
    {
        return "slug";
    }

    public function ciudad()
    {
        return $this->hasMany(Ciudad::class);
    
    }


}
