<?php

namespace App\Livewire\Scolarite;

use App\Models\Etudiant;
use Livewire\Attributes\Layout;
use Livewire\Component;

class ReleveNote extends Component
{
    #[Layout("components.layouts.template-scolarite")]    
    public function render()
    {
        return view('livewire.scolarite.releve-note', [
            "relevenotes" => ReleveNote::all(),
        ]);
    }
}
