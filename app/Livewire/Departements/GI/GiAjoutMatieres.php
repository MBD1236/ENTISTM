<?php

namespace App\Livewire\Departements\GI;

use App\Models\Matiere;
use App\Models\Programme;
use App\Models\Semestre;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Validate;
use Livewire\Component;

class GiAjoutMatieres extends Component
{
   
    public $matiere;
    public $semestre_id;
    public $programme_id;

    public function rules() {
        return [
            'matiere' => ['required'],
            'semestre_id' => ['required'],
            'programme_id' => ['required'],
        ];
    }
    

    public function clearStatus()
    {
        $this->resetErrorBag();
    }

    public function cancel() {
        $this->clearStatus();
        return redirect()->route('genieinfo.matieres');
    }

    public function store() {
        Matiere::create($this->validate());
        $this->reset();
        session()->flash('success', 'Ajout effectué avec succès!');
        return redirect()->route('genieinfo.matiereS');
    }
    
    #[Layout("components.layouts.template-departements")]
    public function render()
    {
        return view('livewire.departements.g-i.gi-ajout-matieres',[
            'semestres' => Semestre::all(),
            'programmes' => Programme::whereHas('departement', function($d){
                $d->where('departement', 'Génie Informatique');
            })->get()
        ]);
    }
}
