<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Planning;
use App\Models\Formation;
use Illuminate\Http\Request;
use App\Notifications\Notifications;
use App\Notifications\RefuserNotificatio;

class ValiderController extends Controller
{
    public function index()
    {
        $formations = Formation::with('demandes')->get();
        $plannings = Planning::all();

        return view('DG.valider.index', compact('formations','plannings'));
    }
    public function show($id)
{
    $plannings = Planning::findOrFail($id);

    $formations = Formation::has('demandes')->with('demandes')->where('planning_id', $plannings->id)->get();

    return view('dg.valider.show', compact('formations', 'plannings'));
}
    public function valider()
    {
        $drhs = User::where('role', 1)->get();
        foreach ($drhs as $drh) {
        $message='Le directeur général a validé le planning des formations.';
        $drh->notify(new Notifications ($message));
        }

        // Mise à jour du statut à valider
        Planning::where('statut', 'en attente')->update(['statut' => 'valider']);

        return redirect()->route('valider')->with('success', 'Le planning des formations a été validé avec succès !');
    }
    public function refuser(Request $request)
    {
        $drhs = User::where('role', 1)->get();
        $budget = $request->input('budget');
        foreach ($drhs as $drh) {
        $message='Le directeur général a refusé le planning des formations.';
        if (!empty($budget)) {
            $message .= ' Le budget proposé était de ' . $budget . '.'; // Ajoute le budget au message s'il est renseigné
        }
        $drh->notify(new Notifications ($message));
        }

        return redirect()->route('valider')->with('success', 'Le planning des formations a été refusé');
    }
}
