<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class EmploisController extends Controller
{
    public function indexCours () : View
    {
        return view('etudes.emplois.cours.index');
    }
    
    public function indexComposition () : View
    {
        return view('etudes.emplois.compositions.index');
    }
}
