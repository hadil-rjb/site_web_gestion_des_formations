<?php

namespace App\Http\Controllers;

use App\Models\Cabinet;
use Illuminate\Http\Request;

class CabinetController extends Controller
{
    public function index()
    {
        $cabinets = Cabinet::all();
        return view('admin.cabinet.cabinet',compact('cabinets'));
    }

    public function create()
    {
        $cabinets = Cabinet::all();

        return view('admin.cabinet.createCabinet',compact('cabinets'));
    }

    public function store(Request $request)
    {
        $cabinets = Cabinet::create($request->all());

        return redirect()->route('cabinet')->with('success', 'Cabinet créé avec succès.');;

    }

    public function edit(string $id)
    {
        $cabinets =Cabinet::findOrFail($id);

        return view('admin.cabinet.editCabinet', compact('cabinets'));
    }

    public function update(Request $request, string $id)
    {
        $cabinets =Cabinet::findOrFail($id);

        $cabinets->update($request->all());

        return redirect()->route('cabinet')->with('success', 'Cabinet modifié avec succès.');
    }

    public function destroy(string $id)
    {
        $cabinets = Cabinet::findOrFail($id);

        $cabinets->delete();

        return redirect()->route('cabinet')->with('success', 'Cabinet supprimé avec succès.');
    }


}
