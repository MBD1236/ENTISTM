<?php

namespace App\Livewire\Departements\GenieInformatique;

use App\Models\Enseignant;
use Livewire\Attributes\Layout;
use Livewire\Component;

class GiEnseignantsTables extends Component
{
    
    #[Layout("components.layouts.template-departements")]
    public function render()
    {
        $enseignants = Enseignant::query()->orderBy("created_at", "desc");
        $enseignants->whereHas('departement', function($e){
            $e->where('departement', 'Génie Informatique');
        });

        return view('livewire.departements.genie-informatique.gi-enseignants-tables',[
            'enseignants' => $enseignants->paginate(5)
        ]);
    }
}
