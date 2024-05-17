<?php

namespace App\Http\Controllers;

use App\Http\Requests\AttestationRequest;
use App\Models\AnneeUniversitaire;
use App\Models\Attestation;
use App\Models\AttestationType;
use App\Models\Etudiant;
use App\Models\Niveau;
use App\Models\Programme;
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
        public function create()
        {
            $total = Attestation::count();
            $attestation = new Attestation();

            return view('scolarite.attestations.form', [
                'attestation' => $attestation,
                'programmes'=> Programme::all(),
                'niveaux'=> Niveau::all(),
                'annee_universitaires'=> AnneeUniversitaire::orderBy('created_at', 'desc')->paginate(10),
                'etudiants' => Etudiant::all(),
                'attestation_types'=> AttestationType::all(),
                // le nombre total des attestation
                'total' => $total
            ]);
        }
        

        /**
         * Store a newly created resource in storage.
         */
        public function store(AttestationRequest $request)
        {
            $data = $request->validated();
            // dd($data);
            Attestation::create($data);
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
        public function edit(Attestation $attestation)
        {
            $total = Attestation::count();
            return view('scolarite.attestations.form', [
                'attestation' => $attestation,
                'programmes'=> Programme::all(),
                'niveaux'=> Niveau::all(),
                'annee_universitaires'=> AnneeUniversitaire::orderBy('created_at', 'desc')->paginate(10),
                'etudiants' => Etudiant::all(),
                'attestation_types'=> AttestationType::all(),
                // le nombre total des attestation
                'total' => $total,
                'reff' => $attestation->reff,
            ]);
        }

        /**
         * Update the specified resource in storage.
         */
        public function update(AttestationRequest $request, Attestation $attestation)
        {
            $data = $request->validated();

            $attestation->update($data);
            return redirect()->route('scolarite.attestation.index')->with('success', 'Modification effectuée avec succès !');
        }

        /**
         * Remove the specified resource from storage.
         */
        public function destroy(attestation $attestation)
        {
            $attestation->delete();
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
