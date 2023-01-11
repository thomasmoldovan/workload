<?php

namespace App\Http\Livewire;

use App\Models\Delivery;
use App\Models\Project;
use Illuminate\Http\Request;
use Livewire\Component;

class ProjectDeliveryComponent extends Component
{
    public $projects;
    public $deliveries;

    public $colaborator_id;
    public $project_id;
    public $nr_hours;
    public $days;

    public $add_enabled = false;

    protected $listeners = [
        'colaboratorSelected' => 'colaboratorSelected',
        'saveWorkload'        => 'saveProjectDelivery',
        'refreshComponent'    => '$refresh'
    ];

    public function mount()
    {
        $this->projects   = Project::all();
        $this->deliveries = [];

        $this->colaborator_id = null;
        $this->project_id     = null;
        $this->nr_hours       = 0;
        $this->days           = 0;

        $this->add_enabled = false;

        $this->updated("", "");
    }

    public function render(Request $request)
    {
        return view('livewire.project-delivery-component');
    }

    public function updated($name, $value)
    {
        if ($this->colaborator_id >= 1 && $this->project_id >= 1 && $this->nr_hours >= 1) {
            $this->add_enabled = true;
        } else {
            $this->add_enabled = false;
        }

        return;
    }

    public function colaboratorSelected($colaborator_id)
    {
        if ($colaborator_id >=1) {
            $this->colaborator_id = $colaborator_id;
        } else {
            $this->add_enabled = false;
        }

        $this->deliveries = [];
        $this->updated("", "");

        Delivery::where(["temporary" => true])->each(function ($delivery) {
            $delivery->delete();
        });
        
        $this->deliveries = Delivery::where("colaborator_id", $this->colaborator_id)->get();
    }

    public function addProjectDelivery() 
    {
        $projectDelivery = new Delivery();
        $projectDelivery->workload_id    = 1;
        $projectDelivery->colaborator_id = $this->colaborator_id;
        $projectDelivery->project_id = $this->project_id;
        $projectDelivery->nr_hours    = $this->nr_hours;
        $projectDelivery->temporary      = 1;

        $this->project_id = null;
        $this->nr_hours  = 0;
        $this->days         = 0;

        $projectDelivery->save();

        $this->deliveries = Delivery::where("colaborator_id", $this->colaborator_id)->get();
    }

    public function deleteProjectDelivery($id) 
    {
        $projectDelivery = Delivery::find($id);
        $projectDelivery->delete();

        $this->deliveries = Delivery::where("colaborator_id", $this->colaborator_id)->get();
    }

    public function saveProjectDelivery() 
    {
        Delivery::where([
            "workload_id" => 1,
            "colaborator_id" => $this->colaborator_id,
            "temporary" => true
        ])->update(["temporary" => false]);

        $this->deliveries = Delivery::where("colaborator_id", $this->colaborator_id)->get();

        $this->emit('refreshComponent');
    } 
}
