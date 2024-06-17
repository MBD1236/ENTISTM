<?php

namespace App\Http\Controllers;

use App\Models\Etudiant;
use App\Models\Inscription;
use App\Models\Reference;
use App\Models\ReleveNote;
use Illuminate\Http\Request;

class ScolariteReleveNoteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('scolarite.releves.index', [
            'etudiants' => Etudiant::all(),
            'relevenotes' => ReleveNote::all(),
        ]);
    }

    public function create(Request $request)
    {
        $request->validate([
            'etudiant' => ['required'],
        ]);
        
        $ine = $request->input('etudiant');

        if (!$request->session()->has('numero')) {  // Générer un nouveau numéro de référence si non existant en session
            $totalNumero = Reference::count();
            $numero = str_pad($totalNumero + 1, 3, '0', STR_PAD_LEFT);
            $request->session()->put('numero', $numero);
        } else {
            $numero = $request->session()->get('numero');
        }

        $etudiant = Etudiant::where('id', $ine)->first();  // Rechercher l'étudiant basé sur l'id
        
        if ($etudiant) {
            // Rechercher l'inscription basée sur l'ID de l'étudiant
            $inscription = Inscription::where('etudiant_id', $etudiant->id)->first();
        
            if ($inscription) {
                return view('scolarite.releves.form', [
                    'etudiant' => $etudiant,
                    'numero' => $numero 
                ]);
            } else {
                return redirect()->back()->withErrors(['etudiant' => 'Inscription non trouvée.']);
            }
        } else {
            return redirect()->back()->withErrors(['etudiant' => 'Étudiant non trouvé.']);
        }
    } 

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'reference_id' => ['required'],
            'ine' => ['required'],
            'prenom' => ['required'],
            'nom' => ['required'],
            'telephone' => ['required'],
            'programme' => ['required'],
        ]);
        
        // Enregistrer le numéro de référence dans la base de données
        $reference = new Reference();
        $reference->numero = $request->input('reference_id');
        $reference->save();
    
        // Enregistrer le relevé de note
        $releve = new ReleveNote();
        $releve->reference_id = $reference->id;
        $releve->etudiant_id = Etudiant::where('ine', $request->input('ine'))->first()->id;
        $releve->ine = $request->input('ine');
        $releve->prenom = $request->input('prenom');
        $releve->nom = $request->input('nom');
        $releve->telephone = $request->input('telephone');
        $releve->programme = $request->input('programme');
        $releve->save();
    
        // Effacer le numéro de référence de la session après l'enregistrement
        $request->session()->forget('numero');
    
        return redirect()->route('scolarite.releve.index')->with('success', 'Relevé de note enregistré avec succès.');
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
    public function edit($id, Request $request)
    {
        $relevenote = ReleveNote::find($id);
        if (!$relevenote) {
            return redirect()->route('scolarite.releve.index')->with('error', 'Relevé de note non trouvé.');
        }

        if (!$request->session()->has('numero')) {  // Générer un nouveau numéro de référence si non existant en session
            $totalnumero = Reference::count();
            $numero = str_pad($totalnumero + 1, 3, '0', STR_PAD_LEFT);
            $request->session()->put('numero', $numero);
        } else {
            $numero = $request->session()->get('numero');
        }

        return view('scolarite.releves.formedit', [
            'relevenote' => $relevenote,
            'numero' => $numero,
        ]);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ReleveNote $relevenote)
    {
        $data = $request->validate([
            'reference_id' => ['required'],
            'ine' => ['required'],
            'prenom' => ['required'],
            'nom' => ['required'],
            'telephone' => ['required'],
            'programme' => ['required'],
        ]);
       
        $relevenote->update($data);
        return redirect()->route('scolarite.releve.index')->with('success', 'Relevé de note modifié avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ReleveNote $relevenote)
    {
        dd($relevenote);
        $relevenote->delete();
        dd($relevenote->delete());
        return redirect()->route('scolarite.releve.index')->with('success', 'Relevé de note supprimé avec succès.');
    }
}
