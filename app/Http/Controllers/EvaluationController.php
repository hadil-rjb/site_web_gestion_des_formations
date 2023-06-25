<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Formation;
use App\Models\Evaluation;
use Illuminate\Http\Request;

class EvaluationController extends Controller
{
    public function index()
    {
        // Récupère le matricule de l'utilisateur connecté
        $authMatricule = auth()->user()->matricule;

        // Récupère l'employé dont le matricule correspond à celui de l'utilisateur connecté
        $employee = Employee::where('matricule', $authMatricule)->first();


        $employeeId = Employee::where('matricule', $authMatricule)->value('id');

        $formations = Formation::whereHas('demandes.employees', function ($query) use ($authMatricule) {
            $query->where('matricule', $authMatricule);
        })
            ->whereHas('presences', function ($query) use ($employeeId) {
                $query->where('presence', 'present')
                    ->where('employee_id', $employeeId)
                    ->groupBy('formation_id')
                    ->havingRaw('COUNT(*) >= 1');
            })
            ->whereDoesntHave('evaluations')
            ->get();



        $formations2 = Formation::whereHas('demandes.employees', function ($query) use ($authMatricule) {
            $query->where('matricule', $authMatricule);
        })
            ->whereHas('presences', function ($query) use ($employeeId) {
                $query->where('presence', 'present')
                    ->where('employee_id', $employeeId)
                    ->groupBy('formation_id')
                    ->havingRaw('COUNT(*) >= 1');
            })
            ->whereHas('evaluations')
            ->get();

        return view('employee.evaluer.index', compact('formations', 'formations2', 'employee'));
    }

    public function show($id, $id2)
    {
        // Récupère le matricule de l'utilisateur connecté
        $authMatricule = auth()->user()->matricule;

        // Récupère l'employé dont le matricule correspond à celui de l'utilisateur connecté
        $employee = Employee::where('matricule', $authMatricule)->first();

        // Récupère les formations pour l'employé dont le matricule correspond
        $formations = Formation::whereHas('demandes.employees', function ($query) use ($authMatricule) {
            $query->where('matricule', auth()->user()->matricule);
        })->findOrFail($id);

        return view('employee.evaluer.evaluer', compact('formations', 'employee'));
    }

    public function store(Request $request, $id, $id2)
    {
        // Valider les données d'entrée
        $validatedData = $request->validate([
            'rating1' => 'required', // Ajout de la règle "required" pour la colonne rating1
            'observation1' => 'required',
            'rating2' => 'required',
            'observation2' => 'required',
            'rating3' => 'required',
            'observation3' => 'required',
            'rating4' => 'required',
            'observation4' => 'required',
            'rating5' => 'required',
            'observation5' => 'required',
            'rating6' => 'required',
            'observation6' => 'required',
            'rating7' => 'required',
            'observation7' => 'required',
            'rating8' => 'required',
            'observation8' => 'required',
            'reponse' => 'required',
            'reponse2' => 'required',
            'reponse3' => 'required',
        ], [
            'required' => 'Le champ :attribute est obligatoire.',
        ]);

        // Créer un nouvel objet pour stocker les données soumises
        $evaluation = new Evaluation();

        // Affecter les valeurs soumises à chaque propriété de l'objet
        $evaluation->rating1 = $request->input('rating1'); // Correction de l'erreur de nom de champ
        $evaluation->observation1 = $request->input('observation1');
        $evaluation->rating2 = $request->input('rating2');
        $evaluation->observation2 = $request->input('observation2');
        $evaluation->rating3 = $request->input('rating3');
        $evaluation->observation3 = $request->input('observation3');
        $evaluation->rating4 = $request->input('rating4');
        $evaluation->observation4 = $request->input('observation4');
        $evaluation->rating5 = $request->input('rating5');
        $evaluation->observation5 = $request->input('observation5');
        $evaluation->rating6 = $request->input('rating6');
        $evaluation->observation6 = $request->input('observation6');
        $evaluation->rating7 = $request->input('rating7');
        $evaluation->observation7 = $request->input('observation7');
        $evaluation->rating8 = $request->input('rating8');
        $evaluation->observation8 = $request->input('observation8');
        $evaluation->reponse = $request->input('reponse');
        $evaluation->reponse2 = $request->input('reponse2');
        $evaluation->reponse3 = $request->input('reponse3');
        $evaluation->statut = $id2;
        $evaluation->formation_id = $id;

        // Enregistrer l'objet dans la base de données
        $evaluation->save();

        return redirect()->route('evaluation')->with('success', 'L\'évaluation a été enregistrée avec succès.');
    }

    public function showApres($id)
    {
        // Récupère le matricule de l'utilisateur connecté
        $authMatricule = auth()->user()->matricule;
        $twoDaysAgo = now()->subDays(2);
        // Récupère les formations pour l'employé dont le matricule correspond

        $formations = Formation::whereHas('demandes.employees', function ($query) use ($authMatricule) {
            $query->where('matricule', $authMatricule);
        })
            ->findOrFail($id);

        $evaluations = Evaluation::where('formation_id', $id)
            ->get();

        return view('employee.evaluer.show', compact('formations', 'evaluations'));
    }
}
