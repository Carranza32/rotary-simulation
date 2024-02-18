<?php

namespace App\Http\Controllers;

use App\Models\RotaryForm;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Inertia\Inertia;

class RotaryReportController extends Controller
{
    public function index(Request $request)
    {
        $query = RotaryForm::orderBy('project_name');

        if ($request->has('search')) {
            $query->where('column_name', 'like', '%' . $request->search . '%');
        }

        if ($request->has('trashed')) {
            $query->where('trashed_column', $request->trashed);
        }

        $reports = $query->paginate()->withQueryString();

        return Inertia::render('RotaryReport', [
            'filters' => $request->only('search', 'trashed'),
            'reports' => $reports,
        ]);
    }

    public function show(RotaryForm $form)
    {
        return Inertia::render('Report/Show', [
            'form' => $form
        ]);
    }
}
