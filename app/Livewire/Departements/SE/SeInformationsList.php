<?php

namespace App\Livewire\Departements\SE;

use App\Models\InformationDepartement;
use Livewire\Attributes\Layout;
use Livewire\Component;

class SeInformationsList extends Component
{
    #[Layout("components.layouts.template-departements")]
    public function render()
    {
        $informations = InformationDepartement::query()->orderBy("created_at","desc")->paginate(10);
        return view('livewire.departements.s-e.se-informations-list',[
            'informations' => $informations
        ]);
    }
}
