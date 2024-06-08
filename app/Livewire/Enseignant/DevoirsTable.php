<?php

namespace App\Livewire\Enseignant;

use App\Models\Devoir;
use App\Models\Publication;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithFileUploads;

class DevoirsTable extends Component
{
    use WithFileUploads;

    //Les propriétés pour la table devoir
    public Devoir $devoir;
    public $titre;
    public $publication_id;
    public $fichier;

    //Règle de validation pour l'ajout d'un devoir
    public function rulesDevoirs() {
        return [
            'titre' => ['required', 'string', 'min:5'],
            'publication_id' => ['required'],
            'fichier' => !is_string($this->fichier) ? ['nullable','mimes:pdf'] : [],

        ];
    }

    
    public function resetError(){
        $this->resetErrorBag();
    }

    public function resetChamps(){
        $this->reset();
        $this->resetError();
    }

    public function edit(Devoir $devoir) {
        $this->devoir = $devoir;
        $this->publication_id = $devoir->publication_id;
        $this->titre = $devoir->titre;
        $this->fichier = $devoir->fichier;

    }

    //Fonction pour la modification d'un devoir
    public function update() {
        $data = $this->validate($this->rulesDevoirs());
        if (!is_string($this->fichier) && $this->fichier !== null) {
            Storage::disk('public')->delete($this->fichier);
            $timestamp = Carbon::now()->format('Ymd_His');
            $nouveau_nom = $timestamp . '_' . $this->fichier->getClientOriginalName();
            $data['fichier'] = $this->fichier->storeAs('devoirs', $nouveau_nom, 'public');
        }
        $this->devoir->update($data);
        $this->reset();
        session()->flash('success', 'Devoir modifié avec succès!');
    }

    public function delete(Devoir $devoir) {
        Storage::disk('public')->delete($devoir->fichier);
        $devoir->delete();
        session()->flash('successDelete', 'Suppression effectuée avec succès!');
    }


    #[Layout("components.layouts.template-enseignant")]
    public function render()
    {
        // Récupère l'identifiant de l'enseignant connecté (remplacez par la méthode appropriée pour obtenir l'enseignant connecté)
        $enseignantMatricule = 'E2024CFM';

        // Récupère les publications de l'enseignant à partir de son matricule en exploitant
        //la relation (cour) de la table publication et la relation (enseignant) de la table cour
        $publicationIds = Publication::whereHas('cour', function ($query) use ($enseignantMatricule) {
            $query->whereHas('enseignant', function($query) use ($enseignantMatricule){
                $query->where('matricule', $enseignantMatricule);
            });
        })->pluck('id');

        // Récupère tous les devoirs a partir des id des publications recuperés
        $devoirs = Devoir::whereIn('publication_id', $publicationIds)->get();
       
        return view('livewire.enseignant.devoirs-table',[
            'devoirs' => $devoirs
        ]);
    }
}
