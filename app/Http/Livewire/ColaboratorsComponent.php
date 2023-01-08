<?php

namespace App\Http\Livewire;

use App\Models\Colaborator;
use Livewire\Component;

class ColaboratorsComponent extends Component
{
    public $colaborators;
    public $colaborator_id;

    public function mount()
    {
        $this->colaborators = Colaborator::all();
        $this->colaborator_id = null;
    }

    public function render()
    {
        return view('livewire.colaborators-component');
    }

    public function updatedColaboratorId($value)
    {
        $this->colaborator_id = $value;
        $this->emit('colaboratorSelected', $value);
    }
}
