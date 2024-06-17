<?php

namespace App\Http\Controllers;

use App\Models\Etudiant;
use App\Models\Inscription;
use App\Models\Matiere;
use App\Models\Niveau;
use App\Models\Note;
use App\Models\Reference;
use App\Models\ReleveNote;
use App\Models\Semestre;
use App\Models\Service;
use Illuminate\Http\Request;

class ScolaritePrintReleveController extends Controller
{
    //pour le formulaire de printReleveSemestrielle
    public function form() {
        return view('scolarite.printReleveSemestrielle.form', [
            "etudiants" => ReleveNote::all(),
            "semestres" => Semestre::all()
        ]);
    }

    // pour la view index
    public function index(Request $request) {
        $request->validate([
            'matricule' => ['required'],
            'semestre_id' => ['required'],
        ]);
    
        $matricule = $request->input('matricule');
        $semestre_id = $request->input('semestre_id');
    
        // Récupération de l'étudiant par son matricule
        $etudiant = Etudiant::where('ine', $matricule)->first();
    
        if (!$etudiant) {
            return redirect()->back()->with('error', 'Étudiant introuvable.');
        }
    
        // Récupération des notes pour verifier si l'etudiant a des notes dans le semestre selectionne
        $notesCount = Note::whereHas('inscription', function($query) use($etudiant) {
            $query->where('etudiant_id', $etudiant->id);
        })->whereHas('matiere', function($query) use($semestre_id) {
            $query->where('semestre_id', $semestre_id);
        })->count();

        if ($notesCount !== 5) {
            return redirect()->back()->with('error', "L'etudiant n'a pas ses notes au complet ! le relevé ne peut pas être imprimer");
        }

        // Vérifiez si le relevé existe pour cet étudiant
        $releveNote = ReleveNote::where('etudiant_id', $etudiant->id)->first();
        if (!$releveNote) {
            return redirect()->back()->with('error', 'Aucun relevé trouvé pour cet étudiant.');
        }
    
        // Récupération des notes
        $notes = Note::whereHas('inscription', function($query) use($etudiant) {
            $query->where('etudiant_id', $etudiant->id);
        })->whereHas('matiere', function($query) use($semestre_id) {
            $query->where('semestre_id', $semestre_id);
        })->get();
    
        // Récupération des matières
        $matieres_id = Note::whereHas('inscription', function($query) use($etudiant) {
            $query->where('etudiant_id', $etudiant->id);
        })->whereHas('matiere', function($query) use($semestre_id) {
            $query->where('semestre_id', $semestre_id);
        })->pluck('matiere_id');
    
        $matieres = Matiere::whereIn('id', $matieres_id)->get();
    
        // Récupération des inscriptions
        $inscriptions_id = Note::whereHas('inscription', function($query) use($etudiant) {
            $query->where('etudiant_id', $etudiant->id);
        })->whereHas('matiere', function($query) use($semestre_id) {
            $query->where('semestre_id', $semestre_id);
        })->pluck('inscription_id')->unique();
    
        $etudiants = Inscription::whereIn('id', $inscriptions_id)->get();
        $semestre = Semestre::where('id', $semestre_id)->first();
    
        // Récupération du numéro de référence
        $nf = $releveNote->reference_id;
        $numeroreference = Reference::where('id', $nf)->first();

        return view('scolarite.printReleveSemestrielle.index', [
            "notes" => $notes,
            'etudiants' => $etudiants,
            "matieres" => $matieres,
            "semestre" => $semestre,
            "etudiant" => $etudiant,
            "numeroreference" => $numeroreference,
            "services" => Service::all(),
        ]);
    }
    
    //pour le formulaire de printReleveAnnul
    public function releveAnnuelform() {
        return view('scolarite.printReleveAnnuel.form', [
            "etudiants" => ReleveNote::all(),
            "semestres" => Semestre::all()
        ]);
    }

    // pour la view index
    public function releveAnnuelindex(Request $request) {
        $request->validate([
            'matricule' => ['required'],
            'semestre_id' => ['required', 'array'],
            'semestre_id.*' => 'exists:semestres,id',
        ]);
        
        $matricule = $request->input('matricule');
        $semestre_id = $request->input('semestre_id');

        // Récupération de l'étudiant par son matricule
        $etudiant = Etudiant::where('ine', $matricule)->first();
    
        if (!$etudiant) {
            return redirect()->back()->with('error', 'Étudiant introuvable.');
        }
    
        // Récupération des semestres sélectionnés
        $semestre = Semestre::whereIn('id', $semestre_id)->get();

        // Récupération des notes pour verifier si l'etudiant a des notes dans le semestre selectionne
        $notesCount = Note::whereHas('inscription', function($query) use($etudiant) {
            $query->where('etudiant_id', $etudiant->id);
        })->whereHas('matiere', function($query) use($semestre_id) {
            $query->whereIn('semestre_id', $semestre_id);
        })->count();

        // dd($notesCount);

        if ($notesCount !== 10) {
            return redirect()->back()->with('error', "L'etudiant n'a pas ses notes au complet ! le relevé ne peut pas être imprimer");
        }

        // Vérifiez si le relevé existe pour cet étudiant
        $releveNote = ReleveNote::where('etudiant_id', $etudiant->id)->first();
        if (!$releveNote) {
            return redirect()->back()->with('error', 'Aucun relevé trouvé pour cet étudiant.');
        }
    
        // Récupération des notes
        $notes = Note::whereHas('inscription', function($query) use($etudiant) {
            $query->where('etudiant_id', $etudiant->id);
        })->whereHas('matiere', function($query) use($semestre_id) {
            $query->whereIn('semestre_id', $semestre_id);
        })->get();
    
        // Récupération des matières
        $matieres_id = Note::whereHas('inscription', function($query) use($etudiant) {
            $query->where('etudiant_id', $etudiant->id);
        })->whereHas('matiere', function($query) use($semestre_id) {
            $query->whereIn('semestre_id', $semestre_id);
        })->pluck('matiere_id');
    
        $matieres = Matiere::whereIn('id', $matieres_id)->get();

        // Récupération des inscriptions
        $inscriptions_id = Note::whereHas('inscription', function($query) use($etudiant) {
            $query->where('etudiant_id', $etudiant->id);
        })->whereHas('matiere', function($query) use($semestre_id) {
            $query->whereIn('semestre_id', $semestre_id);
        })->pluck('inscription_id')->unique();
    
        $etudiants = Inscription::whereIn('id', $inscriptions_id)->get();

        // Récupération du numéro de référence
        $nf = $releveNote->reference_id;
        $numeroreference = Reference::where('id', $nf)->first();

        return view('scolarite.printReleveAnnuel.index', [
            "notes" => $notes,
            'etudiants' => $etudiants,
            "matieres" => $matieres,
            "semestre" => $semestre,
            "etudiant" => $etudiant,
            "numeroreference" => $numeroreference,
            "services" => Service::all(),
        ]);
    }

}
