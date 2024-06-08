<?php

namespace App\Livewire\Departements\IMP;

use App\Models\InformationDepartement;
use Livewire\Attributes\Layout;
use Livewire\Component;

class ImpInformationsList extends Component
{
    #[Layout("components.layouts.template-departements")]
    public function render()
    {
        $informations = InformationDepartement::query()->orderBy("created_at","desc")->paginate(10);
        return view('livewire.departements.i-m-p.imp-informations-list',[
            'informations' => $informations
        ]);
    }
}
