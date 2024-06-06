<?php

namespace App\Http\Controllers;

use App\Models\Etudiant;
use App\Models\NatureRecu;
use Illuminate\Http\Request;

class ComptabiliteRecuController extends Controller
{
    // the form
    public function form() {
        return view('billeterie.printSeveral.form', [
            'etudiants' => Etudiant::all(),
            'natures' => NatureRecu::all(),
        ]);
    }

    public function index(Request $request) {
        $request->validate([
            'matricules' => 'required|array',
            'matricules.*' => 'exists:etudiants,ine',
            'nature' => ['required', 'string'],
        ]);

        
        $matricules = $request->input('matricules');
        $nature = $request->input('nature');

        $etudiants = Etudiant::whereIn('ine', $matricules)
        ->whereHas('recus', function ($query) use ($nature) {
            $query->whereHas('natureRecu', function ($q) use ($nature) {
                $q->where('nature', $nature);
            });
        })->get();

        // dd($etudiants);
        return view('billeterie/printSeveral/index', compact('etudiants'));
    }

}
