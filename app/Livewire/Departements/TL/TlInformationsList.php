<?php

namespace App\Livewire\Departements\TL;

use App\Models\InformationDepartement;
use Livewire\Attributes\Layout;
use Livewire\Component;

class TlInformationsList extends Component
{
    
    #[Layout("components.layouts.template-departements")]
    public function render()
    {
        $informations = InformationDepartement::query()->orderBy("created_at","desc")->paginate(10);
        return view('livewire.departements.t-l.tl-informations-list',[
            'informations' => $informations
        ]);
    }
}
