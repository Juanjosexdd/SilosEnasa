<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Solicitud;
use Illuminate\Auth\Access\HandlesAuthorization;

class SolicitudPolicy
{
    use HandlesAuthorization;

    
    public function author(User $user, Solicitud $solicitud)
    {
        if ($user->id == $solicitud->user_id) {
            return true;
        }else{
            return false;
        }
    }
}
