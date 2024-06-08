<?php

namespace App\Livewire\Departements\TEB;

use App\Models\InformationDepartement;
use Livewire\Attributes\Layout;
use Livewire\Component;

class TebInformationsList extends Component
{
   
    #[Layout("components.layouts.template-departements")]
    public function render()
    {
        $informations = InformationDepartement::query()->orderBy("created_at","desc")->paginate(10);
        return view('livewire.departements.t-e-b.teb-informations-list',[
            'informations' => $informations
        ]);
    }
}
