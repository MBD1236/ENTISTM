<?php

namespace App\Livewire\Scolarite;

use App\Models\Departement;
use App\Models\Inscription;
use App\Models\Matiere;
use App\Models\Niveau;
use App\Models\Note;
use App\Models\Programme;
use App\Models\Semestre;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithPagination;

class EtudiantsNotes extends Component
{
    use WithPagination;

    public $notes = [];
    public $matieres = [];
    public $departement_id;
    public $programme_id;
    public $semestre_id;
    public $niveau_id;
    public $promotion;
    public $searchE;

    #[Layout("components.layouts.template-scolarite")]
    public function render()
    {
        $etudiantsinscrits = Inscription::paginate(1);

        $programme = Programme::all();
        if ($this->departement_id) {
            $programme = Programme::where('departement_id', $this->departement_id)->get();
        }

        if (!empty($this->departement_id) && !empty($this->programme_id) && !empty($this->niveau_id) && !empty($this->semestre_id) && !empty($this->promotion)) {

            //recuperer les identifiants des matieres qui appartienent au semestre selectionné
            $idmatieres = Note::whereHas('matiere', function ($mat) {
                $mat->where('semestre_id', $this->semestre_id)
                ->where('programme_id', $this->programme_id);
            })->pluck('matiere_id')->unique();

            /*recuperer les identifiants des etudiants qui ont une note dans une matiere qui appartient
            au semestre selectionné */
            $idinscriptions = Note::whereHas('matiere', function ($mat) {
                $mat->where('semestre_id', $this->semestre_id);
            })->pluck('inscription_id')->unique();

            //filtrer ces etudiants en fonction du programme, de la promotion
            $etudiantsinscrits = Inscription::whereIn('id', $idinscriptions)
                ->where('programme_id', $this->programme_id)
                ->whereHas('promotion', function($p){
                        $p->where('promotion', 'LIKE',  '%'.$this->promotion. '%');
                })->paginate(25); // Appliquer la pagination

            //recuperer les matieres a travers les identifiants recupérés ci haut
            $this->matieres = Matiere::whereIn('id', $idmatieres)->get();

            /* recuperer les notes en fonction du niveau, du programme, de la promotion et du semestre
            Au niveau de la vue une condition spécifique sera fait pour avoir la note de chaque etudiant
            dans chaque matière*/
            $this->notes = Note::query()
                ->whereHas('inscription', function ($e) {
                    $e->where('niveau_id', 'like', "%{$this->niveau_id}%");
                    $e->where('programme_id', 'like', "%{$this->programme_id}%");
                    $e->whereHas('promotion', function ($p){
                        $p->where('promotion', $this->promotion);
                    });
                })
                ->whereHas('matiere', function ($e) {
                    $e->where('semestre_id','like', '%'.$this->semestre_id. '%');
                })->get();

            //filtrer le tableau final en fonction du critère choisi
            if ($this->searchE){
                $etudiantsinscrits = Inscription::whereIn('id', $idinscriptions)
                ->where('programme_id', $this->programme_id)
                ->whereHas('promotion', function($p){
                        $p->where('promotion', 'LIKE',  '%'.$this->promotion. '%');
                })
                ->whereHas('etudiant', function($e){
                    $e->where('nom', $this->searchE);
                    $e->orWhere('ine', $this->searchE);
                    $e->orWhere('prenom', $this->searchE);
                })
                ->paginate(25);
            }
            $this->resetPage();
        }

        return view('livewire.scolarite.etudiants-notes',[
            'etudiantsinscrits' => $etudiantsinscrits,
            'niveaux' => Niveau::all(),
            'semestres' => Semestre::all(),
            'departements' => Departement::all(),
            'programmes' => $programme,
        ]);
    }
}
