<?php

namespace App\Livewire\Etudiant;

use App\Models\Etudiant;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Component;

class InformationsTable extends Component
{

    #[Layout("components.layouts.template-etudiant")]
    public function render()
    {
        $matricule = Auth::user()->matricule;
        $etudiant = Etudiant::where('ine', $matricule)->first();
        return view('livewire.etudiant.informations-table',[
            'etudiant' => $etudiant
        ]);
    }
}
