<?php

namespace App\Livewire\Etudiant;

use App\Models\Devoir;
use Livewire\Attributes\Layout;
use Livewire\Component;

class EtudiantDevoirs extends Component
{
    public Devoir $devoir;

    public function mount($devoir) {
        $this->devoir = $devoir;
    }

    #[Layout("components.layouts.template-etudiant")]
    public function render()
    {
        return view('livewire.etudiant.etudiant-devoirs');
    }
}
