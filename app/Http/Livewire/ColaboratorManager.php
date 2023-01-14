<?php

namespace App\Http\Livewire;

use App\Models\Colaborator;
use Livewire\Component;

class ColaboratorManager extends Component
{
    public $colaborators;

    public $colaborator;
    public $colaborator_id;

    public function mount()
    {
        $this->colaborators = Colaborator::all();

        $this->colaborator = Colaborator::find(1);
        $this->colaborator_id = null;
    }

    public function render()
    {
        return view('livewire.colaborator-manager');
    }
}
