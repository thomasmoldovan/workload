<?php

namespace App\Services;

use App\Models\Colaborator;
use App\Models\Delivery;
use App\Models\Goal;
use App\Models\Student;
use App\Models\Workload;

class OverviewService
{
    public $colaborator_id;
    public $settings;

    public function __construct()
    {
        $this->colaborator_id = null;

        $settingsService = new SettingsService();
        $this->settings   = $settingsService->getSettings();

        unset($settingsService);
    }

    public function getOverview()
    {
        $colaborators = Colaborator::orderBy("surname", "asc")->get();

        $overview = [];
        foreach ($colaborators as $colaborator) {
            $this->colaborator_id = $colaborator->id;
            
            $overview[$colaborator->id]["id"] = $colaborator->id;
            $overview[$colaborator->id]["name"] = "(".$colaborator->trigramme.") - ".$colaborator->surname." ".$colaborator->lastname;
            $overview[$colaborator->id]["responsable_pedagogique"] = $this->getResponsablePedagogique();
            $overview[$colaborator->id]["pilote_projet"] = $this->getPiloteProjet();
            $overview[$colaborator->id]["face_a_face"] = $this->getFaceAFace();
            $overview[$colaborator->id]["suivi_eleve"] = $this->getSuiviEleve();
            $overview[$colaborator->id]["conception_nationale"] = $this->getConceptionNationale();
            $overview[$colaborator->id]["activites_campus"] = $this->getActivitesCampus();
            $overview[$colaborator->id]["autre_activites"] = $this->getAutreActivites();

            $overview[$colaborator->id]["total"] = (float) number_format(
                            $overview[$colaborator->id]["responsable_pedagogique"] * 100 / $this->settings["TOTAL_DAYS"] +
                            $overview[$colaborator->id]["pilote_projet"] * 100 / $this->settings["TOTAL_DAYS"] +
                            $overview[$colaborator->id]["face_a_face"] * 100 / $this->settings["TOTAL_DAYS"] + 
                            $overview[$colaborator->id]["suivi_eleve"] * 100 / $this->settings["TOTAL_DAYS"] +
                            $overview[$colaborator->id]["conception_nationale"] * 100 / $this->settings["TOTAL_DAYS"] +
                            $overview[$colaborator->id]["activites_campus"] * 100 / $this->settings["TOTAL_DAYS"] +
                            $overview[$colaborator->id]["autre_activites"] * 100 / $this->settings["TOTAL_DAYS"], 2);
        }

        return $overview;
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
        $pilote_projet = round($pilote_projet * $this->settings["TEMPS_PILOTAJ_PROJET"] * $this->settings["DAYS_PER_WEEK"] * 100) / 100;

        return $pilote_projet;
    }

    protected function getFaceAFace() // DONE
    {
        $deliveries = Delivery::where("colaborator_id", $this->colaborator_id)->get();

        $total_hours = 0;
        foreach ($deliveries as $delivery) {
            $total_hours += $delivery->nr_hours * $delivery->multiplier;
        }

        $total_days = $this->twoDecimals($total_hours / $this->settings["HOURS_PER_DAY"]);
        
        return $total_days;
    }
    protected function getSuiviEleve()
    {
        $students = Student::where("colaborator_id", $this->colaborator_id)->get();

        $total_hours = 0;

        foreach ($students as $student) {
            $total_hours += $student->getDaysFromType();
        }

        $total_days = $this->twoDecimals($total_hours / $this->settings["HOURS_PER_DAY"]);

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