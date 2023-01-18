<?php

namespace App\Http\Livewire\Promotions;

use App\Traits\WithToaster;
use App\Models\Promotion;
use App\Models\PromotionType;
use Livewire\Component;

class PromotionForm extends Component
{
    use WithToaster;

    public $promotion;
    public $promotionTypes;
    public $edit = false;

    protected $listeners = [
        'promotionEdit'   => 'edit',
        'promotionDelete' => 'delete',
    ];

    public function mount() {
        $this->promotion = new Promotion();
        $this->promotionTypes = PromotionType::all();

        $this->edit = false;
    }

    public function render()
    {
        return view('livewire.promotions.promotion-form');
    }

    public function submit() 
    {
        $this->validate();
        $updated = $this->promotion->id > 0;

        $this->promotion->save();

        $this->alert("success", "Success", "Promotion successfully ".($updated ? "updated" : "added"));

        $this->refreshAll();
    }

    public function edit(Promotion $promotion) 
    {
        $this->resetValidation();
        
        $this->edit = true;
        $this->promotion = $promotion;
    }

    public function delete(Promotion $promotion) 
    {
        $promotion->delete();
        $this->alert("success", "Success", "Promotion deleted");

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
            "promotion.name" => [
                "required",
                "min:2",
                "max:32"
            ],
            "promotion.promotion_type_id" => [
                "required"
            ]
        ];
    }

    public function messages() {
        return [
            "promotion.name.required" => "You must enter a promotion name",
            "promotion.name.min" => "Promotion name to short. Minimum 2 characters allowed",
            "promotion.name.max" => "Promotion name must not exceed 32 characters",
            "promotion.prmotion_type_id.required" => "You must select a promotion type",
        ];
    }
}
