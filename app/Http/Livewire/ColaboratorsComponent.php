<?php

namespace App\Http\Livewire;

use App\Models\Colaborator;
use Illuminate\Http\Request;
use Livewire\Component;

class ColaboratorsComponent extends Component
{
    public $colaborators;

    public $colaborator;
    public $colaborator_id;

    public $save_enabled = false;
    public $edit = false;

    protected $listeners = [
        'refreshComponent' => '$refresh'
    ];

    public function mount($colaborator_id = null)
    {
        $this->colaborator_id = $colaborator_id;
        
        if ($this->colaborator_id >= 1) {
            $this->save_enabled = true;

            $this->emit('updateChart');
        }
    }

    public function render()
    {
        return view('livewire.colaborators-component');
    }

    public function updatedColaboratorId($value)
    {
        debug("Colaborator Changed: ".$value);
        if ($value >= 1) {
            $this->colaborator_id = $value;
            $this->save_enabled = true;
            
        } else {
            $this->colaborator_id = null;
            $this->save_enabled = false;
        }

        $this->emit('colaboratorSelected', $this->colaborator_id);

        return;
    }

    public function delete(Colaborator $colaborator) 
    {
        if ($colaborator->children()->count() > 1) {
            $this->alert("error", "Error", "This colaborator is currently in use and cannot be deleted");
            return;
        }

        $colaborator->delete();
        $this->alert("success", "Success", "colaborator deleted");

        $this->refreshAll();

        return;
    }

    public function cancel() 
    {
        $this->refreshAll();
    }

    public function refreshAll() 
    {
        $this->emit('refreshComponent');
    }

    public function saveWorkload() {
        $this->emit('saveWorkload');
    }

    public function exportPDF($colaborator_id) {
        $this->emit('exportPDF', $colaborator_id);
    }
}
