<?php

namespace App\Http\Controllers;

use App\Models\AnneeUniversitaire;
use App\Models\Attestation;
use App\Models\AttestationType;
use App\Models\Etudiant;
use App\Models\Inscription;
use App\Models\Niveau;
use App\Models\Service;
use Illuminate\Http\Request;

class PrintAttestationController extends Controller
{
    public function attestationInscription(Request $request)
    {
        $attestations = Attestation::orderBy('created_at', 'desc')->paginate(10);
        // Compter le nombre d'attestations d'inscription
        $total = Attestation::count();

        // recuperer les matricules
        $matricules = $request->input('matricules', []);

        return view('scolarite.printAttestation.form' , [
            // return view('scolarite.attestations.inscriptionForm', [
            'attestations' => $attestations,
            'annee_universitaires' => AnneeUniversitaire::orderBy('created_at', 'desc')->paginate(5),
            'attestation_types' => AttestationType::all(),
            'total' => $total,
            'matricules' => $matricules,
        ]);
    }


    public function fetchStudents(Request $request)
    {
        $attestations = Attestation::orderBy('created_at', 'desc')->paginate(10);
        // pour la recuperation du nombre d'attestation
        $total = Attestation::whereHas('attestation_type', function ($query) {
            $query->where('type', 'Inscription');
        })->count();

        $request->validate([
            'annee_universitaire_id' => 'required|exists:annee_universitaires,id',
            'attestation_type_id' => 'required|exists:attestation_types,id',
        ]);

        $annee = $request->input('annee_universitaire_id');
        $typeAttes = $request->input('attestation_type_id');

        // Stocker les critères de filtrage dans la session
        $request->session()->put('annee_universitaire_id', $annee);
        $request->session()->put('attestation_type_id', $typeAttes);
       
        // requet pour recuperer les matricules
        $matricules = Attestation::where('annee_universitaire_id', $annee)
                                ->where('attestation_type_id', $typeAttes)
                                ->pluck('etudiant_id')
                                ->toArray();
    
        // Récupérer les détails des étudiants en fonction des matricules
        $etudiants = Etudiant::whereIn('id', $matricules)
                             ->select('id as etudiant_id', 'ine', 'prenom', 'nom')
                             ->get();

        return view('scolarite.printAttestation.form' , [
            'matricules' => $etudiants,
            'attestations' => $attestations,
            'annee_universitaires'=> AnneeUniversitaire::orderBy('created_at', 'desc')->paginate(5),
            'attestation_types' => AttestationType::all(),
            'total'=> $total,
        ]);
    }

    // methode pour l'affichage de la vue de l'impression
    public function printAttestation(Request $request) {
        $request->validate([
            'matricules' => 'required|array',
            'matricules.*' => 'exists:etudiants,id', 
        ]);
    
        $annee = $request->session()->get('annee_universitaire_id');
        $typeAttes = $request->session()->get('attestation_type_id');
        
        // Filtrer les attestations en fonction de l'année universitaire et du type d'attestation
        $attestations = Attestation::where('annee_universitaire_id', $annee)
                                    ->where('attestation_type_id', $typeAttes)
                                    ->whereIn('etudiant_id', $request->input('matricules'))
                                    ->get();
        // Récupérer les étudiants correspondants aux attestations filtrées
        $etudiants = Etudiant::whereIn('id', $attestations->pluck('etudiant_id'))->get();
        $annee_universitaires = AnneeUniversitaire::all();
        $niveaux = Niveau::all();
        $services = Service::all();

        return view('scolarite.printAttestation.index', [
            'attestations' => $attestations,
            'etudiants' => $etudiants,
            'annee_universitaires' => $annee_universitaires,
            'niveaux' => $niveaux,
            'services' => $services,
        ]);
    }

}
