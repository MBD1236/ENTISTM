<?php

namespace App\Livewire\Departements\CFM;

use App\Models\InformationDepartement;
use Livewire\Attributes\Layout;
use Livewire\Component;

class CfmInformationsShow extends Component
{
    public InformationDepartement $information;
    /* les propriétés de la table information du departement */
    public $id;
    public $departement;
    public $code;
    public $telephone;
    public $email;
    public $adresse;
    public $photo;
    public $description;

    /**
     * show: initialise les propriétés
     * @param  InformationDepartement $information
     * @return void
    */
    public function show(InformationDepartement $information) {
        $this->information = $information;
        $this->departement = $information->departement;
        $this->code = $information->code;
        $this->telephone = $information->telephone;
        $this->email = $information->email;
        $this->adresse = $information->adresse;
        $this->description = $information->description;
        $this->photo= $information->photo;
    }
    
    #[Layout("components.layouts.template-departements")]
    public function render()
    {
        return view('livewire.departements.c-f-m.cfm-informations-show');
    }
}
