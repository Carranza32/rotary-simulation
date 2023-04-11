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
        ],
        [
            'project_name' => 'Nombre del proyecto es requerido',
            'type' => 'Tipo de proyecto es requerido',
            'contacts' => 'Contactos es requerido',
        ]
        );

        if ($validate->fails()) {
            return response()->json([
                'errors' => $validate->errors()->all(),
                'status' => false
            ], 400);
        }

        $rotary = RotaryForm::updateOrCreate([
            'id' => $request?->id
        ],[
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
        ],
        [
            'local_members' => 'Miembros locales es requerido',
            'international_members' => 'Miembros internacionales es requerido',
            'members_conflict' => 'Conflicto de interes es requerido',
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
        ],
        [
            'objectives' => 'Objetivos es requerido',
        ]
        );

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
        ],
        [
            'interest_area' => 'Area de interes es requerido',
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
            'measures52' => 'nullable',
            'measures53' => 'nullable',
            'measures54' => 'nullable',
            'measures55' => 'nullable',
            'measures56' => 'nullable',
            'measures57' => 'nullable',
            'monitoring_51' => 'nullable',
            'monitoring_52' => 'nullable',
            'monitoring_53' => 'nullable',
            'monitoring_54' => 'nullable',
            'monitoring_55' => 'nullable',
            'monitoring_56' => 'nullable',
            'monitoring_57' => 'nullable',
            'evaluation' => 'required',
        ],
        [
            'interest_area_goals' => 'Objetivos de área de interés es requerido',
            'measures' => 'Medidas es requerido',
            'evaluation' => 'Evaluación es requerido',
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
        ],
        [
            'city' => 'Ciudad es requerido',
            'state' => 'Estado es requerido',
            'country' => 'País es requerido',
            'start_date' => 'Fecha de inicio es requerido',
            'end_date' => 'Fecha de finalización es requerido',
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
            'members' => 'nullable',
            'travellers' => 'nullable',
            'local_sponsors' => 'required',
            'international_sponsors' => 'required',
            'has_interes_conflict' => 'required',
            'colaboration_org' => 'required',
        ],
        [
            'members' => 'Miembros es requerido',
            'local_sponsors' => 'Patrocinadores locales es requerido',
            'international_sponsors' => 'Patrocinadores internacionales es requerido',
            'has_interes_conflict' => 'Conflicto de interes es requerido',
            'colaboration_org' => 'El por qué decidiste colaborar con esta organización y qué papel desempeñará es requerido',
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
        ],
        [
            'currency' => 'Moneda es requerido',
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
            'activities' => 'nullable',
        ],
        [
            'necesities' => 'Necesidades de la comunidad es requerido',
            'necesities_process' => 'Proceso de necesidades es requerido',
            'participants1' => 'Integrantes de la comunidad beneficiaria es requerido',
            'participants2' => 'Integrantes de la comunidad local es requerido',
            'coo_work' => 'Coordinación con otras iniciativas de trabajo es requerido',
            'capacitation' => 'Programas de capacitación es requerido',
            'determinate_necesities' => 'Determinación de necesidades es requerido',
            'incentives' => 'Incentivos es requerido',
            'supervisors_names' => 'Nombres de supervisores es requerido',
            'use_providers' => 'Uso de proveedores es requerido',
            'use_tender' => 'Uso de licitaciones es requerido',
            'has_conflict_providers' => 'Conflictos con proveedores es requerido',
            'equipment_included' => 'Equipo incluido es requerido',
            'equipment_maintenance' => 'Mantenimiento de equipo es requerido',
            'use_founds' => 'Uso de fondos es requerido',
            'completed_proyect' => 'Proyecto completado es requerido',
            'has_microcredit' => 'Microcrédito es requerido',
            'has_local_founds' => 'Fondos locales es requerido',
            'generate_income' => 'Generación de ingresos es requerido',
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

    public function saveStep11Documents(Request $request)
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

        $data = $validate->validated();

        $form = RotaryForm::find($request->id);
        $savedFiles = json_decode($form->files);

        if ($request->hasFile('files')) {
            $uploadedFiles = $request->file('files');

            foreach ($uploadedFiles as $uploadedFile) {
                $path = $uploadedFile->store('public/documents');
                $savedFiles[] = $path;
            }
        }

        $form->files = $savedFiles;
        $form->save();

        return redirect()->route('simulation.form');
    }

    function saveStep11DeleteDocuments(Request $request){
        $form = RotaryForm::find($request->id);
        $savedFiles = json_decode($form->files);
        $deleteFiles = $request->selected;
        $key = null;

        foreach ($deleteFiles as $deleteFile) {
            $key = array_search($deleteFile, $savedFiles);
            unset($savedFiles[$key]);
        }

        $form->files = $savedFiles;
        $form->save();

        return response()->json([
            'data' => $form->files,
            'status' => true
        ], 200);
    }

    function saveStep11DocumentsUploaded(Request $request){
        $form = RotaryForm::find($request->id);

        return response()->json([
            'data' => json_decode($form->files),
            'status' => true
        ], 200);
    }

    public function saveStep12(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'current_step' => 'required',
            'primary_contact_authorization' => 'nullable',
            'district_committee_authorization' => 'nullable',
            'fdd_authorization' => 'nullable',
            'legal_agreement' => 'nullable',
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
