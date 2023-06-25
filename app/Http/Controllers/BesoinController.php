<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Demande;
use App\Models\Employee;
use App\Models\Planning;
use App\Models\Formation;
use Illuminate\Http\Request;
use App\Notifications\Notifications;

class BesoinController extends Controller
{
    public function index()
    {
        $demandes = Demande::with('user')
            ->where('statut', null)
            ->whereDoesntHave('formations')
            ->get();

        $demandesRefuser = Demande::with('user')
            ->where('statut', 'refuser')
            ->whereDoesntHave('formations')
            ->get();

        $employees = Employee::all();

        return view('admin.expression.besoin', compact('demandes', 'employees', 'demandesRefuser'));
    }

    public function show(string $id)
    {
        $demandes = Demande::findOrFail($id);

        return view('admin.expression.show', compact('demandes'));
    }

    public function accepter(Request $request)
    {
        // Retrieve the selected demande IDs
        $demandesSelectionnees = $request->input('demandes', []);

        if (empty($demandesSelectionnees)) {
            return redirect()->route('besoin')->with('success', 'Aucune demande sélectionnée!');
        }

        $formation = Formation::create([
            'titre' => '',
        ]);

        $formation->demandes()->attach($demandesSelectionnees);

        // Envoyer les notifications aux utilisateurs correspondants
        $demandes = Demande::whereIn('id', $demandesSelectionnees)->with('user')->get();
        foreach ($demandes as $demande) {
            $titreDemande = $demande->themes;
            $demande->statut = 'accepter';
            $demande->save();
            $message = "Le responsable des ressources humaines a accepté votre demande de formation : $titreDemande";
            $demande->user->notify(new Notifications($message));
        }




        $planning_en_attente = Planning::where('statut', '=', 'en attente')->first();
        if ($planning_en_attente) {
            $planning_en_attente->budget = Formation::join('plannings', 'plannings.id', '=', 'formations.planning_id')
                ->where('plannings.id', $planning_en_attente->id)
                ->sum('formations.budget');
            $planning_en_attente->annee = date('Y');

            $planning_en_attente->save();

            $formation->planning_id = $planning_en_attente->id;
        } else {
            $planning_en_attente = new Planning();
            $planning_en_attente->budget = Formation::join('plannings', 'plannings.id', '=', 'formations.planning_id')
                ->sum('formations.budget');
            $planning_en_attente->statut = 'en attente';
            $planning_en_attente->annee = date('Y');

            $planning_en_attente->save();
            $formation->planning_id = $planning_en_attente->id;
        }

        $formation->save();


        return redirect()->route('besoin')->with('success', 'Demandes acceptées avec succès !');
    }

    public function refuser(string $id, string $id2)
    {
        $user = User::find($id);
        $demandes = Demande::find($id2);
        $demandes->statut = 'refuser';
        $demandes->save();

        $message = 'Le responsable des ressources humaines a refusé votre demande de formation.';
        $user->notify(new Notifications($message));
        return redirect()->route('besoin')->with('success', 'Demande refusée avec succès.');
    }

    public function refacc(string $id, string $id2)
    {
        $user = User::find($id);
        $demandes = Demande::find($id2);
        $demandes->statut = null;
        $demandes->save();

        $message = 'Le responsable des ressources humaines a réexaminé votre demande de formation.';
        $user->notify(new Notifications($message));
        return redirect()->route('besoin')->with('success', 'La demande a été réexaminée avec succès.');
    }
}
