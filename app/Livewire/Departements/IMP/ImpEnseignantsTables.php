<?php

namespace App\Livewire\Departements\IMP;

use App\Models\Enseignant;
use Livewire\Attributes\Layout;
use Livewire\Component;

class ImpEnseignantsTables extends Component
{
   
    #[Layout("components.layouts.template-departements")]
    public function render()
    {
        $enseignants = Enseignant::query()->orderBy("created_at", "desc");
        $enseignants->whereHas('departement', function($e){
            $e->where('departement', 'Instrumentation et Mesures Physiques');
        });
        return view('livewire.departements.i-m-p.imp-enseignants-tables',[
            'enseignants' => $enseignants->paginate(5)
        ]);
    }
}
