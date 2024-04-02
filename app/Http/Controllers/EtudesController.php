<?php

namespace App\Http\Controllers;

use App\Models\Departement;
use App\Models\Niveau;
use App\Models\Programme;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class EtudesController extends Controller
{
    public function index () : View
    {
        return view('etudes.index');
    }

    public function afficherParametre (Departement $departement, Programme $programme, Niveau $niveau) : View
    {
        $departements = Departement::paginate(10);
        $programmes = Programme::paginate(10);
        $niveaux = Niveau::paginate(10);

        return view('etudes.parametres.parametre', compact('departements', 'programmes', 'niveaux'));
    }
}
