<?php

namespace App\Http\Livewire;

use App\Models\Colaborator;
use App\Models\Delivery;
use App\Models\Goal;
use App\Models\Student;
use App\Models\Workload;
use Livewire\Component;

class ChartComponent extends Component
{
    public $colaborator_id;
    public $chart_colaborator_name;

    public $responsable_pedagogique;
    public $pilote_projet;
    public $face_a_face;
    public $suivi_eleve;
    public $conception_nationale;
    public $activites_campus;
    public $activites_anexe;

    public $chart_labels = [
        "Responsable Pedagogique",
        "Planification Projets",
        "Face A Face",
        "Suivi Eleve",
        "Conception Nationale",
        "Activites Campus",
        "Autres Activites",
    ];

    public function mount() 
    {
        $this->colaborator_id = 0;

        $this->chart_colaborator_name = "";

        $this->responsable_pedagogique = 0;
        $this->pilote_projet = 0;
        $this->face_a_face = 0;
        $this->suivi_eleve = 0;
        $this->conception_nationale = 0;
        $this->activites_campus = 0;
        $this->activites_anexe = 0;
    }

    protected $listeners = [
        'colaboratorSelected' => 'colaboratorSelected',
        'updateChart'         => 'recalculateChart',
        // 'refreshChart'        => '$refresh'
    ];

    public function render()
    {
        return view('livewire.chart-component');
    }

    public function recalculateChart()
    {
        $this->colaboratorSelected($this->colaborator_id);
    }

    public function colaboratorSelected($colaborator_id)
    {
        if ($colaborator_id >=1) {
            $this->colaborator_id = $colaborator_id;

            $colaborator = Colaborator::where("id", $this->colaborator_id)->first();
            $this->chart_colaborator_name = strtoupper($colaborator->surname)." ".ucwords(strtolower($colaborator->lastname));
        } else {
            $this->chart_colaborator_name = "";
        }
        
        $this->responsable_pedagogique = $this->twoDecimals($this->getResponsablePedagogique());
        $this->pilote_projet           = $this->twoDecimals($this->getPiloteProjet());
        $this->face_a_face             = $this->twoDecimals($this->getFaceAFace());
        $this->suivi_eleve             = $this->twoDecimals($this->getSuiviEleve());
        $this->conception_nationale    = $this->twoDecimals($this->getConceptionNationale());
        $this->activites_campus        = $this->twoDecimals($this->getActivitesCampus());
        $this->activites_anexe         = $this->twoDecimals($this->getAutreActivites());

        $this->updateChart();
    }

    protected function updateChart()
    {
        $data = [
            ["value" => $this->responsable_pedagogique, "name" => "Responsable Pedagogique"],
            ["value" => $this->pilote_projet,           "name" => "Planification Projets"],
            ["value" => $this->face_a_face,             "name" => "Face A Face"],
            ["value" => $this->suivi_eleve,             "name" => "Suivi Eleve"],
            ["value" => $this->conception_nationale,    "name" => "Conception Nationale"],
            ["value" => $this->activites_campus,        "name" => "Activites Campus"],
            ["value" => $this->activites_anexe,         "name" => "Activites Anexe"]
        ];

        // $this->emit("refreshChart");

        $this->dispatchBrowserEvent('updateChart', [
            "data" => $data
        ]);
    }
    
    protected function getResponsablePedagogique()
    {
        $goals = Goal::where("colaborator_id", $this->colaborator_id)->get();
        $total_hours = 0;
        foreach ($goals as $goal) {
            $total_hours += $goal->promotion->days;
        }

        return $total_hours;
    }

    protected function getPiloteProjet() // DONE
    {
        $pilote_projet = Workload::where("colaborator_id", $this->colaborator_id)->first()->project_weeks;
        $pilote_projet = round($pilote_projet * $_ENV['TEMPS_PILOTAJ_PROJET'] * $_ENV['DAYS_PER_WEEK'] * 100) / 100;

        return $pilote_projet;
    }

    protected function getFaceAFace() // DONE
    {
        $deliveries = Delivery::where("colaborator_id", $this->colaborator_id)->get();

        $total_hours = 0;
        foreach ($deliveries as $delivery) {
            $total_hours += $delivery->nr_hours * $delivery->multiplier;
        }

        $total_days = $this->twoDecimals($total_hours / $_ENV["HOURS_PER_DAY"]);
        
        return $total_days;
    }
    protected function getSuiviEleve()
    {
        $students = Student::where("colaborator_id", $this->colaborator_id)->get();

        $total_hours = 0;

        foreach ($students as $student) {
            $total_hours += $student->getDaysFromType();
        }

        $total_days = $this->twoDecimals($total_hours / $_ENV["HOURS_PER_DAY"]);

        return $total_days;
    }
    protected function getConceptionNationale()
    {
        $national_days = Workload::where("colaborator_id", $this->colaborator_id)->get()[0]->national_days;

        return $national_days;
    }
    protected function getActivitesCampus()
    {
        $campus_days = Workload::where("colaborator_id", $this->colaborator_id)->get()[0]->campus_days;

        return $campus_days;
    }
    protected function getAutreActivites()
    {
        $delivery_days = Workload::where("colaborator_id", $this->colaborator_id)->get()[0]->delivery_days;

        return $delivery_days;
    }

    protected function twoDecimals($number)
    {
        return round($number * 100) / 100;
    }

}