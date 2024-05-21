<?php

namespace App\Livewire\Departements\GenieInformatique;

use App\Models\Matiere;
use App\Models\Niveau;
use App\Models\Note;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithPagination;

class NoteEtudiantsMatieres extends Component
{
    use WithPagination;

    public $matiere_id;
    public $promotion;
    public $niveau_id;
    
    
    #[Layout("components.layouts.template-departements")]
    public function render()
    {
        $notes = Note::paginate(1);
        if (!empty($this->matiere_id) && !empty($this->niveau_id) && !empty($this->promotion)) {
            $notes = Note::where('matiere_id', $this->matiere_id)
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
                    ->paginate(25);
        }
        return view('livewire.departements.genie-informatique.note-etudiants-matieres',[
            'notes' => $notes,
            'niveaux' => Niveau::all(),
            'matieres' => Matiere::all(),
        ]);
    }
}
