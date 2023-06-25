<?php

namespace App\Http\Controllers;

use App\Models\Demande;
use App\Models\Planning;
use App\Models\Formation;
use App\Models\Evaluation;
use App\Models\EvaluationFroid;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EvaluationAdminController extends Controller
{
    public function index()
    {
        $formations = Formation::all();
        $plannings = Planning::all();

        return view('admin.evaluation.index', compact('formations','plannings'));
    }

    public function show($id)
    {
        $planning = Planning::findOrFail($id);

        $formations = Formation::has('demandes')->with('demandes')->where('planning_id', $planning->id)
        ->get();

        return view('admin.evaluation.show', compact('planning','formations'));
    }

    public function user($id)
    {
        // Récupère une formation avec les demandes associées en utilisant l'ID donné
        $formations = Formation::with('demandes')->find($id);

        // Récupère les demandes de formation avec les utilisateurs associés
        $formations_demandes = $formations->demandes()->with('user')->get();

        // Retourne une vue 'admin.evaluation.user' en passant les formations et les demandes à la vue
        return view('admin.evaluation.user', compact('formations','formations_demandes'));
    }


    public function evaldirecteur($id, $id2)
    {
        $formations = Formation::with('demandes')->find($id);

        $evaluations = EvaluationFroid::where('user_id', $id2)->where('formation_id', $id)->get();

        if ($evaluations->isEmpty()) {
            $message = "Aucune évaluation trouvée pour cette utilisateur";
            return view('admin.evaluation.evaldirecteur', compact('formations', 'evaluations', 'message'));
        }

        return view('admin.evaluation.evaldirecteur', compact('formations', 'evaluations'));
    }


    public function eval($id,$id2)
    {
        $formations = Formation::with('demandes')->find($id);

        $evaluations = Evaluation::where('statut', $id2)->where('formation_id', $id)->get();

        if ($evaluations->isEmpty()) {
            $message = "Aucune évaluation trouvée pour cette utilisateur";
            return view('admin.evaluation.eval', compact('formations', 'evaluations', 'message'));
        }

        return view('admin.evaluation.eval', compact('formations','evaluations'));
    }
}
