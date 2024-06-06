<?php

namespace App\Livewire\Etudiant;

use Livewire\Attributes\Layout;
use Livewire\Component;

class InformationsTable extends Component
{

    #[Layout("components.layouts.template-etudiant")]
    public function render()
    {
        return view('livewire.etudiant.informations-table');
    }
}
