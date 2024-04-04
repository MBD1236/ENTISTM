<?php

namespace App\Http\Controllers;

use App\Models\Etudiant;
use App\Models\Semestre;
use App\Models\AnneeUniversitaire;
use App\Models\Promotion;
use App\Models\Recu;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;

class ScolariteController extends Controller
{
    public function index () : View
    {
        return view('scolarite.dashboard');
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



        $anneeUnivs = AnneeUniversitaire::paginate(5);
        $promotions = Promotion::paginate(5);
        $semestres = Semestre::paginate(5);

        return view('scolarite.parametres.parametre', compact('anneeUnivs', 'promotions', 'semestres'));
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
