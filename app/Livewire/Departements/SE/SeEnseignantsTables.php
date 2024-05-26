<?php

namespace App\Livewire\Departements\SE;

use App\Models\Enseignant;
use Livewire\Attributes\Layout;
use Livewire\Component;

class SeEnseignantsTables extends Component
{
    
    #[Layout("components.layouts.template-departements")]
    public function render()
    {
        $enseignants = Enseignant::query()->orderBy("created_at", "desc");
        $enseignants->whereHas('departement', function($e){
            $e->where('departement', 'Sciences des Energies');
        });
        return view('livewire.departements.s-e.se-enseignants-tables',[
            'enseignants' => $enseignants->paginate(5)
        ]);
    }
}
