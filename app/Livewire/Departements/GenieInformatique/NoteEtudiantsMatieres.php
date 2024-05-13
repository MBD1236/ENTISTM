<?php

namespace App\Livewire\Departements\GenieInformatique;

use App\Models\Matiere;
use App\Models\Niveau;
use App\Models\Note;
use Livewire\Attributes\Layout;
use Livewire\Component;

class NoteEtudiantsMatieres extends Component
{
    public $matiere_id;
    public $promotion;
    public $niveau_id;
    public $notes = [];

    public function afficherNotes() {
        $this->notes = Note::where('matiere_id', $this->matiere_id)
                ->where(function ($e) {
                    $e->orWhereHas('inscription', function ($e) {
                        $e->where('niveau_id', 'LIKE', "%{$this->niveau_id}%");
                    });
                    $e->orWhereHas('inscription', function ($e) {
                        $e->orWhereHas('promotion', function($e) {
                            $e->where('promotion', 'LIKE', "%{$this->promotion}%");
                        });
                    });
                })
                ->get();
    }


    #[Layout("components.layouts.template-departements")]
    public function render()
    {
        return view('livewire.departements.genie-informatique.note-etudiants-matieres',[
            'niveaux' => Niveau::all(),
            'matieres' => Matiere::all(),
        ]);
    }
}
