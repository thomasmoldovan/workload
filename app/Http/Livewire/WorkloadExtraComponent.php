<?php

namespace App\Http\Livewire;

use App\Models\Workload;
use Livewire\Component;

class WorkloadExtraComponent extends Component
{
    public $workload;
    public $colaborator_id;

    public $national_days;
    public $campus_days;
    public $delivery_days;

    protected $listeners = [
        'colaboratorSelected' => 'colaboratorSelected',
        // 'saveWorkload'        => 'saveWorkloadExtra',
        // 'refreshChart'        => '$refresh'
    ];

    public function mount()
    {
        $this->national_days = 0;
        $this->campus_days = 0;
        $this->delivery_days = 0;

        if (!is_null($this->colaborator_id)) {
            $this->colaboratorSelected($this->colaborator_id);
        }
    }

    public function render()
    {
        return view('livewire.workload-extra-component');
    }

    public function colaboratorSelected($colaborator_id)
    {
        if ($colaborator_id >=1) {
            $this->colaborator_id = $colaborator_id;
            $this->workload = Workload::where('colaborator_id', $this->colaborator_id)->first();
        } else {
            $this->workload->national_days = 0;
            $this->workload->campus_days = 0;
            $this->workload->delivery_days = 0;
        }

        if (is_null($this->workload)) {
            $this->workload = new Workload();

            $this->workload->colaborator_id = $this->colaborator_id;
            $this->workload->national_days = 0;
            $this->workload->campus_days = 0;
            $this->workload->delivery_days = 0;

            $this->workload->save();
        } else {
            $this->national_days = $this->workload->national_days;
            $this->campus_days = $this->workload->campus_days;
            $this->delivery_days = $this->workload->delivery_days;
        }

        $this->updateData(false);
    }

    public function saveWorkloadExtra()
    {
        $this->workload = Workload::where('colaborator_id', $this->colaborator_id)->first();

        $this->workload->national_days = $this->national_days;
        $this->workload->campus_days = $this->campus_days;
        $this->workload->delivery_days = $this->delivery_days;

        $this->workload->save();
    }

    public function updated()
    {
        $this->updateData();
    }

    public function updateData($updateChart = true) 
    {
        if (empty($this->national_days)) {
            $this->national_days = 0;
        }
        if (empty($this->campus_days)) {
            $this->campus_days = 0;
        }
        if (empty($this->delivery_days)) {
            $this->delivery_days = 0;
        }

        $this->saveWorkloadExtra();

        if ($updateChart) {
            $this->emit('updateChart');
        }
    }
}
