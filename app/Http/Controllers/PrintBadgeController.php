<?php

namespace App\Http\Controllers;

use App\Models\Attestation;
use App\Models\Etudiant;
use App\Models\Service;
use Illuminate\Http\Request;

class PrintBadgeController extends Controller
{
    public function index()
    {
        $etudiants = Etudiant::all();
        return view("scolarite.printBadge.form", compact('etudiants'));
    }

    public function printBadge(Request $request) {

        if (!$request->filled('matricules')) {
            return redirect()->back()->with('error', 'Veuillez sélectionner au moins un numéro de matricule.');
        }

        $services = Service::all();
        $etudiants = Etudiant::whereIn('ine', $request->matricules)->get();
        return view('scolarite.printBadge.index')->with('etudiants', $etudiants)
                                                ->with('services',$services);
    }
}
