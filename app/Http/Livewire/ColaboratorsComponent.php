<?php

namespace App\Http\Livewire;

use App\Models\Colaborator;
use Livewire\Component;

class ColaboratorsComponent extends Component
{
    public $colaborators;
    public $colaborator_id;

    public $save_enabled = false;

    protected $listeners = [
        'refreshComponent' => '$refresh'
    ];

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
        if ($value >= 1) {
            $this->colaborator_id = $value;
            $save_enabled = true;
            
            $this->emit('colaboratorSelected', $value);

            return;
        } else {
            $this->colaborator_id = null;
            $save_enabled = false;

            return;
        }
        $this->colaborator_id = null;
    }

    public function saveWorkload() {
        $this->emit('saveWorkload');
    }
}
