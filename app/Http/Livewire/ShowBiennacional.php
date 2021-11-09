<?php

namespace App\Http\Livewire;

use App\Models\Biennacional;
use Livewire\Component;
use Livewire\WithPagination;

class ShowBiennacional extends Component
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
        $biennacionals = Biennacional::where('nombre', 'like', '%' . $this->search . '%')
                   ->orWhere('descripcion', 'like', '%' . $this->search . '%')
                   ->orWhere('codigo', 'like', '%' . $this->search . '%')
                   ->orderBy($this->sort, $this->direction)
                   ->paginate(10);
                   
        return view('livewire.show-biennacional', compact('biennacionals'));
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
