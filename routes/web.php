<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\BesoinController;
use App\Http\Controllers\CahierController;
use App\Http\Controllers\CabinetController;
use App\Http\Controllers\DemandeController;
use App\Http\Controllers\ValiderController;
use App\Http\Controllers\PlanningController;
use App\Http\Controllers\PresenceController;
use App\Http\Controllers\FormateurController;
use App\Http\Controllers\EvaluationController;
use App\Http\Controllers\StatistiqueController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\EvaluationAdminController;
use App\Http\Controllers\EvaluationFroidController;

//pour tous
// Routes publiques accessibles à tous les utilisateurs
Route::get('/', function () {
    return view('welcome');
});

//pour tous
// Routes sécurisées nécessitant une authentification
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    // Redirige la page '/redirects' vers la page '/dashboard'
    Route::redirect('/redirects', '/dashboard')->name('dashboard');

    // Page,, principale du tableau de bord
    Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard');

    Route::get('/mark-all-as-read', [NotificationController::class, 'markAllAsRead'])->name('mark-all-as-read');
});


//role 1 pour admin
// Routes sécurisées nécessitant une authentification
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
    'role:1'
])->group(function () {


    // Routes pour la gestion des rôles d'utilisateur
    Route::get('/roles', [RoleController::class, 'index'])->name('roles');
    Route::post('/roles/ajout/{id}', [roleController::class, 'ajout'])->name('roles.ajout');
    Route::resource('/admin', RoleController::class)->parameters(['admin' => 'id']); // Génère les routes CRUD pour les rôles d'administration
    Route::delete('/admin/{id}', [RoleController::class, 'destroy'])->name('admin.destroy'); // Route pour supprimer un rôle d'administration

    // Routes pour la gestion du planning
    Route::get('/planning', [PlanningController::class, 'index'])->name('planning');
    Route::get('/planning/{id}', [PlanningController::class, 'show'])->name('planning.show');
    Route::get('/planning/{id}/afficher/{id2}', [PlanningController::class, 'afficher'])->name('planning.afficher');
    Route::get('/planning/{id}/remplir/{id2}', [PlanningController::class, 'remplir'])->name('planning.remplir');
    Route::post('/planning/{id}/valide', [PlanningController::class, 'store'])->name('planning.store');
    Route::delete('/planning/{id}/supprimer', [PlanningController::class, 'supprimer'])->name('planning.supprimer');

    // Routes pour la gestion du envoyer le planning
    Route::get('/planningEnvoyer/{id}', [PlanningController::class, 'envoyer'])->name('planning.envoyer');

    // Routes pour la gestion du modifier la demande
    Route::get('/planning/{id}/afficher/{id2}/modifier/{id3}', [PlanningController::class, 'ModifierDemande'])->name('demande.modifier');
    Route::put('/planning/{id}/afficher/{id2}/modifier/{id3}/update', [PlanningController::class, 'update'])->name('demande.update');

    // Routes pour la gestion du ajouter formation
    Route::get('/planning/{id}/ajouter', [PlanningController::class, 'AjouterFormation'])->name('planning.AjouterFormation');
    Route::post('/planning/{id}/ajouter/enregistrer', [PlanningController::class, 'storeFormation'])->name('formation.ajouter');

    // Routes pour la gestion du besoin
    Route::get('/expression', [BesoinController::class, 'index'])->name('besoin');
    Route::post('/expression/accepter', [BesoinController::class, 'accepter'])->name('planning.accepter');
    Route::get('/expression/{id}/valide', [BesoinController::class, 'show'])->name('besoin.show');
    Route::get('/expression/{id}/refuser/{id2}', [BesoinController::class, 'refuser'])->name('besoin.refuser');
    Route::get('/expression/{id}/refacc/{id2}', [BesoinController::class, 'refacc'])->name('besoin.refacc');

    // Routes pour la gestion du presence
    Route::get('/presence', [PresenceController::class, 'index'])->name('presence');
    Route::get('/presence/{id}', [PresenceController::class, 'show'])->name('presence.show');
    Route::get('/date/{id}', [PresenceController::class, 'date'])->name('date');
    Route::get('/dates/{id}', [PresenceController::class, 'dates'])->name('dates');
    Route::post('/dates/date1/{id}', [PresenceController::class, 'store'])->name('date.store');
    Route::post('/dates/note/{id}', [PresenceController::class, 'storeNote'])->name('date.storeNote');

    // Routes pour la gestion du cahier des charges
    Route::get('/cahier', [CahierController::class, 'planning'])->name('planningCahier');
    Route::get('/cahier/{id}', [CahierController::class, 'index'])->name('Cahieraffiche');
    Route::get('/cahier/create/{id}', [CahierController::class, 'create'])->name('cahier-de-charge.create');
    Route::post('/cahier/{id}', [CahierController::class, 'store'])->name('cahier-de-charge.store');

    // Routes pour la gestion des cabinets
    Route::get('/cabinet', [CabinetController::class, 'index'])->name('cabinet');
    Route::get('/cabinet/create', [CabinetController::class, 'create'])->name('cabinets.create');
    Route::post('/cabinet', [CabinetController::class, 'store'])->name('cabinets.store');
    Route::delete('/cabinet/{id}', [CabinetController::class, 'destroy'])->name('cabinets.destroy');
    Route::get('/cabinet/{id}/edit', [CabinetController::class, 'edit'])->name('cabinets.edit');
    Route::put('/cabinet/{id}', [CabinetController::class, 'update'])->name('cabinets.update');

    Route::get('/formateur', [FormateurController::class, 'index'])->name('formateur');
    Route::get('/formateur/create', [FormateurController::class, 'create'])->name('formateur.create');
    Route::post('/formateur', [FormateurController::class, 'store'])->name('formateur.store');
    Route::get('/formateur/{id}/edit', [FormateurController::class, 'edit'])->name('formateur.edit');
    Route::put('/formateur/{id}', [FormateurController::class, 'update'])->name('formateur.update');
    Route::delete('/formateur/{id}/supprimer', [FormateurController::class, 'destroy'])->name('formateur.destroy');

    // Routes pour la gestion de evaluation
    Route::get('/evaladmin', [EvaluationAdminController::class, 'index'])->name('evaladmin');
    Route::get('/evaladmin/{id}', [EvaluationAdminController::class, 'show'])->name('evaladmin.show');
    Route::get('/evaladmin/{id}/user', [EvaluationAdminController::class, 'user'])->name('evaluser');
    Route::get('/evaladmin/{id}/user/{id2}/eval', [EvaluationAdminController::class, 'eval'])->name('eval');
    Route::get('/evaladmin/{id}/user/{id2}/evaldirecteur', [EvaluationAdminController::class, 'evaldirecteur'])->name('evaldirecteur');

    // Routes pour la gestion de statistique
    Route::get('/statistiques', [StatistiqueController::class, 'index'])->name('statistiques');
});

