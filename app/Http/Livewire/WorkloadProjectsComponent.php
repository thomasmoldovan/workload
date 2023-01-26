<?php

namespace App\Http\Livewire;

use App\Models\Workload;
use App\Services\SettingsService;
use Livewire\Component;

class WorkloadProjectsComponent extends Component
{
    public $workload;
    public $colaborator_id;

    public $project_weeks;
    public $project_total;
    public $project_guidance;
    public $project_days;

    public $settings;

    protected $listeners = [
        'colaboratorSelected' => 'colaboratorSelected',
        'saveWorkload'        => 'saveWorkloadProjects',
        'refreshChart'        => '$refresh'
    ];

    public function mount()
    {
        $this->project_weeks    = 0;
        $this->project_total    = 0;
        $this->project_guidance = 0;
        $this->project_days     = 0;

        $settingsService = new SettingsService();
        $this->settings   = $settingsService->getSettings();

        unset($settingsService);
    }

    public function render()
    {
        return view('livewire.workload-projects-component');
    }

    public function colaboratorSelected($colaborator_id)
    {
        if ($colaborator_id >=1) {
            $this->colaborator_id = $colaborator_id;
            $this->workload = Workload::where('colaborator_id', $this->colaborator_id)->first();
        } else {
            return false;
        }

        if (is_null($this->workload)) {
            $this->workload = new Workload();

            $this->workload->colaborator_id   = $this->colaborator_id;
            $this->workload->project_weeks    = 0;
            $this->workload->project_guidance = 0;

            $this->workload->save();
        } else {
            $this->project_weeks    = $this->workload->project_weeks;
            $this->project_total    = round($this->project_weeks * $this->settings["TEMPS_PILOTAJ_PROJET"] * $this->settings["DAYS_PER_WEEK"] * 100) / 100;
            $this->project_guidance = $this->workload->project_guidance;
            $this->project_days     = round($this->project_guidance / $this->settings["HOURS_PER_DAY"] * 100) / 100;
        }

        $this->emit('refreshChart');
    }

    public function updated()
    {
        $this->project_total = round($this->project_weeks * $this->settings["TEMPS_PILOTAJ_PROJET"] * $this->settings["DAYS_PER_WEEK"] * 100) / 100;
        $this->project_days  = round($this->project_guidance / $this->settings["HOURS_PER_DAY"] * 100) / 100;
    }

    public function saveWorkloadProjects()
    {
        $this->workload = Workload::where('colaborator_id', $this->colaborator_id)->first();

        $this->workload->project_weeks    = $this->project_weeks;
        $this->workload->project_guidance = $this->project_guidance;

        $this->workload->save();

        $this->emit('refreshChart');
    }
}
