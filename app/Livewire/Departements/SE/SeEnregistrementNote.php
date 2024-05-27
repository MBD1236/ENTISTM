<?php

namespace App\Livewire\Departements\SE;

use App\Imports\NoteImport;
use App\Models\Matiere;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithFileUploads;
use Maatwebsite\Excel\Facades\Excel;

class SeEnregistrementNote extends Component
{
    use WithFileUploads;

    public $fichier;
    public $matiere_id;


     /**
     * rules: Règles de validation du fichier à importer
     *
     * @var array
     */
    protected $rules = [
        'fichier' => ['required'],
        'matiere_id' => ['required']
    ];

    public function importer() {
        $this->validate();
        try {
            if($this->fichier) {
                Excel::import(new NoteImport($this->matiere_id), $this->fichier);
                $this->reset('fichier');
                session()->flash('success', 'Import effectué avec succès!');

            }
        } catch (\Throwable $th) {
            session()->flash('danger', "Echec de l'import !");
        }

    }

    public function clearStatus()
    {
        $this->resetErrorBag();
    }
  
 
    #[Layout("components.layouts.template-departements")]
    public function render()
    {
        return view('livewire.departements.s-e.se-enregistrement-note',[
            "matieres"=> Matiere::whereHas('programme', function($p){
                $p->where('programme', 'Energétique');
            }),
        ]);
    }
}
