<?php

namespace App\Http\Controllers;

use App\Models\Cabinet;
use App\Models\Planning;
use App\Models\Formation;
use Illuminate\Http\Request;
use App\Models\CahierDeCharge;
use App\Mail\CahierDeChargeMail;
use Illuminate\Support\Facades\Mail;

class CahierController extends Controller
{
    public function index($id)
    {
        $plannings = Planning::findOrFail($id);

        $formations = Formation::has('demandes')->with('demandes')->with('cahierDeCharge')->where('planning_id', $plannings->id)
            ->get();

        return view('admin.cahier.cahiercharge', compact('formations', 'plannings'));
    }

    public function planning()
    {
        $formations = Formation::with('demandes')->get();
        $plannings = Planning::all();

        return view('admin.cahier.plannings', compact('plannings', 'formations'));
    }

    public function create($id)
    {
        $cabinets = Cabinet::all();
        $plannings = Planning::where('statut', 'en attente')->first();

        $formations = Formation::findOrFail($id);

        return view('admin.cahier.createCahier', compact('cabinets', 'formations', 'plannings'));
    }

    public function store(Request $request, $id)
    {
        $validatedData = $request->validate([
            'domaine' => 'required',
            'themes' => 'required',
            'recommandations' => 'required',
            'mode' => 'required',
            'duree' => 'required',
            'date' => 'required',
            'personnel' => 'required',
            'profil' => 'required',
            'cabinet' => 'required',
        ], [
            'required' => 'Le champ :attribute est obligatoire.',
        ]);



        $cahierDeCharge = CahierDeCharge::create($validatedData);

        $formations = Formation::findOrFail($id);
        $formations->cahier_de_charge_id = $cahierDeCharge->id;
        $formations->save();

        $cabinets = Cabinet::whereIn('id', $request->input('cabinet'))->get();

        foreach ($cabinets as $cabinet) {
            $cahierDeCharge->cabinets()->attach($cabinet);

            // Envoyer l'email à chaque cabinet
            Mail::to($cabinet->email)->send(new CahierDeChargeMail($cahierDeCharge));
        }

        return redirect()->route('planningCahier')->with('success', 'Le cahier de charge a été envoyé avec succès.');
    }
}
