<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Cargo;
use App\Models\Departamento;
use App\Models\Tipodocumento;
use Spatie\Permission\Models\Role;
use App\Models\User;


class CreateUser extends Component
{
    public function render()
    {
        
        $departamentos = Departamento::pluck('nombre','id');
        $tipodocumentos = Tipodocumento::pluck('abreviado','id');
        $cargos = Cargo::pluck('nombre','id');
        $roles = Role::all();
        return view('livewire.create-user', compact('cargos','departamentos','tipodocumentos','roles'));
    }
}
