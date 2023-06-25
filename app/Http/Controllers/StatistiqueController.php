<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Evaluation;
use App\Models\EvaluationFroid;
use Carbon\Carbon;
use App\Models\Planning;
use App\Models\Presence;
use App\Models\Formation;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StatistiqueController extends Controller
{
    public function index()
    {
        // Récupérer tous les plannings avec le comptage des formations associées
        $plannings = Planning::withCount('formations')->get();

        // Compter le nombre total de formations
        $nbFormations = Formation::count();

        // Récupérer toutes les présences
        $presences = Presence::all();

        // Récupérer tous les utilisateurs avec un rôle de 2 (rôle spécifique)
        $users = User::where('role', 2)->get();

        // Récupérer tous les employés
        $employees = Employee::all();

        // Récupérer l'année en cours
        $annee = now()->year; // Remplacez 2023 par l'année souhaitée

        // Récupérer toutes les évaluations créées cette année
        $evaluations = Evaluation::whereYear('created_at', $annee)->get();

        // Récupérer toutes les évaluations froides créées cette année
        $evaluations_froids = EvaluationFroid::whereYear('created_at', $annee)->get();

        // Retourner la vue 'admin.statistiques.index' en passant les données récupérées
        return view('admin.statistiques.index', compact(
            'users',
            'evaluations_froids',
            'employees',
            'evaluations',
            'presences',
            'plannings',
            'nbFormations'
        ));
    }

}
