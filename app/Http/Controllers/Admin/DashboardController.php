<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Colaborator;
use App\Models\Promotion;
use App\Models\Student;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $colaborators = Colaborator::all();
        $promotions = Promotion::all();
        $students = Student::all();

        return view("admin.main.main", compact("colaborators", "promotions", "students"));
    }
}
