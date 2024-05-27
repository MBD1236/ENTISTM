<?php

namespace App\Livewire\Departements\TEB;

use App\Models\Enseignant;
use Livewire\Attributes\Layout;
use Livewire\Component;

class TebEnseignantsTables extends Component
{

    #[Layout("components.layouts.template-departements")]
    public function render()
    {
        $enseignants = Enseignant::query()->orderBy("created_at", "desc");
        $enseignants->whereHas('departement', function($e){
            $e->where('departement', 'Technologie des Equipements Biomédicaux');
        });
        return view('livewire.departements.t-e-b.teb-enseignants-tables',[
            'enseignants' => $enseignants->paginate(5)
        ]);
    }
}
