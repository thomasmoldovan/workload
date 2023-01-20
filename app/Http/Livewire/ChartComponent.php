<?php

namespace App\Http\Livewire;

use App\Models\Delivery;
use App\Models\Goal;
use App\Models\Student;
use Livewire\Component;

class ChartComponent extends Component
{
    public $colaborator_id;

    public $responsable_pedagogique;
    public $pilote_projet;
    public $face_a_face;
    public $suivi_eleve;
    public $conception_nationale;
    public $activites_campus;
    public $activites_anexe;

    public $chart_labels = [
        "Responsable Pedagogique",
        "Pilote Projet",
        "Face A Face",
        "Suivi Eleve",
        "Conception Nationale",
        "Activites Campus",
        "Activites Anexe",
    ];

    public function mount() {
        $this->colaborator_id = 0;

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

        $this->responsable_pedagogique = $this->twoDecimals($this->getResponsablePedagogique());
        $this->pilote_projet           = $this->twoDecimals($this->getPiloteProjet());
        $this->face_a_face             = $this->twoDecimals($this->getFaceAFace());
        $this->suivi_eleve             = $this->twoDecimals($this->getSuiviEleve());
        $this->conception_nationale    = $this->twoDecimals($this->getConceptionNationale());
        $this->activites_campus        = $this->twoDecimals($this->getActivitesCampus());
        $this->activites_anexe         = $this->twoDecimals($this->getActivitesAnexe());

        $this->updateChart();
    }

    protected function updateChart()
    {
        $data = [
            ["value" => $this->responsable_pedagogique, "name" => "Responsable Pedagogique"],
            ["value" => $this->pilote_projet,           "name" => "Pilote Projet"],
            ["value" => $this->face_a_face,             "name" => "Face A Face"],
            ["value" => $this->suivi_eleve,             "name" => "Suivi Eleve"],
            ["value" => $this->conception_nationale,    "name" => "Conception Nationale"],
            ["value" => $this->activites_campus,        "name" => "Activites Campus"],
            ["value" => $this->activites_anexe,         "name" => "Activites Anexe"]
        ];

        $this->dispatchBrowserEvent('updateChart', [
            "data" => $data
        ]);
    }
    
    protected function getResponsablePedagogique()
    {
        $students = Student::where("colaborator_id", $this->colaborator_id)->get();

        $total_hours = 0;

        foreach ($students as $student) {
            $total_hours += $student->getDaysFromType();
        }

        $total_days = $this->twoDecimals($total_hours / $_ENV["HOURS_PER_WEEK"]);

        return $total_days;
    }

    protected function getPiloteProjet()
    {
        $goals = Goal::where("colaborator_id", $this->colaborator_id)->get();

        $total_hours = 0;
        foreach ($goals as $goal) {
            $total_hours += $goal->promotion->days;
        }

        return $total_hours;
    }

    protected function getFaceAFace()
    {
        $total_hours = Delivery::where("colaborator_id", $this->colaborator_id)->sum("nr_hours");
        $total_hours = $this->twoDecimals($total_hours / $_ENV["HOURS_PER_WEEK"]);
        
        return $total_hours;
    }
    protected function getSuiviEleve()
    {
        return 0;
    }
    protected function getConceptionNationale()
    {
        return 0;
    }
    protected function getActivitesCampus()
    {
        return 0;
    }
    protected function getActivitesAnexe()
    {
        return 0;
    }

    protected function twoDecimals($number)
    {
        return round($number * 100) / 100;
    }

}