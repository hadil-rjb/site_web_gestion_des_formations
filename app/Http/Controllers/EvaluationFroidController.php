<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Formation;
use App\Models\Evaluation;
use Illuminate\Http\Request;
use App\Models\EvaluationFroid;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class EvaluationFroidController extends Controller
{
    public function index()
    {
        // Récupère l'utilisateur connecté
        $auth = Auth::user();

        $dateFin = now()->addMonths(6);

        // Récupère les formations mises à jour
        $formations = Formation::whereHas('demandes', function ($query) use ($auth) {
            $query->where('user_id', $auth->id);
        })
            ->whereDoesntHave('evaluation_froids')
            ->get();


        $formations2 = Formation::whereHas('demandes', function ($query) use ($auth) {
            $query->where('user_id', $auth->id);
        })
            ->whereHas('evaluation_froids')
            ->get();

        return view('directeur.evaluerfroid.index', compact('formations', 'formations2'));
    }


    public function show($id)
    {
        // Récupère l'utilisateur connecté
        $auth = Auth::user();

        // Récupère les formations pour l'employé dont le matricule correspond
        $formations = Formation::whereHas('demandes', function ($query) use ($auth) {
            $query->where('user_id', $auth->id);
        })->findOrFail($id);

        return view('directeur.evaluerfroid.evaluer', compact('formations'));
    }

    public function store(Request $request, $id, $id2)
    {
        // Valider les données d'entrée
        $validatedData = $request->validate([
            'reponse' => 'required',
            'question1' => 'required',
            'question2' => 'required',
            'question3' => 'required',
            'question4' => 'required',
            'question5' => 'required',
            'reponse2' => 'required',
            'reponse3' => 'required',
        ], [
            'required' => 'Le champ :attribute est obligatoire.',
        ]);

        // Créer un nouvel objet pour stocker les données soumises
        $evaluation = new EvaluationFroid();

        // Affecter les valeurs soumises à chaque propriété de l'objet
        $evaluation->resultat = $validatedData['reponse'];
        $evaluation->qualite = $validatedData['question1'];
        $evaluation->competences = $validatedData['question2'];
        $evaluation->productivite = $validatedData['question3'];
        $evaluation->motiviation = $validatedData['question4'];
        $evaluation->esprit = $validatedData['question5'];
        $evaluation->systeme = $validatedData['reponse2'];
        $evaluation->suggerer = $validatedData['reponse3'];
        $evaluation->user_id = $id2;
        $evaluation->formation_id = $id;

        // Enregistrer l'objet dans la base de données
        $evaluation->save();

        return redirect()->route('evaluationFroid')->with('success', 'L\'évaluation a été enregistrée avec succès.');
    }

    public function showApres($id)
    {

        // Récupère l'utilisateur connecté
        $auth = Auth::user();

        // Récupère les formations pour l'employé dont le matricule correspond
        $formations = Formation::whereHas('demandes', function ($query) use ($auth) {
            $query->where('user_id', $auth->id);
        })->findOrFail($id);

        $evaluations = EvaluationFroid::where('formation_id', $id)
            ->get();


        return view('directeur.evaluerfroid.show', compact('formations', 'evaluations'));
    }
}
