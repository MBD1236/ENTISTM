<?php

namespace App\Http\Controllers;

use App\Models\Etudiant;
use App\Models\Semestre;
use App\Models\AnneeUniversitaire;
use App\Models\AttestationType;
use App\Models\Departement;
use App\Models\Inscription;
use App\Models\Programme;
use App\Models\Promotion;
use App\Models\Recu;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;

class ScolariteController extends Controller
{
    public function index () : View
    {
        $etudiants = Etudiant::all()->count();
        $inscrits = Inscription::all()->count();
        $programmes = Programme::all()->count();
        $departements = Departement::all()->count();
        return view('scolarite.dashboard',[
            'etudiants' => $etudiants,
            'inscrits' => $inscrits,
            'progs' => $programmes,
            'deps' => $departements,
        ]);
    }

    public function inscription () : View
    {
        return view('scolarite.etudiants.inscrip');
    }

    public function reinscription () : View
    {
        return view('scolarite.etudiants.reinscrip');
    }

    public function afficherParametre (AnneeUniversitaire $anneeUniv, Promotion $promotion, Semestre $semestre) : View
    {
        $anneeUnivs = AnneeUniversitaire::orderBy('created_at', 'desc')->paginate(5);
        $promotions = Promotion::orderBy('created_at', 'desc')->paginate(5);
        $semestres = Semestre::orderBy('created_at', 'desc')->paginate(5);
        $attestationTypes = AttestationType::orderBy('created_at', 'desc')->paginate(5);

        return view('scolarite.parametres.parametre', compact('anneeUnivs', 'promotions', 'semestres', 'attestationTypes'));
    }


    public function orientation () : View
    {
        return view('scolarite.etudiants.etudiants-orientes');
    }

    public function inscrits () : View
    {
        return view('scolarite.etudiants.etudiants-inscrits');
    }

}
