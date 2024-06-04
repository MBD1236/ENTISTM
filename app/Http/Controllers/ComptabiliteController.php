<?php

namespace App\Http\Controllers;

use App\Models\Recu;
use Illuminate\Http\Request;

class ComptabiliteController extends Controller
{
    public function dashboard()
    {
        return view('billeterie.dashboard');
    }

    // pour lancer la page d'impression des recus
    public function printRecu(Recu $recu)
    {
        return view('billeterie.printRecu', [
            'recu' => $recu
        ]);
    }

}
