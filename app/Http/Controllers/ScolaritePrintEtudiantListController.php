<?php

namespace App\Http\Controllers;

use App\Http\Requests\AnneeUnivRequest;
use App\Models\AnneeUniversitaire;
use App\Models\Etudiant;
use App\Models\Inscription;
use App\Models\Programme;
use App\Models\Promotion;
use Illuminate\Http\Request;

class ScolaritePrintEtudiantListController extends Controller
{

    // la form  pour les etudiants inscrits et reinscrits
    public function form() {
        return view('scolarite.printEtudiant.form', [
            'programmes' => Programme::all(),
            'annee_universitaires' => AnneeUniversitaire::all(),
            'promotions' => Promotion::all(),
        ]);
    }

   
    public function index(Request $request) {
        // Validation des inputs
        $request->validate([
            'programme' => ['required'],
            'annee_universitaire' => ['required'],
            'promotion_id' => ['nullable'],
        ]);
    
        // Récupération des inputs
        $programme = $request->input('programme');
        $annee_universitaire = $request->input('annee_universitaire');
        $promotion_id = $request->input('promotion_id');
    
        // Recherche des enregistrements correspondants dans les tables liées
        $programme = Programme::where('programme', $programme)->first();
        $annee_universitaire = AnneeUniversitaire::where('session', $annee_universitaire)->first();
        $promotion = Promotion::where('promotion', $promotion_id)->first();
    
        if (!$programme || !$annee_universitaire) {
            return redirect()->back()->withErrors('Programme ou année universitaire invalide');
        }
    
        // Construction de la requête
        $query = Inscription::query()
            ->where('programme_id', $programme->id)
            ->where('annee_universitaire_id', $annee_universitaire->id);
    
        if ($promotion) {
            $query->where('promotion_id', $promotion->id);
        }
    
        // Récupération des inscriptions
        $etudiants = $query->get();
        if($etudiants->isEmpty()) {
            return redirect()->route('scolarite.print.form')->with('error', "Aucun etudiant inscrit au compte de ce programme et de cette année universitaire selectionnés, veuillez verifier bien avant de lancer l'impression ! ");
        } else {
            return view('scolarite.printEtudiant.index', [
                'etudiants' => $etudiants,
                'programme' => $programme,
                'annee_universitaire' => $annee_universitaire,
                'promotion' => $promotion,
            ]);
        }
    }
    


    // la form  pour les etudiants orientes
    public function forms() {
        return view('scolarite.printEtudiantOriente.form', [
            'programmes' => Programme::all(),
            'annee_universitaires' => AnneeUniversitaire::all(),
        ]);
    }

    // la view  pour les etudiants inscrits et reinscrits
    public function oriente(Request $request) {
        $request->validate([
            'programme' => ['required'],
            'annee_universitaire' => ['required'],
        ]);

        $programme = $request->input('programme');
        $annee_universitaire = $request->input('annee_universitaire');
       
        $programme = Programme::where('programme', $programme)->first();
        $annee_universitaire = AnneeUniversitaire::where('session', $annee_universitaire)->first();
        
        // Construire la requête pour filtrer les inscriptions
        
        $query = Etudiant::whereIn('programme', $programme)
                        ->whereIn('session', $annee_universitaire);

        $etudiants = $query->get();
        if($etudiants->isEmpty()) {
            return redirect()->route('scolarite.print.forms')->with('error', "Aucun etudiant inscrit au compte de ce programme et de cette année universitaire selectionnés, veuillez verifier bien avant de lancer l'impression ! ");
        } else {
            return view('scolarite.printEtudiantOriente.index', [
                'etudiants' => $etudiants,
                'programme' => $programme,
                'annee_universitaire' => $annee_universitaire,
            ]);
        }

    }
}
