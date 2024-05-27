<?php

namespace App\Livewire\Departements\GI;

use App\Models\Departement;
use App\Models\Enseignant;
use Livewire\Attributes\Layout;
use Livewire\Component;

class GIEnseignantsList extends Component
{
    #[Layout("components.layouts.template-departements")]
    public function render()
    {
        $enseignants = Enseignant::query()->orderBy("created_at", "desc");
        $enseignants->whereHas('departement', function($e){
            $e->where('departement', 'Génie Informatique');
        });

        return view('livewire.departements.g-i.g-i-enseignants-list',[
            'enseignants' => $enseignants->paginate(5),
            'departements' => Departement::all(),
        ]);
    }
}
