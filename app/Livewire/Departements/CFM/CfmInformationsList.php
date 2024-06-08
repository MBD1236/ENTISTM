<?php

namespace App\Livewire\Departements\CFM;

use App\Models\InformationDepartement;
use Livewire\Attributes\Layout;
use Livewire\Component;

class CfmInformationsList extends Component
{
    #[Layout("components.layouts.template-departements")]
    public function render()
    {
        $informations = InformationDepartement::query()->orderBy("created_at","desc")->paginate(10);
        return view('livewire.departements.c-f-m.cfm-informations-list',[
            'informations' => $informations
        ]);
    }
}
