<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Demande;
use App\Models\Employee;
use App\Models\Planning;
use App\Models\Formateur;
use App\Models\Formation;
use Illuminate\Http\Request;
use App\Notifications\Notifications;

class PlanningController extends Controller
{
    public function index()
    {
        $formations = Formation::has('demandes')->with('demandes')->get();

        $plannings = Planning::all();

        return view('admin.planning.planning', compact('formations', 'plannings'));
    }

    public function show($id)
    {
        $planning = Planning::findOrFail($id);

        $formations = Formation::has('demandes')
            ->with('demandes','formateur')
            ->where('formations.planning_id', $planning->id)
            ->get();

        return view('admin.planning.show', compact('formations','planning'));
    }

    public function afficher($id, $id2)
    {
        $planning = Planning::findOrFail($id);

        $formations = Formation::has('demandes')->with('demandes')
            ->where('planning_id', $planning->id)
            ->where('id', $id2)
            ->get();

        return view('admin.planning.afficher', compact('formations', 'planning'));
    }

    public function remplir($id, $id2)
    {
        $planning = Planning::findOrFail($id);

        $formations = Formation::has('demandes')->with('demandes')
            ->where('planning_id', $planning->id)
            ->where('id', $id2)
            ->findOrFail($id2);

        $formateurs = Formateur::all();

        return view('admin.planning.accepter', compact('formations', 'planning', 'formateurs'));
    }



    public function store(Request $request, int $id)
    {
        // Validate the input data
        $validatedData = $request->validate([
            'titre' => 'required',
            'duree' => 'required',
            'budget' => 'required',
            'formateur' => 'required',
            'date' => 'required',
        ], [
            'required' => 'Le champ :attribute est obligatoire.',
        ]);

        $formations = Formation::findOrFail($id);
        $formations->titre = $request->input('titre');
        $formations->duree = $request->input('duree');
        $formations->budget = $request->input('budget');
        if ($request->input('formateur') == "null") {
            $formations->formateur_id = null;
        } else {
            $formations->formateur_id = $request->input('formateur');
        }
        $formations->date = $request->input('date');
        $formations->save();

        $planning_en_attente = Planning::where('statut', '=', 'en attente')->first();
        if ($planning_en_attente) {
            $planning_en_attente->budget = Formation::join('plannings', 'plannings.id', '=', 'formations.planning_id')
                ->sum('formations.budget');
            $planning_en_attente->annee = date('Y');

            $planning_en_attente->save();
        } else {
            $planning_en_attente = new Planning();
            $planning_en_attente->budget = Formation::join('plannings', 'plannings.id', '=', 'formations.planning_id')
                ->sum('formations.budget');
            $planning_en_attente->statut = 'en attente';
            $planning_en_attente->annee = date('Y');

            $planning_en_attente->save();
        }

        return redirect()->route('planning')->with('success', 'La formation a été modifiée avec succès.');
    }

    public function envoyer($id)
    {
        $plannings = Planning::findOrFail($id);
        $plannings->statutAdmin = 'envoyer';
        $plannings->save();

        $dgs = User::where('role', '3')->get();
        foreach ($dgs as $dg) {
            $message = 'Le responsable des ressources humaines a envoyée le planning des formation.';
            $dg->notify(new Notifications($message));
        }

        return redirect()->route('planning')->with('success', 'planning envoyée avec succès!');
    }


    public function ModifierDemande($id, $id2, $id3)
    {
        $planning = Planning::findOrFail($id);

        $formations = Formation::findOrFail($id2);

        $demandes = Demande::findOrFail($id3);
        $employees = Employee::all();

        return view('admin.planning.demande.modifier', compact('formations', 'planning','demandes','employees'));
    }

    public function update(Request $request,$id ,$id2, string $id3)
    {
        $planning = Planning::findOrFail($id);

        $formations = Formation::has('demandes')->with('demandes')
            ->where('planning_id', $planning->id)
            ->where('id', $id2)
            ->get();

        $demandes = Demande::findOrFail($id3);

        $demandes->update($request->all());

        $demandes->employees()->sync($request->input('employees'));

        return redirect()->route('planning.show', ['id' => $planning->id])->with('success', 'Demande modifiée avec succès !');

    }

    public function AjouterFormation($id)
    {
        $planning = Planning::findOrFail($id);

        $employees = Employee::all();

        $formateurs = Formateur::all();

        return view('admin.planning.formation.ajouter', compact('planning','employees','formateurs'));
    }

    public function storeFormation(Request $request, int $id)
{
    $planning = Planning::findOrFail($id);

    // Validate the input data
    $validatedData = $request->validate([
        'titre' => 'required',
        'duree' => 'required',
        'budget' => 'required',
        'formateurIE' => 'required',
        'domaine' => 'required',
        'themes' => 'required',
        'objectifs' => 'required',
        'formateur' => 'required',
        'priorite' => 'required',
        'employees' => 'required',
        'date' => 'required',
    ], [
        'required' => 'Le champ :attribute est obligatoire.',
    ]);

    $demande = new Demande();
    $demande->domaine = $request->input('domaine');
    $demande->themes = $request->input('themes');
    $demande->objectifs = $request->input('objectifs');
    $demande->formateur = $request->input('formateurIE');
    $demande->priorite = $request->input('priorite');
    $demande->date = now();
    $demande->statut = 'accepter';
    $demande->user_id = auth()->user()->id;
    $demande->save();
    $demande->employees()->attach($request->input('employees'));

    $formations = new Formation();
    $formations->titre = $request->input('titre');
    $formations->duree = $request->input('duree');
    $formations->budget = $request->input('budget');
    if ($request->input('formateur') == "null") {
        $formations->formateur_id = null;
    } else {
        $formations->formateur_id = $request->input('formateur');
    }
    $formations->date = $request->input('date');
    $formations->save();
    $demande->formations()->attach($formations);

    $planning_en_attente = Planning::where('statut', '=', 'en attente')->first();

    if ($planning_en_attente) {
        $planning_en_attente->annee = date('Y');
        $planning_en_attente->save();
        $formations->planning_id = $planning_en_attente->id;
        $formations->save();
        $planning_en_attente->budget = Formation::join('plannings', 'plannings.id', '=', 'formations.planning_id')
            ->where('plannings.id', $planning_en_attente->id)
            ->sum('formations.budget');
        $planning_en_attente->save();
    } else {
        $planning_en_attente = new Planning();
        $planning_en_attente->statut = 'en attente';
        $planning_en_attente->annee = date('Y');
        $planning_en_attente->save();
        $formations->planning_id = $planning_en_attente->id;
        $formations->save();
        $planning_en_attente->budget = Formation::join('plannings', 'plannings.id', '=', 'formations.planning_id')
            ->where('plannings.id', $planning_en_attente->id)
            ->sum('formations.budget');
        $planning_en_attente->save();
    }

    return redirect()->route('planning.show', ['id' => $planning->id])->with('success', 'La formation a été ajoutée avec succès.');
}

}
