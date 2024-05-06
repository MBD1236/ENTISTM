<?php

namespace App\Livewire\Departements\GenieInformatique;

use Livewire\Attributes\Layout;
use Livewire\Component;

class EnregistrementNote extends Component
{
    #[Layout("components.layouts.template-departements")]
    public function render()
    {
        return view('livewire.departements.genie-informatique.enregistrement-note');
    }
}
