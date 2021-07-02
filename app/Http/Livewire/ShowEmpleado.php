<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Empleado;
use App\Models\Departamento;
use App\Models\Tipodocumento;
use App\Models\Cargo;

class ShowEmpleado extends Component
{
    protected $paginationTheme = "bootstrap";
    use WithPagination;
    public $search;
    public $sort = 'id';
    public $direction = 'desc';
    protected $listeners = ['render' => 'render'];

    public function updatingSearch()
    {
        $this->resetPage();
    }
    

    public function render()
    {
        $departamentos = Departamento::pluck('nombre','id');
        $tipodocumentos = Tipodocumento::pluck('abreviado','id');
        $cargos = Cargo::pluck('nombre','id');
        $empleados = Empleado::where('cedula', 'like', '%' . $this->search . '%')
                   ->orWhere('nombres', 'like', '%' . $this->search . '%')
                   ->orWhere('cargo_id', 'like', '%' . $this->search . '%')
                   ->orWhere('email', 'like', '%' . $this->search . '%')
                   ->orderBy($this->sort, $this->direction)
                   ->paginate(10);
                   
        return view('livewire.show-empleado', compact('empleados','cargos','departamentos','tipodocumentos'));
    }

    public function order($sort)
    {
        if ($this->sort == $sort) {
            if ($this->direction == 'desc') {
                $this->direction = 'asc';
            } else {
                $this->direction = 'desc';
            }
        } else {
            $this->sort = $sort;
            $this->direction = 'asc';
        }
        
        $this->sort = $sort;
    }

}
