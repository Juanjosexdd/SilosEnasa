<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use App\Models\Tipodocumento;
use Illuminate\Support\Facades\Hash;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;
    use HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = ['id','created_at','updated_at'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'profile_photo_url',
    ];
    public function getRouteKeyName()
    {
        return "slug";
    }
    public function tipodocumento()
    {
        return $this->belongsTo(Tipodocumento::class);
    }

    public function profile()
    {
        return $this->belongsTo(Profile::class);
    }

    public function departamento()
    {
        return $this->belongsTo(Departamento::class);
    }

    public function cargo()
    {
        return $this->belongsTo(Cargo::class);
    }

    public function setPasswordAttribute($pass)
    {
        $this->attributes['password'] = Hash::make($pass);
    }

    public function logins()
    {
        return $this->hasMany('App\Models\Login');
    }
    public function logs()
    {
        return $this->hasMany('App\Models\Log\LogSistema');
    }
    public function asignacionbienes()
    {
        return $this->hasMany(Asignacionbien::class);
    }
    public function ingresos()
    {
        return $this->hasMany(Ingreso::class);
    }
    public function getDisplayUserAttribute()
    {
        return $this->tipodocumento->abreviado. '-' . $this->cedula . ' ' .$this->name . ' ' . $this->last_name;
    }

}
