<?php

namespace App\Livewire\Departements\CFM;

use App\Models\Inscription;
use App\Models\Niveau;
use App\Models\Programme;
use Livewire\Attributes\Layout;
use Livewire\Component;

class CfmInscriptionsTables extends Component
{
    public string $session = '';
    public $niveau = 0;
    public $searchProgramme = 0;
    public $search = '';


    
    
    #[Layout("components.layouts.template-departements")]
    public function render()
    {
        // 1- pour un debut je retourne la liste des etudiants inscrits au departement Génie Informatique
        $inscription = Inscription::query()->orderBy("created_at", "desc");
        $inscription->orWhereHas('programme', function ($query) {
            $query->whereHas('departement', function ($d) {
                $d->where('departement', 'Conception et Fabrication Mécanique');
            });
        });

        //2- On filtre les etudiants du departement Génie Informatique par programme donné
        if ($this->searchProgramme !== 0) {
            $inscription->where('programme_id', $this->searchProgramme);
        }

        //3- On filtre les etudiants du departement Génie Informatique par session donnée
        if ($this->session !== '') {
            $inscription->where(function ($query) {
                $query->where('annee_universitaire_id', 'like', '%' . $this->session . '%');
            });
        }

        //4- On filtre les etudiants du departement Génie Informatique par niveau donné
        if ($this->niveau !== 0) {
            $inscription->where('niveau_id', $this->niveau);
        }

        // Ajoutez cette condition pour la recherche globale
        if ($this->search !== '') {
            $inscription->orWhereHas('etudiant', function ($query) {
                $query->where('nom', 'like', '%' . $this->search . '%')
                ->orWhere('prenom', 'like', '%' . $this->search . '%')
                ->orWhere('telephone', 'like', '%' . $this->search . '%')
                ->orWhere('email', 'like', '%' . $this->search . '%')
                ->orWhere('programme', 'like', '%' . $this->search . '%')
                ->orWhere('ine', 'like', '%' . $this->search . '%');
            });
        }

        $inscriptions = $inscription->paginate(25);
        return view('livewire.departements.c-f-m.cfm-inscriptions-tables',[
            'inscriptions' => $inscriptions,
            'niveaux' => Niveau::all(),
            'programmes' => Programme::whereHas('departement', function($p){
                $p->where('departement', 'Conception et Fabrication Mécanique');
            })->get()
        ]);
    }
}
