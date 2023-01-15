<?php

namespace App\Http\Livewire;

use App\Models\Colaborator;
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

    public function edit(Colaborator $colaborator) 
    {
        $this->edit = true;
        $this->colaborator = $colaborator;
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
        $this->mount();
        $this->emit('refreshComponent');
        $this->emit('pg:eventRefresh-default');
    }

    public function saveWorkload() {
        $this->emit('saveWorkload');
    }
}
