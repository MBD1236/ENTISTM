<?php

namespace App\Livewire\Administrateur;

use App\Models\Departement;
use Illuminate\Validation\Rule;
use Livewire\Attributes\Layout;
use Livewire\Component;

class DepartementsTables extends Component
{
    public Departement $departements;
    public $departement;

    public function rules() {
        return [
            'departement' => ['required','string', 'regex:([a-z])', 'unique:departements'],
        ];
    }

    public function rulesEdit() {
        return [
            'departement' => ['required','string', 'regex:([a-z])', Rule::unique('departements')->ignore($this->departements->id, 'id')],
        ];
    }

    public function resetError(){
        $this->resetErrorBag();
    }

    public function resetChamps(){
        $this->reset();
        $this->resetError();
    }

    public function edit(Departement $departements) {
        $this->departements = $departements;
        $this->departement = $departements->departement;
    }

    public function store() {

        $data = $this->validate($this->rules());
        Departement::create($data);
        $this->reset();
        session()->flash('success', 'Ajout effectué avec succès!');

    }
    public function update() {
        $data = $this->validate($this->rulesEdit());
        $this->departements->update($data);
        $this->reset();
        session()->flash('successUpdate', 'Modification effectuée avec succès!');
    }
    public function delete(Departement $departement) {
        try {
            $departement->delete();
            session()->flash('successDelete', 'Suppression effectuée avec succès!');
        } catch (\Throwable $th) {
            session()->flash('errorDelete', "Une erreur s'est produite :" . $th->getMessage());
        }
    }

    #[Layout("components.layouts.template-administrateur")]
    public function render()
    {
        $departements = Departement::orderBy('created_at', 'desc')->paginate(6);
        return view('livewire.administrateur.departements-tables',[
            'departementss' => $departements
        ]);
    }
}
