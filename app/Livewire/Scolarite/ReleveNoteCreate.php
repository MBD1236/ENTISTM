<?php

namespace App\Livewire\Scolarite;

use App\Models\Etudiant;
use App\Models\Inscription;
use App\Models\Reference;
use App\Models\ReleveNote;
use Illuminate\Http\Request;
use Livewire\Component;

class ReleveNoteCreate extends Component
{
    /**
     * generateNumeroRef: génère le prochain numéro de reçu basé sur le nombre de reçus existants.
     *
     * @return void
    */
    // public function genererNumeroRef()
    // {
    //     $totalRecus = Reference::count();
    //     $this->numeroRef = str_pad($totalRecus + 1, 3, '0', STR_PAD_LEFT);
    // }

    /**
     * Show the form for creating a new resource.
    */
    public function create(Request $request)
    {
        $request->validate([
            'etudiant' => ['required'],
        ]);
    
        $ine = $request->input('etudiant');

        $etudiant = Etudiant::where('id', $ine)->first(); // Rechercher l'étudiant basé sur l'id
    
        if ($etudiant) {
            // Rechercher l'inscription basée sur l'ID de l'étudiant
            $inscription = Inscription::where('etudiant_id', $etudiant->id)->first();
    
            if ($inscription) {
                return view('scolarite.releves.form', [
                    'etudiant' => $etudiant
                ]);
            } else {
                return redirect()->back()->withErrors(['etudiant' => 'Inscription non trouvée.']);
            }
        } else {
            return redirect()->back()->withErrors(['etudiant' => 'Étudiant non trouvé.']);
        }
    }
    
    // pour la methode store
    public function store(Request $request)
    {
        $request->validate([
            'reference_id' => ['required'],
            'ine' => ['required'],
            'prenom' => ['required'],
            'nom' => ['required'],
            'telephone' => ['required'],
            'programme' => ['required'],
        ]);
        
        // Enregistrer le numéro de référence dans la base de données
        $reference = new Reference();
        $reference->numero = $request->input('reference_id');
        $reference->save();

        // Enregistrer le relevé de note
        $releve = new ReleveNote();
        $releve->reference_id = $reference->id;
        $releve->etudiant_id = Etudiant::where('ine', $request->input('ine'))->first()->id;
        $releve->prenom = $request->input('prenom');
        $releve->nom = $request->input('nom');
        $releve->telephone = $request->input('telephone');
        $releve->programme = $request->input('programme');
        $releve->save();

        // Effacer le numéro de référence de la session après l'enregistrement
        $request->session()->forget('numeroRef');
        return redirect()->route('scolarite.releve.index')->with('success', 'Relevé de note enregistré avec succès.');
    }

    public function render()
    {
        return view('livewire.scolarite.releve-note-create');
    }
}
