<?php

namespace App\Http\Livewire\Colaborators;

use App\Http\Traits\WithToaster;
use App\Models\Colaborator;
use Livewire\Component;

class ColaboratorForm extends Component
{
    use WithToaster;

    public Colaborator $colaborator;
    public $edit = false;

    protected $listeners = [
        'colaboratorEdit'   => 'edit',
        'colaboratorDelete' => 'delete',
    ];

    public function mount() {
        $this->colaborator = new Colaborator();
        $this->edit = false;
    }

    public function render()
    {
        return view('livewire.colaborators.colaborator-form');
    }

    public function submit() 
    {
        $this->validate();
        $updated = $this->colaborator->id > 0;

        $this->colaborator->save();

        $this->alert("success", "Success", "Colaborator successfully ".($updated ? "updated" : "added"));

        $this->refreshAll();
    }

    public function updated($name, $value) 
    {
        if ($name == "colaborator.surname" || $name == "colaborator.lastname") {
            $this->colaborator->surname = strtoupper($this->colaborator->surname);
            $this->colaborator->trigramme = strtoupper(substr($this->colaborator->lastname, 0, 1)
                .substr($this->colaborator->surname, 0, 1)
                .substr($this->colaborator->surname, -1));
        }

        $this->validate();
    }

    public function edit(Colaborator $colaborator) 
    {
        $this->edit = true;
        $this->colaborator = $colaborator;
    }

    public function delete(Colaborator $colaborator) 
    {
        // if ($colaborator->promotions()->count() > 1) {
        //     $this->alert("error", "Error", "This colaborator still has promotions associated and cannot be deleted");
        //     return;
        // }

        // if ($colaborator->students()->count() > 1) {
        //     $this->alert("error", "Error", "This colaborator still has promotions associated and cannot be deleted");
        //     return;
        // }

        // if ($colaborator->delivery()->count() > 1) {
        //     $this->alert("error", "Error", "This colaborator still has promotions associated and cannot be deleted");
        //     return;
        // }

        $colaborator->delete();
        $this->alert("success", "Success", "Colaborator deleted");

        $this->refreshAll();

        return;
    }

    public function cancel() 
    {
        $this->refreshAll();
    }

    public function refreshAll() 
    {
        $this->mount(new Colaborator());        
        $this->emit('refreshComponent');
        $this->emit('pg:eventRefresh-default');
    }

    public function rules() {
        return [
            "colaborator.surname" => [
                "required",
                "min:2",
                "max:32"
            ],
            "colaborator.lastname" => [
                "required",
                "min:2",
                "max:32"
            ],
            "colaborator.trigramme" => [
                "required",
                "unique:colaborators,trigramme,".$this->colaborator->id.",id",
                "min:3",
                "max:3"
            ]
        ];
    }

    public function messages() {
        return [
            "colaborator.surname.required" => "You must enter a colaborator surname",
            "colaborator.surname.min" => "Colaborator surname to short. Minimum 2 characters allowed",
            "colaborator.surname.max" => "Colaborator surname must not exceed 32 characters",
            "colaborator.lastname.required" => "You must enter a colaborator lastname",
            "colaborator.lastname.min" => "Colaborator lastname to short. Minimum 2 characters allowed",
            "colaborator.lastname.max" => "Colaborator lastname must not exceed 32 characters",
            "colaborator.trigramme.required" => "You must enter a trigramme",
            "colaborator.name.unique" => "Trigramme already exists",
        ];
    }
}
