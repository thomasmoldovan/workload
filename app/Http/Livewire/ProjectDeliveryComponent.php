<?php

namespace App\Http\Livewire;

use App\Models\Delivery;
use App\Services\SettingsService;
use Livewire\Component;

class ProjectDeliveryComponent extends Component
{
    public $deliveries;
    public $projects;

    public $colaborator_id;
    public $project_id;
    public $nr_hours;
    public $multiplier;

    public $total_days;
    public $total_hours;

    public $add_enabled = false;

    public $settings;

    protected $listeners = [
        'colaboratorSelected' => 'colaboratorSelected',
        'saveWorkload'        => 'saveProjectDelivery',
        'resetComponent'      => 'resetComponent',
        'refreshComponent'    => '$refresh'
    ];

    public function mount()
    {
        $this->deliveries = [];

        $this->project_id     = null;
        $this->nr_hours       = 0;
        $this->multiplier     = 2;

        $this->add_enabled = false;

        $settingsService = new SettingsService();
        $this->settings   = $settingsService->getSettings();

        unset($settingsService);

        if (!is_null($this->colaborator_id)) {
            $this->colaboratorSelected($this->colaborator_id);
        }
    }

    public function render()
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
            $this->colaborator_id = null;
            $this->add_enabled = false;
        }

        $this->deliveries = [];

        Delivery::where(["temporary" => true])->delete();
        
        $this->updateData(false);
    }

    public function addProjectDelivery() 
    {
        $projectDelivery = new Delivery();
        $projectDelivery->workload_id    = 1;
        $projectDelivery->colaborator_id = $this->colaborator_id;
        $projectDelivery->project_id     = $this->project_id;
        $projectDelivery->nr_hours       = $this->nr_hours;
        $projectDelivery->multiplier     = $this->multiplier;
        $projectDelivery->temporary      = 1;

        $this->project_id = null;
        $this->nr_hours   = 0;
        $this->multiplier = 2;

        $this->resetComponent();

        $projectDelivery->save();

        $this->updateData();
    }

    public function deleteProjectDelivery($id) 
    {
        $projectDelivery = Delivery::find($id);
        $projectDelivery->delete();

        $this->updateData();
    }

    public function saveProjectDelivery() 
    {
        Delivery::where([
            "workload_id" => 1,
            "colaborator_id" => $this->colaborator_id,
            "temporary" => true
        ])->update(["temporary" => false]);

        $this->resetComponent();

        $this->updateData();
    }

    public function resetComponent() 
    {
        $this->project_id = null;
        $this->nr_hours   = 0;
        $this->multiplier = 2;
    }

    public function updateData($updateChart = true) 
    {
        $this->deliveries = Delivery::where("colaborator_id", $this->colaborator_id)->get();
        
        $this->total_hours = 0;
        foreach ($this->deliveries as $delivery) {
            $this->total_hours += $delivery->nr_hours * $delivery->multiplier;
        }
        $this->total_days = round($this->total_hours / $this->settings["HOURS_PER_DAY"] * 100) / 100;

        if ($updateChart) {
            $this->emit('updateChart');
        }
    }
}
