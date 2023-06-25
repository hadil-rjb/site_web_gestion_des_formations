<?php

namespace App\Http\Controllers;

use App\Models\Cabinet;
use App\Models\Formateur;
use Illuminate\Http\Request;

class FormateurController extends Controller
{
    public function index()
    {
        $formateurs = Formateur::with('cabinet')->get();
        return view('admin.formateur.index',compact('formateurs'));
    }
        public function create()
    {
        $formateurs = Formateur::all();
        $cabinets= Cabinet::all();

        return view('admin.formateur.create',compact('formateurs','cabinets'));
    }

    public function store(Request $request)
    {
        $formateurs = Formateur::create($request->all());
        $formateurs->cabinet_id = $request->input('cabinet');
        $formateurs->save();

        return redirect()->route('formateur')->with('success', 'formateur créé avec succès.');;
    }

    public function edit(string $id)
    {
        $formateurs =Formateur::findOrFail($id);
        $cabinets= Cabinet::all();

        return view('admin.formateur.edit', compact('formateurs','cabinets'));
    }

    public function update(Request $request, string $id)
    {
        $formateurs =Formateur::findOrFail($id);

        $formateurs->update($request->all());

        return redirect()->route('formateur')->with('success', 'Formateur modifié avec succès.');
    }

    public function destroy(string $id)
    {
        $formateur = Formateur::findOrFail($id);

        if ($formateur->formations()->exists()) {
            return redirect()->route('formateur')->with('error', 'Impossible de supprimer le formateur car des demandes de formation lui sont associées.');
        }

        $formateur->delete();

        return redirect()->route('formateur')->with('success', 'Formateur supprimé avec succès.');
    }

}