//role 2 pour directeur
// Routes sécurisées nécessitant une authentification
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
    'role:2'
])->group(function () {

    // Routes pour la gestion des demandes
    Route::get('/demandes', [DemandeController::class, 'index'])->name('demandes');
    Route::get('/demandes/create', [DemandeController::class, 'create'])->name('demandes.create');
    Route::get('/demandes/{id}', [DemandeController::class, 'show'])->name('demandes.show');
    Route::get('/demandes/{id}/edit', [DemandeController::class, 'edit'])->name('demandes.edit');
    Route::put('/demandes/{id}', [DemandeController::class, 'update'])->name('demandes.update');
    Route::delete('/demandes/{id}', [DemandeController::class, 'destroy'])->name('demandes.destroy');
    Route::post('/demandes', [DemandeController::class, 'store'])->name('demandes.store');

    // Routes pour la gestion des evaluations
    Route::get('/evaluationFroid', [EvaluationFroidController::class, 'index'])->name('evaluationFroid');
    Route::get('/evaluationFroid/{id}', [EvaluationFroidController::class, 'show'])->name('evaluerfroid.show');
    Route::post('/evaluationFroid/{id}/{id2}', [EvaluationFroidController::class, 'store'])->name('evaluationFroid.store');
    Route::get('/evaluationFroidapres/{id}', [EvaluationFroidController::class, 'showApres'])->name('apresEvaluerFroid.show');
});

//role 3 pour directeur generale
// Routes sécurisées nécessitant une authentification
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
    'role:3'
])->group(function () {

    // Routes pour la gestion de valider planning
    Route::get('/plannings', [ValiderController::class, 'index'])->name('valider');
    Route::get('/plannings/{id}', [ValiderController::class, 'show'])->name('planning.vue');
    Route::get('/planningsValider', [ValiderController::class, 'valider'])->name('planning.valider');
    Route::post('/planningsRefuser', [ValiderController::class, 'refuser'])->name('planning.refuser');
});

//role 4 pour employee
// Routes sécurisées nécessitant une authentification
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
    'role:4'
])->group(function () {

    // Routes pour la gestion de evaluation
    Route::get('/evaluation', [EvaluationController::class, 'index'])->name('evaluation');
    Route::get('/evaluation/{id}/{id2}', [EvaluationController::class, 'show'])->name('evaluer.show');
    Route::post('/evaluations/{id}/{id2}', [EvaluationController::class, 'store'])->name('evaluation.store');
    Route::get('/apresEvaluation/{id}', [EvaluationController::class, 'showApres'])->name('apresEvaluer.show');
});
