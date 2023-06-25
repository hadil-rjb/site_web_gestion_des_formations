<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Demande;
use App\Models\Employee;
use App\Models\Planning;
use App\Models\Formation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $role = $user->role ?? null;

        switch ($role) {
            case '1': //admin


                $plannings = Planning::orderBy('annee', 'DESC')->get();

                $annees = $plannings->pluck('annee')->unique();
                $demandes = Demande::all();

                $formationsAcc = Demande::where('statut', 'accepter')->get();
                $formationAtt = Demande::where('statut', null)->get();
                $formations = Formation::with('demandes')->get();

                $attentes = User::where('role', 0)->get();
                $directeurs = User::where('role', 2)->get();
                $employees = User::where('role', 4)->get();


                $Useremployees = Employee::all();
                $total_directeurs = 20;
                $total_employees = count($Useremployees);

                return view('admin.dashboard', compact(
                    'directeurs',
                    'employees',
                    'demandes',
                    'plannings',
                    'attentes',
                    'formations',
                    'total_employees',
                    'total_directeurs',
                    'annees',
                    'formationAtt',
                    'formationsAcc'
                ));

            case '2': //directeur
                $demandes = Demande::where('user_id', $user->id)->get();

                $formation_demandes = Demande::where('user_id', $user->id)->where('statut', 'accepter')->get();

                $formation_ref = Demande::where('user_id', $user->id)->where('statut', 'refuser')->get();

                return view('directeur.dashboard', compact('demandes', 'formation_demandes', 'formation_ref'));

            case '3': //directeur general
                return view('DG.dashboard');

            case '4': //employee
                // Récupère le matricule de l'utilisateur connecté
                $authMatricule = auth()->user()->matricule;

                $employeeId = Employee::where('matricule', $authMatricule)->value('id');

                $formations = Formation::whereHas('demandes.employees', function ($query) use ($authMatricule) {
                    $query->where('matricule', $authMatricule);
                })->whereHas('presences', function ($query) use ($employeeId) {
                    $query->where('presence', 'present')
                        ->where('employee_id', $employeeId)
                        ->groupBy('formation_id')
                        ->havingRaw('COUNT(*) >= 1');
                })
                    ->get();

                return view('employee.dashboard', compact('formations'));

            default:
                return view('attend');
        }
    }
}
