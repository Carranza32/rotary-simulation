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
            'current_step' => 'required',
            'project_name' => 'required',
            'type' => 'required',
            'contacts' => 'nullable',
        ]);

        return back()->with('flash', [
            'message' => 'Step 1 saved successfully',
        ]);
    }

    public function saveStep2(Request $request)
    {
        $validate = $request->validate([
            'current_step' => 'required',
            'local_members' => 'nullable',
            'international_members' => 'nullable',
            'members_conflict' => 'required',
        ]);

        return redirect()->route('simulation.form');
    }

    public function saveStep3(Request $request)
    {
        $validate = $request->validate([
            'current_step' => 'required',
            'objectives' => 'required',
        ]);

        return redirect()->route('simulation.form');
    }

    public function saveStep4(Request $request)
    {
        $validate = $request->validate([
            'current_step' => 'required',
            'interest_area' => 'required',
        ]);

        return redirect()->route('simulation.form');
    }

    public function saveStep5(Request $request)
    {
        $validate = $request->validate([
            'current_step' => 'required',
            'interest_area_goals' => 'required',
            'measures' => 'nullable',
            'evaluation' => 'required',
        ]);

        return redirect()->route('simulation.form');
    }

    public function saveStep6(Request $request)
    {
        $validate = $request->validate([
            'current_step' => 'required',
            'city' => 'required',
            'state' => 'required',
            'country' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
        ]);

        return redirect()->route('simulation.form');
    }

    public function saveStep7(Request $request)
    {
        $validate = $request->validate([
            'current_step' => 'required',
            'organizers' => 'nullable',
            'members' => 'required',
            'travellers' => 'required',
            'local_sponsors' => 'required',
            'international_sponsors' => 'required',
        ]);

        return redirect()->route('simulation.form');
    }

    public function saveStep8(Request $request)
    {
        $validate = $request->validate([
            'current_step' => 'required',
            'currency' => 'required',
            'exchange_rate' => 'required',
            'headings' => 'nullable',
            'budget_step8' => 'required',
        ]);

        return redirect()->route('simulation.form');
    }

    public function saveStep9(Request $request)
    {
        $validate = $request->validate([
            'current_step' => 'required',
            'sources' => 'nullable',
            'world_donation' => 'required',
            'total_contributions' => 'required',
            'total_financed' => 'required',
            'total_budget' => 'required',
        ]);

        return redirect()->route('simulation.form');
    }

    public function saveStep10(Request $request)
    {
        $validate = $request->validate([
            'current_step' => 'required',
        ]);

        return redirect()->route('simulation.form');
    }

    public function saveStep11(Request $request)
    {
        $validate = $request->validate([
            'current_step' => 'required',
        ]);

        return redirect()->route('simulation.form');
    }

    public function saveStep12(Request $request)
    {
        $validate = $request->validate([
            'current_step' => 'required',
        ]);

        return redirect()->route('simulation.form');
    }
}
