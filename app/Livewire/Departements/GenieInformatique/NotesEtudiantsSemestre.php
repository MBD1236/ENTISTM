<?php

namespace App\Livewire\Departements\GenieInformatique;

use App\Models\Etudiant;
use App\Models\Inscription;
use App\Models\Matiere;
use App\Models\Niveau;
use App\Models\Note;
use App\Models\Semestre;
use Livewire\Attributes\Layout;
use Livewire\Component;

class NotesEtudiantsSemestre extends Component
{
    public $notes = [];
    public $etudiantsinscrits = [];
    public $matieres = [];
    public $semestre_id;
    public $niveau_id;

    public function afficherNotesS()
    {    
        
        if (!empty($this->niveau_id) && !empty($this->semestre_id)) {
            $idmatieres = Note::whereHas('matiere', function($mat) {
                $mat->where('semestre_id', $this->semestre_id);
            })->pluck('matiere_id')->unique();
    
            $idinscriptions = Note::whereHas('matiere', function($mat) {
                $mat->where('semestre_id', $this->semestre_id);
            })->pluck('inscription_id')->unique();
           
            $this->etudiantsinscrits = Inscription::whereIn('id', $idinscriptions)->get();
           
    
            $this->matieres = Matiere::whereIn('id', $idmatieres)->get();

            $this->notes = Note::query()
                ->whereHas('inscription', function ($e) {
                    $e->where('niveau_id', 'LIKE', "%{$this->niveau_id}%");
                })
                ->whereHas('matiere', function ($e) {
                    $e->where('semestre_id', 'LIKE', "%{$this->semestre_id}%");
                })
                ->get();
           
        }
        

    }

    #[Layout("components.layouts.template-departements")]
    public function render()
    {
        return view('livewire.departements.genie-informatique.notes-etudiants-semestre', [
            'niveaux' => Niveau::all(),
            'semestres' => Semestre::all(),
        ]);
    }
}
