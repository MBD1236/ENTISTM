<?php

namespace App\Http\Controllers;

use App\Models\Articles;
use App\Models\Departement;
use App\Models\Frontenseignant;
use App\Models\FrontProgramme;
use App\Models\Frontservice;
use App\Models\Photo;
use App\Models\Temoignages;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Date;

class AccueilController extends Controller
{
    public function accueil () : View
    {
        $frontProgrammes = FrontProgramme::latest()->take(6)->get();
        $allfrontenseignants = Frontenseignant::all();
        $today = Date::now()->toDateString();

        srand(strtotime($today));
        $shuffledTeachers = $allfrontenseignants->shuffle();

        $frontenseignants = $shuffledTeachers->take(4);
        $articles = Articles::latest()->take(6)->get();
        $photos = Photo::latest()->take(6)->get();
        $frontservices = Frontservice::latest()->take(6)->get();
        $all_photos = Photo::all();
        $temoignages = Temoignages::all();
        $departements = Departement::all();
        return view('front-office.index', compact('departements', 'articles', 'temoignages', 'photos', 'all_photos', 'frontservices', 'frontenseignants', 'frontProgrammes'));
    }
    public function tousLesDepartements (Departement $departement) : View
    {
        $departements = Departement::all();
        return view('front-office.index', compact('departements'));
    }
}
