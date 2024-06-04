<?php

namespace App\Http\Controllers;

use App\Models\NatureRecu;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ComptabiliteParametreController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('billeterie/parametres/parametre', [
            'naturerecus' => NatureRecu::orderBy('created_at', 'desc')->paginate(10),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $naturerecu = new NatureRecu();
        return view('billeterie/parametres/parametre', [
            'naturerecu' => $naturerecu,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $id = $request->route('naturerecu');
        $data = $request->validate([
            'nature' => ['required' , 'string', 'min:1' ,  Rule::unique('nature_recus')->ignore($id, 'id')],
        ]);
        NatureRecu::create($data);
        return redirect()->route('billeterie.parametre.index')->with('success', 'Montant ajouté avec succès !');
    }


    /**
     * Show the form for editing the specified resource.
    */
    public function edit($id)
    {
        $naturerecu = NatureRecu::findOrFail($id);
        return view('billeterie/parametres/billeterie/edit', compact('naturerecu'));
    }

    /**
     * Update the specified resource in storage.
    */
    public function update(Request $request, $id)
    {
        $naturerecu = NatureRecu::findOrFail($id);
        $id = $request->route('naturerecu');
        $data = $request->validate([
            'nature' => ['required' , 'string', 'min:1' ,  Rule::unique('nature_recus')->ignore($id, 'id')],
        ]);
        $naturerecu->update($data);
        return redirect()->route('billeterie.parametre.index')->with('success', 'Modification effectué avec succès !');
    }

    /**
     * Remove the specified resource from storage.
    */
    public function destroy(NatureRecu $natureRecu)
    {
        $natureRecu->delete();
        return redirect()->route('billeterie.parametre.index')->with('success','Suppression éffectuée avec succès');
    }
}
