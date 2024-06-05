<?php

namespace App\Livewire\Enseignant;

use App\Models\Cour;
use App\Models\Devoir;
use App\Models\Niveau;
use App\Models\Programme;
use App\Models\Promotion;
use App\Models\Publication;
use Carbon\Carbon;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithFileUploads;

class PublicationsTable extends Component
{
    use WithFileUploads;
    
    public $publication;
    public $promotion_id;
    public $programme_id;
    public $niveau_id;
    public $cour_id;


    //Les propriétés pour la table devoir
    public $titre;
    public $publication_id;
    public $fichier;


    public function rules() {
        return [
            'promotion_id' => ['required'],
            'programme_id' => ['required'],
            'niveau_id' => ['required'],
            'cour_id' => ['required'],
        ];
    }

    //Règle de validation pour l'ajout d'un devoir
    public function rulesDevoirs() {
        return [
            'titre' => ['required', 'string', 'min:5'],
            'publication_id' => ['required'],
            'fichier' => ['required', 'file', 'mimes:pdf']
        ];
    }

    //Pour recuperer l'identifiant de la publication
    public function setDevoir(int $id) {
        $this->publication_id = $id;
    }
    //Fonction pour l'ajout d'un devoir
    public function storeDevoir() {
        $data = $this->validate($this->rulesDevoirs());
        if ($this->fichier) {
            $timestamp = Carbon::now()->format('Ymd_His');
            $nouveau_nom = $timestamp . '_' . $this->fichier->getClientOriginalName();
            $data['fichier'] = $this->fichier->storeAs('devoirs', $nouveau_nom, 'public');
        }
        Devoir::create($data);
        $this->reset();
        session()->flash('success', 'Devoir associé avec succès!');
    }

    public function resetError(){
        $this->resetErrorBag();
    }

    public function resetChamps(){
        $this->reset();
        $this->resetError();
    }

    public function edit(Publication $publication) {
        $this->publication = $publication;
        $this->cour_id = $publication->cour_id;
        $this->programme_id = $publication->programme_id;
        $this->promotion_id = $publication->promotion_id;
        $this->niveau_id = $publication->niveau_id;
    }

    public function update(Publication $publication){
        $data = $this->validate();
        $this->publication->update($data);
        $this->reset();
        session()->flash('success', 'Modification effectuée avec succès!');
    }

    public function delete(Publication $publication) {
        $publication->delete();
        session()->flash('successDelete', 'Suppression effectuée avec succès!');

    }
    #[Layout("components.layouts.template-enseignant")]
    public function render()
    {
        // Récupère l'identifiant de l'enseignant connecté (remplacez par la méthode appropriée pour obtenir l'enseignant connecté)
        $enseignantMatricule = 'E2024CFM';

        // Récupère l'identifiant de l'enseignant à partir de son matricule
        $enseignantIds = Cour::whereHas('enseignant', function ($query) use ($enseignantMatricule) {
            $query->where('matricule', $enseignantMatricule);
        })->pluck('enseignant_id')->unique();
        
        // Récupère les identifiants des cours enregistrés par cet enseignant
        $coursIds = Cour::whereIn('enseignant_id', $enseignantIds)->pluck('id');

        // Récupère toutes les publications associées à ces cours en une seule requête
        $publications = Publication::whereIn('cour_id', $coursIds)->get();
        
        return view('livewire.enseignant.publications-table', [
            'publications' => $publications,
            'promotions' => Promotion::all(),
            'programmes' => Programme::all(),
            'niveaux' => Niveau::all(),
        ]);
    }

}
