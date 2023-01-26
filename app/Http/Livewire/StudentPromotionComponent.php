<?php

namespace App\Http\Livewire;

use App\Models\Student;
use App\Services\SettingsService;
use Livewire\Component;

class StudentPromotionComponent extends Component
{
    public $promotions;
    public $students;

    public $colaborator_id;
    public $promotion_id;
    public $nr_students;

    public $days;
    public $total_days;
    public $total_hours;

    public $add_enabled = false;

    public $settings;

    protected $listeners = [
        'colaboratorSelected' => 'colaboratorSelected',
        'saveWorkload'        => 'saveStudentPromotion',
        'resetComponent'      => 'resetComponent',
        'refreshComponent'    => '$refresh',
    ];

    public function mount()
    {
        debug("SPC - mount");

        $this->students       = [];

        $this->colaborator_id = null;
        $this->promotion_id   = null;
        $this->nr_students    = 0;

        $this->days           = 0;
        $this->total_days     = 0;
        $this->total_hours    = 0;

        $this->add_enabled = false;

        $settingsService = new SettingsService();
        $this->settings   = $settingsService->getSettings();

        unset($settingsService);
    }

    public function render()
    {
        debug("SPC - render");

        return view('livewire.student-promotion-component');
    }

    public function updated($name, $value)
    {
        debug("SPC - updated ".$name." ".$value);

        if ($this->colaborator_id >= 1 && $this->promotion_id >= 1 && $this->nr_students >= 1) {

            $studentPromotion = new Student();

            $studentPromotion->promotion_id = $this->promotion_id;
            $studentPromotion->nr_students  = $this->nr_students;

            $this->days = (float) $studentPromotion->getDaysFromType();

            unset($studentPromotion);
            
            $this->add_enabled = true;
        } else {
            $this->days = 0;
            $this->add_enabled = false;
        }
    }

    public function colaboratorSelected($colaborator_id)
    {
        debug("SPC - cs");

        if ($colaborator_id >=1) {
            $this->colaborator_id = $colaborator_id;
        } else {
            $this->colaborator_id = null;
            $this->add_enabled    = false;
        }

        $this->students = [];

        Student::where(["temporary" => true])->delete();
        
        $this->updateData();
    }

    public function addStudentPromotion() 
    {
        debug("SPC - add");

        if ($this->add_enabled == false) return;

        $this->add_enabled = false;

        $studentPromotion = new Student();
        $studentPromotion->workload_id    = 1;
        $studentPromotion->colaborator_id = $this->colaborator_id;
        $studentPromotion->promotion_id   = $this->promotion_id;
        $studentPromotion->nr_students    = $this->nr_students;
        $studentPromotion->temporary      = 1;

        $this->resetComponent();

        $studentPromotion->save();

        $this->updateData();
    }

    public function deleteStudentPromotion($id) 
    {
        debug("SPC - delete");

        $studentPromotion = Student::find($id);
        $studentPromotion->delete();

        $this->updateData();
    }

    public function saveStudentPromotion() 
    {
        debug("SPC - save student promotion");

        Student::where([
            "workload_id"    => 1,
            "colaborator_id" => $this->colaborator_id,
            "temporary"      => true
        ])->update(["temporary" => false]);

        $this->resetComponent();

        $this->updateData();
    } 

    public function resetComponent() 
    {
        debug("SPC - resetComponent");

        $this->promotion_id = null;
        $this->nr_students  = 0;
        $this->days         = 0;
    }

    public function updateData() 
    {
        debug("SPC - update data");
        
        $this->students    = Student::where("colaborator_id", $this->colaborator_id)->with("promotion")->with("promotion_type")->get();
        $this->total_days  = $this->getTotalDaysFromStudents();
        $this->total_hours = number_format($this->total_days / $this->settings["HOURS_PER_DAY"], 2);

        $this->emit('updateChart');
    }

    public function getTotalDaysFromStudents() {
        $total_hours = 0;

        foreach ($this->students as $student) {
            $total_hours += $student->getDaysFromType();
        }

        return $total_hours;
    }
}
