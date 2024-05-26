<?php

namespace App\Livewire\Departements\CFM;

use App\Models\Matiere;
use App\Models\Semestre;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithPagination;

class CfmMatieresTables extends Component
{
    use WithPagination;
    public $semestre_id;

    #[Layout("components.layouts.template-departements")]
    public function render()
    {
        $matieres = Matiere::query()->orderBy("created_at", "desc");
        $matieres->orWhereHas('programme', function($p) {
            $p->where('programme', "Conception et Fabrication Mécanique");
        });

        if ($this->semestre_id){
            $matieres->where('semestre_id', $this->semestre_id);
        }
        return view('livewire.departements.c-f-m.cfm-matieres-tables',[
            'matieres' =>  $matieres->paginate(5),
            'semestres' => Semestre::all()
        ]);
    }
}
