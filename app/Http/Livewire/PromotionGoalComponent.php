<?php

namespace App\Http\Livewire;

use App\Models\Goal;
use App\Models\Promotion;
use Livewire\Component;

class PromotionGoalComponent extends Component
{
    public $promotions;
    public $goals;

    public $colaborator_id;
    public $promotion_id;

    public $days;
    public $total_days;
    public $total_hours;

    public $add_enabled = false;

    protected $listeners = [
        'colaboratorSelected' => 'colaboratorSelected',
        'saveWorkload'        => 'savePromotionGoals',
        'resetComponent'      => 'resetComponent',
        'refreshComponent'    => '$refresh'
    ];

    public function mount()
    {
        $this->goals     = [];

        $this->promotion_id   = null;

        $this->days           = 0;
        $this->total_days     = 0;
        $this->total_hours    = 0;

        $this->add_enabled = false;

        if (!is_null($this->colaborator_id)) {
            $this->colaboratorSelected($this->colaborator_id);
        }
    }

    public function render()
    {
        return view('livewire.promotion-goal-component');
    }

    public function updated($name, $value)
    {
        if ($this->colaborator_id >= 1 && $this->promotion_id >= 1) {
            $promotion = Promotion::find($this->promotion_id);
            $this->days = (float) $promotion->days;

            unset($promotionGoal);
            
            $this->add_enabled = true;
        } else {
            $this->days = 0;
            $this->add_enabled = false;
        }

        return;
    }

    public function colaboratorSelected($colaborator_id)
    {
        if ($colaborator_id >=1) {
            $this->colaborator_id = $colaborator_id;
        } else {
            $this->colaborator_id = null;
            $this->add_enabled = false;
        }

        $this->goals = [];
        $this->updated("", "");

        Goal::where(["temporary" => true])->delete();
        
        $this->updateData();
    }

    public function addPromotionGoal() 
    {
        if ($this->add_enabled == false) return;

        $this->add_enabled = false;

        $promotionGoal = new Goal();
        $promotionGoal->workload_id    = 1;
        $promotionGoal->colaborator_id = $this->colaborator_id;
        $promotionGoal->promotion_id   = $this->promotion_id;
        $promotionGoal->temporary      = 1;

        $this->resetComponent();

        $promotionGoal->save();

        $this->updateData();
    }

    public function deletePromotionGoal($id) 
    {
        $promotionGoal = Goal::find($id);
        $promotionGoal->delete();

        $this->updateData();
    }

    public function savePromotionGoals() 
    {
        Goal::where([
            "workload_id"    => 1,
            "colaborator_id" => $this->colaborator_id,
            "temporary"      => true
        ])->update(["temporary" => false]);

        $this->resetComponent();

        $this->updateData();
    } 

    public function resetComponent() 
    {
        $this->promotion_id = null;
        $this->days         = 0;
    }

    public function updateData() 
    {
        $this->goals = Goal::where("colaborator_id", $this->colaborator_id)->get();
        $this->total_hours = 0;
        foreach ($this->goals as $goal) {
            $this->total_hours += $goal->promotion->days;
        }

        $this->emit('updateChart');
    }
}
