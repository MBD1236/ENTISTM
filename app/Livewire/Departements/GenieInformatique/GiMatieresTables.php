<?php

namespace App\Livewire\Departements\GenieInformatique;

use App\Models\Matiere;
use App\Models\Semestre;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithPagination;

class GiMatieresTables extends Component
{
    use WithPagination;
    public $semestre_id;

    #[Layout("components.layouts.template-departements")]
    public function render()
    {
        $matieres = Matiere::query()->orderBy("created_at", "desc");
        $matieres->orWhereHas('programme', function($p) {
            $p->where('programme', "Génie Informatique");
        });

        if ($this->semestre_id){
            $matieres->where('semestre_id', $this->semestre_id);
        }
        
        return view('livewire.departements.genie-informatique.gi-matieres-tables',[
            'matieres' =>  $matieres->paginate(5),
            'semestres' => Semestre::all()
        ]);
    }
}
