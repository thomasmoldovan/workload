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
            $this->save_enabled = true;
            
            $this->emit('colaboratorSelected', $value);
        } else {
            $this->colaborator_id = null;
            $this->save_enabled = false;

            $this->emit('resetAll', $value);
        }

        return;
    }

    public function saveWorkload() {
        $this->emit('saveWorkload');
    }
}
