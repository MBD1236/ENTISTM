<?php

namespace App\Livewire\Departements\SE;

use App\Models\Etudiant;
use App\Models\Niveau;
use App\Models\Programme;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithPagination;

class SeEtudiantsTables extends Component
{
    use WithPagination;
    
    public string $session = '';
    public $niveau = 0;
    public $searchProgramme = 0;
    public $search = '';

   
    #[Layout("components.layouts.template-departements")]
    public function render()
    {
         // 1- pour un debut je retourne la liste des etudiants inscrits au departement Energétique
         $etudiant = Etudiant::query()->orderBy("created_at","desc");
         $etudiant->where('programme', "Energétique");
 
         //2- On filtre les etudiants du departement Energétique par programme donné
         if ($this->searchProgramme !== 0){
             $etudiant->where('programme_id', $this->searchProgramme);
         }
 
         //3- On filtre les etudiants du departement Energétique par niveau donné
         if ($this->session !== '') {
             $etudiant->where(function ($query) {
                 $query->where('session', 'like', '%'.$this->session. '%');
             });
            //  $this->resetPage();
         }
 
         // Ajoutez cette condition pour la recherche globale
         if ($this->search !== '') {
             $etudiant->where(function ($query) {
                 $query->where('nom', 'like', '%' . $this->search . '%')
                 ->orWhere('prenom', 'like', '%' . $this->search . '%')
                 ->orWhere('telephone', 'like', '%' . $this->search . '%')
                 ->orWhere('email', 'like', '%' . $this->search . '%')
                 ->orWhere('programme', 'like', '%' . $this->search . '%')
                 ->orWhere('ine', 'like', '%' . $this->search . '%');
             });
 
         }
 
         $etudiants = $etudiant->paginate(25);
        return view('livewire.departements.s-e.se-etudiants-tables',[
            'etudiants' => $etudiants,
            'niveaux' => Niveau::all(),
            'programmes' => Programme::all(),
        ]);
    }
}
