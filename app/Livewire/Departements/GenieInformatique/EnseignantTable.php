<?php

namespace App\Livewire\Departements\GenieInformatique;

use App\Models\Departement;
use App\Models\Enseignant;
use Livewire\Attributes\Layout;
use Livewire\Component;

class EnseignantTable extends Component
{
    #[Layout("components.layouts.template-departements")]
    public function render()
    {
        return view('livewire.departements.genie-informatique.enseignant-table', [
            'enseignants' => Enseignant::orderBy('created_at', 'desc')->paginate(20),
            'departements' => Departement::all()
        ]);
    }
}
