<?php

namespace App\Http\Livewire;

use App\Models\Asignacionbien;
use Livewire\Component;
use Livewire\WithPagination;

class ShowAsignacion extends Component
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
        $asignacionbiens = Asignacionbien::where('empleado_id', 'like', '%' . $this->search . '%')
            ->where('bienesnacionales_id', 'like', '%' . $this->search . '%')
            ->where('user_id', 'like', '%' . $this->search . '%')
            ->orderBy($this->sort, $this->direction)
            ->paginate(10);

        return view('livewire.show-asignacion', compact('asignacionbiens'));
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
