<?php

namespace App\Http\Controllers;

use App\Models\Departement;
use App\Models\Inscription;
use App\Models\Niveau;
use App\Models\Programme;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class EtudesController extends Controller
{
    public function index () : View
    {
        $departements = Departement::all()->count();
        $programmes = Programme::all()->count();
        $niveaux = Niveau::all()->count();
        $etudiants = Inscription::all()->count();
        return view('etudes.index',[
            'departements' => $departements,
            'programmes' => $programmes,
            'niveaux' => $niveaux,
            'etudiants' => $etudiants,
        ]);
    }

    public function afficherParametre (Departement $departement, Programme $programme, Niveau $niveau) : View
    {
        $departements = Departement::paginate(10);
        $programmes = Programme::paginate(10);
        $niveaux = Niveau::paginate(10);

        return view('etudes.parametres.parametre', compact('departements', 'programmes', 'niveaux'));
    }
}
