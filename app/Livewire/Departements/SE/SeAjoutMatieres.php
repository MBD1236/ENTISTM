<?php

namespace App\Livewire\Departements\SE;

use App\Models\Matiere;
use App\Models\Programme;
use App\Models\Semestre;
use Livewire\Attributes\Layout;
use Livewire\Component;

class SeAjoutMatieres extends Component
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
        return redirect()->route('scienceenergie.matieres');
    }

    public function store() {
        Matiere::create($this->validate());
        $this->reset();
        session()->flash('success', 'Ajout effectué avec succès!');
        return redirect()->route('scienceenergie.matieres');
    }
   
    #[Layout("components.layouts.template-departements")] 
    public function render()
    {
        return view('livewire.departements.s-e.se-ajout-matieres',[
            'semestres' => Semestre::all(),
            'programmes' => Programme::whereHas('departement', function($d){
                $d->where('departement', 'Sciences des Energies');
            })->get()
        ]);
    }
}
