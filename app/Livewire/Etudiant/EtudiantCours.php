<?php

namespace App\Livewire\Etudiant;

use App\Models\Cour;
use App\Models\Inscription;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Component;

class EtudiantCours extends Component
{
    public Cour $cour;

    public function mount($cour) {
        $this->cour = $cour;
    }

    #[Layout("components.layouts.template-etudiant")]
    public function render()
    {
        return view('livewire.etudiant.etudiant-cours');
    }
}
