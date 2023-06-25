<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Planning;
use App\Models\Presence;
use App\Models\Formation;
use Illuminate\Http\Request;

class PresenceController extends Controller
{
    public function index()
    {
        $formations = Formation::with('demandes')->get();
        $plannings = Planning::all();

        return view('admin.presence.plannings', compact('plannings', 'formations'));
    }
    public function show($id)
    {
        $planning = Planning::findOrFail($id);

        $formations = Formation::has('demandes')->with('demandes')->where('planning_id', $planning->id)
            ->get();

        return view('admin.presence.presence', compact('planning', 'formations'));
    }

    public function store(Request $request, int $id)
    {
        $validatedData = $request->validate([
            'dates' => 'required',
            'etat.*' => 'required|in:present,absent,remplace',
        ]);

        $formations = Formation::findOrFail($id);

        foreach ($validatedData['etat'] as $employeeId => $presence) {
            $presenceModel = new Presence;
            $presenceModel->formation_id = $id;
            $presenceModel->employee_id = $employeeId;
            $presenceModel->date = date('Y-m-d', strtotime($request->input('dates')));
            $presenceModel->presence = $presence;
            $presenceModel->note = '';
            $presenceModel->save();
        }

        return redirect()->route('dates', ['id' => $id])->with('success', 'Les présences ont été enregistrées avec succès.');
    }

    public function storeNote(Request $request, int $id)
    {
        $validatedData = $request->validate([
            'dates' => 'required',
            'etat.*' => 'required|in:present,absent,remplacer',
            'note' => 'required',
        ]);

        $formations = Formation::findOrFail($id);

        foreach ($validatedData['etat'] as $employeeId => $presence) {
            $presenceModel = new Presence;
            $presenceModel->formation_id = $id;
            $presenceModel->employee_id = $employeeId;
            $presenceModel->date = date('Y-m-d', strtotime($request->input('dates')));
            $presenceModel->presence = $presence;
            $presenceModel->note = $request->input('note')[$id][$employeeId];
            $presenceModel->save();
        }

        return redirect()->route('dates', ['id' => $id])->with('success', 'Les notes ont été enregistrées avec succès.');
    }






    public function date($id)
    {
        // Récupérer la formation avec ses demandes en utilisant l'identifiant ($id)
        $formations = Formation::with('demandes')->findOrFail($id);

        // Récupérer toutes les présences globales liées à la formation spécifiée
        $presencesglobal = Presence::where('formation_id', $formations->id)->get();

        // Récupérer la durée de la formation et la date de début
        $duree = $formations->duree;
        $premiereDate = $formations->date;
        $dates = [];

        // Générer les dates pour la durée de la formation en incrémentant la date de début
        for ($i = 0; $i < $duree; $i++) {
            $date = date('Y-m-d', strtotime($premiereDate . ' + ' . $i . ' days'));
            $dates[] = $date;
        }

        // Récupérer toutes les dates de présence existantes pour la formation spécifiée
        $presences = Presence::where('formation_id', $formations->id)->pluck('date')->all();

        // Filtrer les dates générées pour ne pas inclure celles qui existent déjà dans les présences
        $availableDates = array_diff($dates, $presences);

        // Retourner la vue 'admin.presence.date1' avec les données des dates disponibles, de la formation et des présences globales
        return view('admin.presence.date1', compact('availableDates', 'formations', 'presencesglobal'));
    }



    public function dates($id)
    {
        // Récupérer la formation avec ses demandes en utilisant l'identifiant ($id)
        $formations = Formation::with('demandes')->find($id);

        // Récupérer toutes les présences globales liées à la formation spécifiée
        $presencesglobal = Presence::where('formation_id', $formations->id)->get();

        // Récupérer la durée de la formation et la date de début
        $duree = $formations->duree;
        $premiereDate = $formations->date;
        $dates = [];

        // Générer les dates pour la durée de la formation en incrémentant la date de début
        for ($i = 0; $i < $duree; $i++) {
            $date = date('Y-m-d', strtotime($premiereDate . ' + ' . $i . ' days'));
            $dates[] = $date;
        }

        // Retourner la vue 'admin.presence.dates' avec les données de la formation, des présences, des présences globales et des dates générées
        return view('admin.presence.dates', compact('formations', 'presencesglobal', 'dates'));
    }

}
