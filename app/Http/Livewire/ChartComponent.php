<?php

namespace App\Http\Livewire;

use Livewire\Component;

class ChartComponent extends Component
{
    public $colaborator_id;

    public $responsable_pedagogique;

    public function mount() {
        $this->colaborator_id = 0;
        $this->responsable_pedagogique = 0;
    }

    protected $listeners = [
        'colaboratorSelected' => 'colaboratorSelected',
        'refreshChart' => '$refresh'
    ];

    public function render()
    {
        return view('livewire.chart-component');
    }

    public function colaboratorSelected($colaborator_id)
    {
        if ($colaborator_id >=1) {
            $this->colaborator_id = $colaborator_id;
        }

        // $this->updateChart();
        // $this->emit('refreshChart', $colaborator_id);
    }
}
