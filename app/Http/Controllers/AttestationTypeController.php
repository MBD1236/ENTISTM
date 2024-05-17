<?php

namespace App\Http\Controllers;

use App\Models\AttestationType;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\View\View;

class AttestationTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(AttestationType $attestationType) : View
    {
        $attestationTypes = AttestationType::orderBy('created_at', 'desc')->paginate(5);
    
        return view('scolarite.parametres.parametre', compact('attestationTypes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    // public function create()
    // {
    //     $attestationType = new AttestationType();

    //     return view('scolarite.parametres.attestationTypes.form', [
    //         'attestationType' => $attestationType,
    //     ]);
    // }
    public function create()
    {
        $attestationType = new AttestationType();

        return view('scolarite.parametres.parametre', [
            'attestationType' => $attestationType,
        ]);
    }
    

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $id = $request->route('attestationType');
        $data = $request->validate([
            'type' => ['required' , 'string', 'min:2' ,  Rule::unique('attestation_types')->ignore($id, 'id')],
        ]);

        $data['type'] = strtolower($data['type']);
        AttestationType::create($data);
        return redirect()->route('scolarite.parametre')->with('success', 'Ajout effectuée avec succès !');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    // public function edit(AttestationType $attestationType)
    // {
    //     return view('scolarite.parametres.attestationTypes.form', [
    //         'attestationType' => $attestationType,
    //     ]);
    // }

    public function edit(AttestationType $attestationType)
    {
        $attestationTypes = AttestationType::paginate(10);
        return view('scolarite.parametres.attestationTypes.edit', [
            'attestationType' => $attestationType,
            'attestationTypes'=> $attestationTypes
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, AttestationType $attestationType)
    {
        $id = $request->route('attestationType');
        $data = $request->validate([
            'type' => ['required' , 'string', 'min:2' ,  Rule::unique('attestation_types')->ignore($id, 'id')],
        ]);
        $data['type'] = strtolower($data['type']);
        $attestationType->update($data);
        return redirect()->route('attestationType.edit', compact('attestationType'))->with('success', 'Modification effectuée avec succès !');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AttestationType $attestationType)
    {
    $attestationType->delete();
        return redirect()->route('scolarite.parametre')->with('danger', 'Suppression effectuée avec succès !');
    }
}
