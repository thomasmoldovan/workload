<?php

namespace App\Http\Livewire;

use App\Models\Promotion;
use App\Models\Student;
use Illuminate\Http\Request;
use Livewire\Component;
use stdClass;

class StudentPromotionComponent extends Component
{
    public $promotions;
    public $students;

    public $colaborator_id;
    public $promotion_id;
    public $nr_students;
    public $days;

    public $add_enabled = false;

    protected $listeners = [
        'colaboratorSelected' => 'colaboratorSelected',
        'saveWorkload'        => 'saveStudentPromotion',
        'refreshComponent'    => '$refresh'
    ];

    public function mount()
    {
        $this->promotions   = Promotion::all();
        $this->students     = [];

        $this->colaborator_id = null;
        $this->promotion_id = null;
        $this->nr_students  = 0;
        $this->days         = 0;

        $this->add_enabled = false;

        $this->updated("", "");
    }

    public function render(Request $request)
    {
        return view('livewire.student-promotion-component');
    }

    public function updated($name, $value)
    {
        if ($this->colaborator_id >= 1 && $this->promotion_id >= 1 && $this->nr_students >= 1) {
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
            $this->students = [];
        } else {
            $this->add_enabled = false;

            return;
        }

        $this->updated("", "");

        Student::where(["temporary" => true])->each(function ($student) {
            $student->delete();
        });
        
        $this->students = Student::where("colaborator_id", $this->colaborator_id)->get();
    }

    public function addStudentPromotion() 
    {
        $studentPromotion = new Student();
        $studentPromotion->workload_id    = 1;
        $studentPromotion->colaborator_id = $this->colaborator_id;
        $studentPromotion->promotion_id = $this->promotion_id;
        $studentPromotion->nr_students    = $this->nr_students;
        $studentPromotion->temporary      = 1;

        $this->promotion_id = null;
        $this->nr_students  = 0;
        $this->days         = 0;

        $studentPromotion->save();

        $this->students = Student::where("colaborator_id", $this->colaborator_id)->get();
    }

    public function deleteStudentPromotion($id) 
    {
        $studentPromotion = Student::find($id);
        $studentPromotion->delete();

        $this->students = Student::where("colaborator_id", $this->colaborator_id)->get();
    }

    public function saveStudentPromotion() 
    {
        Student::where([
            "workload_id" => 1,
            "colaborator_id" => $this->colaborator_id,
            "temporary" => true
        ])->update(["temporary" => false]);

        $this->students = Student::where("colaborator_id", $this->colaborator_id)->get();

        $this->emit('refreshComponent');
    } 
}