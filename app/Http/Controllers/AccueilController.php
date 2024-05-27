<?php

namespace App\Http\Controllers;

use App\Models\Departement;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class AccueilController extends Controller
{
    public function accueil () : View
    {
        $departements = Departement::all();
        return view('front-office.index', compact('departements'));
    }
    public function tousLesDepartements (Departement $departement) : View
    {
        $departements = Departement::all();
        return view('front-office.index', compact('departements'));
    }
}
