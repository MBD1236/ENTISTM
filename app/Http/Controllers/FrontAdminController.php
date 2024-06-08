<?php

namespace App\Http\Controllers;

use App\Models\Articles;
use App\Models\Galeries;
use App\Models\Subscriber;
use App\Models\Temoignages;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class FrontAdminController extends Controller
{
    public function index () : View
    {
        $nombre_article = Articles::all()->count();
        $nombre_photo= Galeries::all()->count();
        $nombre_abonne = Subscriber::all()->count();
        $nombre_temoignage = Temoignages::all()->count();

        return view('front-office-back.index', compact('nombre_article','nombre_photo','nombre_abonne','nombre_temoignage'));
    }
}
