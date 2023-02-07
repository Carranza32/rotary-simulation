<?php

namespace App\Http\Controllers;

use App\Models\RotaryForm;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Inertia\Inertia;

class RotaryFormController extends Controller
{
    public function dashboard()
    {
        $user = auth()->user();

        return Inertia::render('Dashboard', [
            'forms' => RotaryForm::where('user_id', $user->id)->get(),
        ]);
    }

    public function form($id = null)
    {
        $rotary = RotaryForm::find($id);

        return Inertia::render('RotaryForm', [
            'form' => $rotary,
        ]);
    }

    public function saveStep1(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'current_step' => 'required',
            'project_name' => 'required',
            'type' => 'required',
            'contacts' => 'nullable',
        ]);

        if ($validate->fails()) {
            return response()->json([
                'errors' => $validate->errors()->all(),
                'status' => false
            ], 400);
        }

        $rotary = RotaryForm::create([
            'current_step' => 2,
            'project_name' => $request->project_name,
            'type' => $request->type,
            'contacts' => $request->contacts,
            'user_id' => auth()->user()->id,
        ]);

        return response()->json([
            'message' => 'Step 1 saved successfully',
            'data' => $rotary,
        ], 200);
    }

    public function saveStep2(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'current_step' => 'required',
            'local_members' => 'nullable',
            'international_members' => 'nullable',
            'members_conflict' => 'required',
        ]);

        if ($validate->fails()) {
            return response()->json([
                'errors' => $validate->errors()->all(),
                'status' => false
            ], 400);
        }

        $rotary = RotaryForm::find($request->id)->update($validate->validated());

        return redirect()->route('simulation.form');
    }

    public function saveStep3(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'current_step' => 'required',
            'objectives' => 'required',
        ]);

        if ($validate->fails()) {
            return response()->json([
                'errors' => $validate->errors()->all(),
                'status' => false
            ], 400);
        }

        $rotary = RotaryForm::find($request->id)->update($validate->validated());

        return redirect()->route('simulation.form');
    }

    public function saveStep4(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'current_step' => 'required',
            'interest_area' => 'required',
        ]);

        if ($validate->fails()) {
            return response()->json([
                'errors' => $validate->errors()->all(),
                'status' => false
            ], 400);
        }

        $rotary = RotaryForm::find($request->id)->update($validate->validated());

        return redirect()->route('simulation.form');
    }

    public function saveStep5(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'current_step' => 'required',
            'interest_area_goals' => 'required',
            'measures' => 'nullable',
            'evaluation' => 'required',
        ]);

        if ($validate->fails()) {
            return response()->json([
                'errors' => $validate->errors()->all(),
                'status' => false
            ], 400);
        }

        $rotary = RotaryForm::find($request->id)->update($validate->validated());

        return redirect()->route('simulation.form');
    }

    public function saveStep6(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'current_step' => 'required',
            'city' => 'required',
            'state' => 'required',
            'country' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
        ]);

        if ($validate->fails()) {
            return response()->json([
                'errors' => $validate->errors()->all(),
                'status' => false
            ], 400);
        }

        $rotary = RotaryForm::find($request->id)->update($validate->validated());

        return redirect()->route('simulation.form');
    }

    public function saveStep7(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'current_step' => 'required',
            'measures' => 'nullable',
            'members' => 'required',
            'travellers' => 'nullable',
            'local_sponsors' => 'required',
            'international_sponsors' => 'required',
        ]);

        if ($validate->fails()) {
            return response()->json([
                'errors' => $validate->errors()->all(),
                'status' => false
            ], 400);
        }

        $rotary = RotaryForm::find($request->id)->update($validate->validated());

        return redirect()->route('simulation.form');
    }

    public function saveStep8(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'current_step' => 'required',
            'currency' => 'required',
            'exchange_rate' => 'nullable',
            'headings' => 'nullable',
            'budget_step8' => 'nullable',
        ]);

        if ($validate->fails()) {
            return response()->json([
                'errors' => $validate->errors()->all(),
                'status' => false
            ], 400);
        }

        $rotary = RotaryForm::find($request->id)->update($validate->validated());

        return redirect()->route('simulation.form');
    }

    public function saveStep9(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'current_step' => 'required',
            'sources' => 'nullable',
            'world_donation' => 'nullable',
            'total_contributions' => 'nullable',
            'total_financed' => 'nullable',
            'total_budget' => 'nullable',
        ]);

        if ($validate->fails()) {
            return response()->json([
                'errors' => $validate->errors()->all(),
                'status' => false
            ], 400);
        }

        $rotary = RotaryForm::find($request->id)->update($validate->validated());

        return redirect()->route('simulation.form');
    }

    public function saveStep10(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'current_step' => 'required',
            'necesities' => 'required',
            'necesities_process' => 'required',
            'participants1' => 'required',
            'participants2' => 'required',
            'coo_work' => 'required',
            'capacitation' => 'required',
            'determinate_necesities' => 'required',
            'incentives' => 'required',
            'supervisors_names' => 'required',
            'use_providers' => 'required',
            'use_tender' => 'required',
            'has_conflict_providers' => 'required',
            'equipment_included' => 'required',
            'equipment_maintenance' => 'required',
            'use_founds' => 'required',
            'completed_proyect' => 'required',
            'has_microcredit' => 'required',
            'has_local_founds' => 'required',
            'generate_income' => 'required',
        ]);

        if ($validate->fails()) {
            return response()->json([
                'errors' => $validate->errors()->all(),
                'status' => false
            ], 400);
        }

        $rotary = RotaryForm::find($request->id)->update($validate->validated());

        return redirect()->route('simulation.form');
    }

    public function saveStep11(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'current_step' => 'required',
        ]);

        if ($validate->fails()) {
            return response()->json([
                'errors' => $validate->errors()->all(),
                'status' => false
            ], 400);
        }

        $rotary = RotaryForm::find($request->id)->update($validate->validated());

        return redirect()->route('simulation.form');
    }

    public function saveStep12(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'current_step' => 'required',
        ]);

        if ($validate->fails()) {
            return response()->json([
                'errors' => $validate->errors()->all(),
                'status' => false
            ], 400);
        }

        $rotary = RotaryForm::find($request->id)->update($validate->validated());

        return redirect()->route('simulation.form');
    }
}
