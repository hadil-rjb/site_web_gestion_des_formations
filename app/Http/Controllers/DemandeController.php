<?php

namespace App\Http\Controllers;

use App\Models\Demande;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DemandeController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $demandes = Demande::where('user_id', $user->id)
            ->get();
        $employees = Employee::all();

        return view('directeur.besoins.index', compact('employees', 'demandes'));
    }

    public function create()
    {
        $employees = Employee::all();

        return view('directeur.besoins.demande', compact('employees'));
    }

    public function store(Request $request)
    {
        // Valider les données d'entrée
        $validatedData = $request->validate([
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
        $demande->formateur = $request->input('formateur');
        $demande->priorite = $request->input('priorite');
        $demande->date = $request->input('date');
        $demande->user_id = auth()->user()->id;
        $demande->save();
        $demande->employees()->attach($request->input('employees'));

        if ($demande) {
            return redirect()->route('demandes')->with('success', 'Demande créée avec succès!');
        } else {
            return redirect()->back()->with('error', 'Une erreur s\'est produite lors de la création de la demande.');
        }
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $demandes = Demande::findOrFail($id);

        return view('directeur.besoins.show', compact('demandes'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $employees = Employee::all();

        $demandes = Demande::findOrFail($id);

        return view('directeur.besoins.edit', compact('demandes', 'employees'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $demandes = Demande::findOrFail($id);

        $demandes->update($request->all());

        $demandes->employees()->sync($request->input('employees'));

        return redirect()->route('demandes')->with('success', 'Demande modifiée avec succès !');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $demande = Demande::findOrFail($id);

        $demande->employees()->detach(); // Remove any related employees

        $demande->delete();

        return redirect()->route('demandes')->with('success', 'Demande supprimée avec succès !');
    }
}
