<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class RotaryFormController extends Controller
{
    public function form()
    {
        return Inertia::render('RotaryForm');
    }
}
