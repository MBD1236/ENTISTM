<?php

namespace App\Livewire\Departements\GI;

use App\Models\InformationDepartement;
use Livewire\Attributes\Layout;
use Livewire\Component;

class GIInformationsList extends Component
{
    #[Layout("components.layouts.template-departements")]
    public function render()
    {
        $informations = InformationDepartement::query()->orderBy("created_at","desc")->paginate(10);
        return view('livewire.departements.g-i.g-i-informations-list', [
            'informations' => $informations
        ]);
    }
}
