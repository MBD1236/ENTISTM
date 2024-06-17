<?php

namespace App\Http\Controllers;

use App\Http\Requests\AttestationRequest;
use App\Models\AnneeUniversitaire;
use App\Models\Attestation;
use App\Models\AttestationType;
use App\Models\Etudiant;
use App\Models\Niveau;
use App\Models\Programme;
use App\Models\Reference;
use Illuminate\Http\Request;

class AttestationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $total = Attestation::count();
        return view('scolarite.attestations.index', [
            'attestations' => Attestation::orderBy('created_at', 'desc')->paginate(10),
            'programmes'=> Programme::all(),
            'niveaux'=> Niveau::all(),
            'annee_universitaires'=> AnneeUniversitaire::orderBy('created_at', 'desc')->paginate(5),
            'etudiants' => Etudiant::all(),
            'attestation_types'=> AttestationType::all(),
            'total'=> $total,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $total = Attestation::count();
        $attestation = new Attestation();

        $lastReference = Reference::orderBy('id', 'desc')->first();

        if ($lastReference) {
            $lastReff = $lastReference->numero;
            $reff = str_pad($lastReff + 1, 3, '0', STR_PAD_LEFT);
        } else {
            $reff = '001';
        }

        $request->session()->put('reff', $reff);

        return view('scolarite.attestations.form', [
            'attestation' => $attestation,
            'programmes'=> Programme::all(),
            'niveaux'=> Niveau::all(),
            'annee_universitaires'=> AnneeUniversitaire::orderBy('created_at', 'desc')->paginate(10),
            'etudiants' => Etudiant::all(),
            'attestation_types'=> AttestationType::all(),
            'total' => $total,
            'reff' => $reff 
        ]);
    }
    

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'reference_id' => ['required'],
            'attestation_type_id' => ['required'],
            'etudiant_id' => ['required'],
            'niveau_id' => ['required'],
            'annee_universitaire_id' => ['required'],
            'programme_id' => ['required'],
        ]);
        
        // Enregistrer le numéro de référence dans la base de données
        $reference = new Reference();
        $reference->numero = $request->input('reference_id');
        $reference->save();
    
        // Enregistrer le relevé de note
        $attestation = new Attestation();
        $attestation->reference_id = $reference->id;
        $attestation->attestation_type_id = $request->input('attestation_type_id');
        $attestation->etudiant_id = $request->input('etudiant_id');
        $attestation->niveau_id = $request->input('niveau_id');
        $attestation->annee_universitaire_id = $request->input('annee_universitaire_id');
        $attestation->programme_id = $request->input('programme_id');
        $attestation->save();

        $request->session()->forget('numero'); // Effacer le numéro de référence de la session après l'enregistrement
        return redirect()->route('scolarite.attestation.index')->with('success', 'Ajout effectuée avec succès !');
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
    public function edit(Attestation $attestation, Request $request)
    {
        $total = Attestation::count();
        if ($attestation->reference_id) {
            $reff = $attestation->reference->numero; // Supposant que 'reference_id' est la clé étrangère et 'reference' est la relation définie
        } else {
            $lastReference = Reference::orderBy('id', 'desc')->first();

            if ($lastReference) {
                $lastReff = $lastReference->numero;
                $reff = str_pad($lastReff + 1, 3, '0', STR_PAD_LEFT);
            } else {
                $reff = '001';
            }

            $request->session()->put('reff', $reff);
        }

        return view('scolarite.attestations.form', [
            'attestation' => $attestation,
            'programmes'=> Programme::all(),
            'niveaux'=> Niveau::all(),
            'annee_universitaires'=> AnneeUniversitaire::orderBy('created_at', 'desc')->paginate(10),
            'etudiants' => Etudiant::all(),
            'attestation_types'=> AttestationType::all(),
            'total' => $total,
            'reff' => $reff,
        ]);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(AttestationRequest $request, Attestation $attestation)
    {
        $data = $request->validated();

        if ($request->input('reference_id') != $attestation->reference->numero) {
            $reference = $attestation->reference;
            $reference->numero = $request->input('reference_id');
            $reference->save();
        }

        $attestation->update([
            'attestation_type_id' => $data['attestation_type_id'],
            'etudiant_id' => $data['etudiant_id'],
            'niveau_id' => $data['niveau_id'],
            'annee_universitaire_id' => $data['annee_universitaire_id'],
            'programme_id' => $data['programme_id'],
        ]);

        return redirect()->route('scolarite.attestation.index')->with('success', 'Modification effectuée avec succès !');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(attestation $attestation)
    {
        $reference = $attestation->reference;
        $attestation->delete();

        if ($reference) {
            $reference->delete();
        }
        return redirect()->route('scolarite.attestation.index')->with('danger', 'Suppression effectuée avec succès !');
    }


    // la view pour afficher les attestation d'inscription
    public function attestationInscription()
    {
        $attestations = Attestation::orderBy('created_at', 'desc')->paginate(10);
        $total = Attestation::where('type', 'Inscription')->count();
        
        return view('scolarite.attestations.inscriptionForm', [
            'attestations' => $attestations,
            'programmes'=> Programme::all(),
            'niveaux'=> Niveau::all(),
            'annee_universitaires'=> AnneeUniversitaire::orderBy('created_at', 'desc')->paginate(5),
            'etudiants' => Etudiant::all(),
            'total'=> $total,
        ]);
    }
}
