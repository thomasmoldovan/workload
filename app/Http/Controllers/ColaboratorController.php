<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ColaboratorController extends Controller
{
    public function index()
    {
        return view('admin.colaborators.index');
    }
}
