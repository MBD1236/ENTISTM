<?php

namespace App\Livewire\Departements\CFM;

use App\Models\Inscription;
use App\Models\Matiere;
use App\Models\Niveau;
use App\Models\Note;
use App\Models\Semestre;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithPagination;

class CfmNotesEtudiantsSemestre extends Component
{
    use WithPagination;

    public $notes = [];
    public $matieres = [];
    public $semestre_id;
    public $niveau_id;
    public $promotion;

    #[Layout("components.layouts.template-departements")]
    public function render()
    {
        $etudiantsinscrits = Inscription::whereHas('programme', function($i){
            $i->where('programme', 'Conception et Fabrication Mécanique');
        })->paginate(1);

        if (!empty($this->niveau_id) && !empty($this->semestre_id) && !empty($this->promotion)) {
            $idmatieres = Note::whereHas('matiere', function ($mat) {
                $mat->where('semestre_id', $this->semestre_id)->whereHas('programme', function($m){
                    $m->where('programme', 'Conception et Fabrication Mécanique');
                });
            })->pluck('matiere_id')->unique();

            $idinscriptions = Note::whereHas('matiere', function ($mat) {
                $mat->where('semestre_id', $this->semestre_id);
            })->pluck('inscription_id')->unique();

            $etudiantsinscrits = Inscription::whereIn('id', $idinscriptions)->whereHas('promotion', function($p){
                $p->where('promotion', 'LIKE',  '%'.$this->promotion. '%');
            })->whereHas('programme', function($p){
                $p->where('programme', 'Conception et Fabrication Mécanique');
            })->paginate(25); // Appliquer la pagination

            $this->matieres = Matiere::whereIn('id', $idmatieres)->get();

            //je recupere toutes les notes en fonction des 3champs de filtre a la vue on verifiera 
            //la note correspondate pour chaque etudiant
            $this->notes = Note::query()
                ->whereHas('inscription', function ($e) {
                    $e->where('niveau_id', 'like', "%{$this->niveau_id}%");
                    $e->whereHas('promotion', function($p){
                        $p->where('promotion', $this->promotion);
                    });
                })
                ->whereHas('matiere', function ($e) {
                    $e->where('semestre_id','like', '%'.$this->semestre_id. '%');
                })
                ->get();

            $this->resetPage();
        }
        return view('livewire.departements.c-f-m.cfm-notes-etudiants-semestre',[
            'etudiantsinscrits' => $etudiantsinscrits,
            'niveaux' => Niveau::all(),
            'semestres' => Semestre::all(),
        ]);
    }
}
