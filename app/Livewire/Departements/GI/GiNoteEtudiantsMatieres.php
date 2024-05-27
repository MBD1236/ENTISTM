<?php

namespace App\Livewire\Departements\GI;

use App\Models\Matiere;
use App\Models\Niveau;
use App\Models\Note;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithPagination;

class GiNoteEtudiantsMatieres extends Component
{
    use WithPagination;

    public $matiere_id;
    public $promotion;
    public $niveau_id;
    
    
    #[Layout("components.layouts.template-departements")]
    public function render()
    {
        $notes = Note::whereHas('inscription', function($i){
            $i->whereHas('programme', function($i){
                $i->where('programme', 'Génie Informatique');
            });
        })->paginate(1);
        if (!empty($this->matiere_id) && !empty($this->niveau_id) && !empty($this->promotion)) {
            $notes = Note::where('matiere_id', $this->matiere_id)
                    ->whereHas('inscription', function ($e) {
                            $e->where('niveau_id', 'LIKE', "%{$this->niveau_id}%");
                            $e->whereHas('promotion', function($e) {
                                $e->where('promotion', 'LIKE', "%{$this->promotion}%");
                            });
                    })->paginate(25);
        }
        return view('livewire.departements.g-i.gi-note-etudiants-matieres',[
            'notes' => $notes,
            'niveaux' => Niveau::all(),
            'matieres' => Matiere::whereHas('programme', function($m){
                $m->where('programme', 'Génie Informatique');
            })->get(),
        ]);
    }
}
