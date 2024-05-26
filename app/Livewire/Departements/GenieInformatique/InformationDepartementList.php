<?php

namespace App\Livewire\Departements\GenieInformatique;

use App\Models\InformationDepartement;
use Livewire\Attributes\Layout;
use Livewire\Component;

class InformationDepartementList extends Component
{
    #[Layout("components.layouts.template-departements")]
    public function render()
    {
        $informations = InformationDepartement::query()->orderBy("created_at","desc")->paginate(10);
        return view('livewire.departements.genie-informatique.information-departement-list', [
            'informations' => $informations
        ]);
    }
}
