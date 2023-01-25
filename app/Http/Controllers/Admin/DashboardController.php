<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Colaborator;
use App\Models\Project;
use App\Models\Promotion;
use App\Models\Student;

class DashboardController extends Controller
{
    public function index()
    {
        $colaborators = Colaborator::all();
        $students     = Student::all();
        $promotions   = Promotion::with("promotion_type")->get();
        $projects     = Project::all();

        return view("admin.main.main", compact("colaborators", "students", "promotions", "projects"));
    }
}
