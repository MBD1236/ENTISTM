<?php

namespace App\Livewire\Enseignant;

use App\Models\Devoir;
use Livewire\Attributes\Layout;
use Livewire\Component;

class VoirDevoir extends Component
{
    public Devoir $devoir;

    public function mount(Devoir $devoir) {
        $this->devoir = $devoir;
    }
    #[Layout("components.layouts.template-enseignant")]
    public function render()
    {
        return view('livewire.enseignant.voir-devoir');
    }
}
