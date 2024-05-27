<?php

namespace App\Livewire\Departements\SE;

use App\Models\Matiere;
use App\Models\Semestre;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithPagination;

class SeMatieresTables extends Component
{
    use WithPagination;
    public $semestre_id;


    #[Layout("components.layouts.template-departements")]
    public function render()
    {
        $matieres = Matiere::query()->orderBy("created_at", "desc");
        $matieres->orWhereHas('programme', function($p) {
            $p->where('programme', "Energétique");
        });

        if ($this->semestre_id){
            $matieres->where('semestre_id', $this->semestre_id);
        }
        return view('livewire.departements.s-e.se-matieres-tables',[
            'matieres' =>  $matieres->paginate(5),
            'semestres' => Semestre::all()

        ]);
    }
}
