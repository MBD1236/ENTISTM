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
        $request->validate([
            'programme' => ['required'],
            'annee_universitaire' => ['required'],
            'promotion_id' => ['nullable'],
        ]);

        $programme = $request->input('programme');
        $annee_universitaire = $request->input('annee_universitaire');
        $promotion_id = $request->input('promotion_id');
       
        $programme = Programme::where('programme', $programme)->first();
        $annee_universitaire = AnneeUniversitaire::where('session', $annee_universitaire)->first();
        $promotion = Promotion::where('promotion', $promotion_id)->first();
        // Construire la requête pour filtrer les inscriptions
        $query = Inscription::query()->whereHas('programme', function($q) use($programme) {
            $q->where('programme', $programme);
        })->whereHas('annee_universitaire', function($q) use($annee_universitaire) {
            $q->where('session', $annee_universitaire);
        });

        
        if ($promotion_id !== null) {
            $query->whereHas('promotion', function($q) use ($promotion_id){
                $q->where('promotion', $promotion_id);
            });
        }

        $etudiants = $query->get();
        // dd($etudiants);

        return view('scolarite.printEtudiant.index', [
            'etudiants' => $etudiants,
            'programme' => $programme,
            'annee_universitaire' => $annee_universitaire,
            'promotion' => $promotion,
        ]);
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
