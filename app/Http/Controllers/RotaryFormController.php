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

    public function saveStep1(Request $request)
    {
        $validate = $request->validate([
            'step' => 'required',
        ]);

        return redirect()->route('simulation.form');
    }

    public function saveStep2(Request $request)
    {
        $validate = $request->validate([
            'step' => 'required',
        ]);

        return redirect()->route('simulation.form');
    }

    public function saveStep3(Request $request)
    {
        $validate = $request->validate([
            'step' => 'required',
        ]);

        return redirect()->route('simulation.form');
    }

    public function saveStep4(Request $request)
    {
        $validate = $request->validate([
            'step' => 'required',
        ]);

        return redirect()->route('simulation.form');
    }

    public function saveStep5(Request $request)
    {
        $validate = $request->validate([
            'step' => 'required',
        ]);

        return redirect()->route('simulation.form');
    }

    public function saveStep6(Request $request)
    {
        $validate = $request->validate([
            'step' => 'required',
        ]);

        return redirect()->route('simulation.form');
    }

    public function saveStep7(Request $request)
    {
        $validate = $request->validate([
            'step' => 'required',
        ]);

        return redirect()->route('simulation.form');
    }

    public function saveStep8(Request $request)
    {
        $validate = $request->validate([
            'step' => 'required',
        ]);

        return redirect()->route('simulation.form');
    }

    public function saveStep9(Request $request)
    {
        $validate = $request->validate([
            'step' => 'required',
        ]);

        return redirect()->route('simulation.form');
    }

    public function saveStep10(Request $request)
    {
        $validate = $request->validate([
            'step' => 'required',
        ]);

        return redirect()->route('simulation.form');
    }

    public function saveStep11(Request $request)
    {
        $validate = $request->validate([
            'step' => 'required',
        ]);

        return redirect()->route('simulation.form');
    }

    public function saveStep12(Request $request)
    {
        $validate = $request->validate([
            'step' => 'required',
        ]);

        return redirect()->route('simulation.form');
    }
}
