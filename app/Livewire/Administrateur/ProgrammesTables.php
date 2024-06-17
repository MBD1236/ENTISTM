<?php

namespace App\Livewire\Administrateur;

use App\Models\Departement;
use App\Models\Programme;
use Illuminate\Validation\Rule;
use Livewire\Attributes\Layout;
use Livewire\Component;

class ProgrammesTables extends Component
{
    public Programme $programmes;
    public $programme;
    public $departement_id;

    public function rules() {
        return [
            'programme' => ['required','string', 'regex:([a-z])', 'unique:programmes'],
            'departement_id' => ['required'],
        ];
    }
    public function rulesEdit() {
        return [
            'programme' => ['required','string', 'regex:([a-z])', Rule::unique('programmes')->ignore($this->programmes->id, 'id')],
            'departement_id' => ['required'],
        ];
    }

    public function resetError(){
        $this->resetErrorBag();
    }

    public function resetChamps(){
        $this->reset();
        $this->resetError();
    }

    public function edit(Programme $programmes) {
        $this->programmes = $programmes;
        $this->programme = $programmes->programme;
        $this->departement_id = $programmes->departement_id;
    }

    public function store() {

        $data = $this->validate($this->rules());
        Programme::create($data);
        $this->reset();
        session()->flash('success', 'Ajout effectué avec succès!');

    }
    public function update() {
        $data = $this->validate($this->rulesEdit());
        $this->programmes->update($data);
        $this->reset();
        session()->flash('successUpdate', 'Modification effectuée avec succès!');
    }
    public function delete(Programme $programme) {
        try {
            $programme->delete();
            session()->flash('successDelete', 'Suppression effectuée avec succès!');
        } catch (\Throwable $th) {
            session()->flash('errorDelete', "Une erreur s'est produite :" . $th->getMessage());
        }
    }

    #[Layout("components.layouts.template-administrateur")]
    public function render()
    {
        $programmess = Programme::orderBy('created_at', 'desc');
        return view('livewire.administrateur.programmes-tables',[
            'programmess' => $programmess->paginate(7),
            'departements' => Departement::all()
        ]);
    }
}
