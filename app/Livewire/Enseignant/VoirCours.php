<?php

namespace App\Livewire\Enseignant;

use App\Models\Cour;
use Livewire\Attributes\Layout;
use Livewire\Component;

class VoirCours extends Component
{
    public Cour $cour;

    public function mount($cour) {
        $this->cour = $cour;
    }
   
    #[Layout("components.layouts.template-enseignant")]
    public function render()
    {
        return view('livewire.enseignant.voir-cours');
    }
}
