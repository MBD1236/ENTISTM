<?php

namespace App\Livewire\Departements\TL;

use App\Models\Matiere;
use App\Models\Programme;
use App\Models\Semestre;
use Livewire\Attributes\Layout;
use Livewire\Component;

class TlEditMatieres extends Component
{
    public Matiere $matieres;
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

    public function mount(Matiere $matiere) {
        $this->matieres = $matiere;

        $this->matiere = $matiere->matiere;
        $this->semestre_id = $matiere->semestre_id;
        $this->programme_id = $matiere->programme_id;
    }

    public function clearStatus()
    {
        $this->resetErrorBag();
    }

    public function cancel() {
        $this->clearStatus();
        return redirect()->route('tl.matieres');
    }

    public function update() {
        $this->matieres->update($this->validate());
        $this->reset();
        session()->flash('success', 'Modification effectuée avec succès!');
        return redirect()->route('tl.matieres');
    }

    #[Layout("components.layouts.template-departements")]
    public function render()
    {
        return view('livewire.departements.t-l.tl-edit-matieres',[
            'semestres' => Semestre::all(),
            'programmes' => Programme::whereHas('departement', function($d){
                $d->where('departement', 'Techniques de Laboratoires');
            })->get()
        ]);
    }
}