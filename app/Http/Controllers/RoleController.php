<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Mail\RoleChanged;
use App\Mail\RoleRefuser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::where('role', '=', 0)->orderBy('created_at', 'desc')->get();
        $nouveaus = User::where('role', '<>', 1)->where('role', '<>', 0)->orderBy('created_at', 'desc')->get();
        $countNouveaus = $users->count();
        return view('admin.roles.roles', compact('users', 'nouveaus', 'countNouveaus'));
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = User::all();
        $user = user::findOrFail($id);
        return view('admin.roles.edit', compact('user'));
    }


    public function ajout(Request $request, string $id)
    {
        $user = User::findOrFail($id);

        // Vérifiez que les champs requis sont remplis et validez-les
        $validatedData = $request->validate([
            'role' => 'required|integer|in:1,2,3,4',
        ]);

        // Mettre à jour uniquement les champs de l'utilisateur spécifiés
        $user->role = $validatedData['role'];
        $user->save();

        // Envoyer un e-mail à l'utilisateur quand ajouter un role
        Mail::to($user->email)->send(new RoleChanged($user));

        session()->flash('success', 'Le rôle de ' . $user->name . ' a été ajouté avec succès".');

        return redirect()->route('roles');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = User::findOrFail($id);

        // Vérifiez que les champs requis sont remplis et validez-les
        $validatedData = $request->validate([
            'role' => 'required|integer|in:1,2,3,4',
        ]);

        // Mettre à jour uniquement les champs de l'utilisateur spécifiés
        $user->role = $validatedData['role'];
        $user->save();

        // Envoyer un e-mail à l'utilisateur quand modifier un role
        Mail::to($user->email)->send(new RoleChanged($user));

        session()->flash('success', 'Le rôle de ' . $user->name . ' a été modifié avec succès.');

        return redirect()->route('roles');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        // Envoyer un e-mail à l'utilisateur quand refuser
        Mail::to($user->email)->send(new RoleRefuser($user));

        return redirect()->route('roles')->with('success', 'Utilisateur supprimé avec succès');
    }
}
