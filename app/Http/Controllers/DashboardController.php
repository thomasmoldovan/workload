<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Colaborator;
use App\Models\Project;
use App\Models\Promotion;
use App\Models\Student;

class DashboardController extends Controller
{
    public function index($colaborator_id = null)
    {
        $colaborators = Colaborator::orderBy("surname", "asc")->get();
        $students     = Student::all();
        $promotions   = Promotion::with("promotion_type")->orderBy("name", "asc")->get();
        $projects     = Project::orderBy("name", "asc")->get();

        return view("admin.main.main", compact("colaborators", "students", "promotions", "projects", "colaborator_id"));
    }
}
