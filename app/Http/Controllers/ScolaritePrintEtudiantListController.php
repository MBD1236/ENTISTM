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

        $programme = Programme::find($programme_id);
        $annee_universitaire = AnneeUniversitaire::find($annee_universitaire_id);
        $promotion = Promotion::find($promotion_id);

        // Construire la requête pour filtrer les inscriptions
        $query = Inscription::with('etudiant', 'promotion', 'programme', 'niveau', 'annee_universitaire')
            ->where('programme_id', $programme_id)
            ->where('annee_universitaire_id', $annee_universitaire_id);

        if ($promotion_id) {
            $query->where('promotion_id', $promotion_id);
        }

        $etudiants = $query->get();

        return view('scolarite.printEtudiant.index', [
            'etudiants' => $etudiants,
            'programme' => $programme,
            'annee_universitaire' => $annee_universitaire,
            'promotion' => $promotion,
        ]);
    }
}
