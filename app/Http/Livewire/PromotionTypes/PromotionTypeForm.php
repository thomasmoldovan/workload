<?php

namespace App\Http\Livewire\PromotionTypes;

use App\Traits\WithToaster;
use App\Models\Promotion;
use App\Models\PromotionType;
use Livewire\Component;

class PromotionTypeForm extends Component
{
    use WithToaster;

    public $promotiontype;
    public $edit = false;

    protected $listeners = [
        'promotionTypeEdit'   => 'edit',
        'promotionTypeDelete' => 'delete',
    ];

    public function mount() {
        $this->promotiontype = new PromotionType();

        $this->edit = false;
    }

    public function render()
    {
        return view('livewire.promotiontypes.promotion-type-form');
    }

    public function submit() 
    {
        $this->validate();
        $updated = $this->promotiontype->id > 0;

        $this->promotiontype->save();

        $this->alert("success", "Success", "Promotion type successfully ".($updated ? "updated" : "added"));

        $this->refreshAll();
    }

    public function edit(PromotionType $promotiontype) 
    {
        $this->resetValidation();
        
        $this->edit = true;
        $this->promotiontype = $promotiontype;
    }

    public function delete(PromotionType $promotiontype) 
    {
        $promotiontype->delete();
        $this->alert("success", "Success", "Promotion type deleted");

        $this->refreshAll();

        return;
    }

    public function cancel() 
    {
        $this->resetValidation();
        $this->refreshAll();
    }

    public function refreshAll() 
    {
        $errors = null;
        $this->mount(new Promotion());        
        $this->emit('refreshComponent');
        $this->emit('pg:eventRefresh-default');
    }

    public function rules() {
        return [
            "promotiontype.name" => [
                "required",
                "min:2",
                "max:32"
            ],
            "promotiontype.ve_present" => [
                "required"
            ],
            "promotiontype.ve_distance" => [
                "required"
            ],
            "promotiontype.ei" => [
                "required"
            ],
            "promotiontype.ss_present" => [
                "required"
            ],
            "promotiontype.ss_distance" => [
                "required"
            ]
        ];
    }

    public function messages() {
        return [
            "promotiontype.name.required" => "You must enter a promotion type name",
        ];
    }
}
