<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PromotionTypesController extends Controller
{
    public function index()
    {
        return view('admin.promotion-types.index');
    }
}
