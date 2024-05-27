<?php

namespace App\Livewire\Departements\CFM;

use App\Models\Enseignant;
use Livewire\Attributes\Layout;
use Livewire\Component;

class CfmEnseignantsTables extends Component
{
    
    #[Layout("components.layouts.template-departements")]
    public function render()
    {
        $enseignants = Enseignant::query()->orderBy("created_at", "desc");
        $enseignants->whereHas('departement', function($e){
            $e->where('departement', 'Conception et Fabrication Mécanique');
        });

        return view('livewire.departements.c-f-m.cfm-enseignants-tables',[
            'enseignants' => $enseignants->paginate(5)
        ]);
    }
}
