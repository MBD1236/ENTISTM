<?php

namespace App\Http\Controllers;

use App\Http\Requests\AnneeUnivRequest;
use App\Models\AnneeUniversitaire;
use App\Models\Inscription;
use App\Models\Programme;
use App\Models\Promotion;
use Illuminate\Http\Request;

class ScolaritePrintEtudiantListController extends Controller
{
    // the form
    public function form() {
        return view('scolarite.printEtudiant.form', [
            'programmes' => Programme::all(),
            'annee_universitaires' => AnneeUniversitaire::all(),
            'promotions' => Promotion::all(),
        ]);
    }

    public function index(Request $request) {
        $request->validate([
            'programme_id' => ['required'],
            'annee_universitaire_id' => ['required'],
            'promotion_id' => ['nullable'],
        ]);

        $programme_id = $request->input('programme_id');
        $annee_universitaire_id = $request->input('annee_universitaire_id');
        $promotion_id = $request->input('promotion_id');
       
        // dd($programme_id);
        // $programme = Programme::find($programme_id);
        $programme = Programme::where('programme', $programme_id)->first();
        $annee_universitaire = AnneeUniversitaire::where('session', $annee_universitaire_id)->first();
        $promotion = Promotion::where('promotion', $promotion_id)->first();

        
        // Construire la requête pour filtrer les inscriptions
    
        $query = Inscription::query()->whereHas('programme', function($q) use($programme_id) {
            $q->where('programme', $programme_id);
        })->whereHas('annee_universitaire', function($q) use($annee_universitaire_id) {
            $q->where('session', $annee_universitaire_id);
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
}
