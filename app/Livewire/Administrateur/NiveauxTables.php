<?php

namespace App\Livewire\Administrateur;

use App\Models\Niveau;
use Illuminate\Validation\Rule;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithPagination;

class NiveauxTables extends Component
{
    use WithPagination;
    public Niveau $niveaux;
    public $niveau;

    public function rules() {
        return [
            'niveau' => ['required','string','unique:niveaux'],
        ];
    }
    public function rulesEdit() {
        return [
            'niveau' => ['required','string', Rule::unique('niveaux')->ignore($this->niveau->id, 'id')],
        ];
    }

    public function resetError(){
        $this->resetErrorBag();
    }

    public function resetChamps(){
        $this->reset();
        $this->resetError();
    }

    public function edit(Niveau $niveau) {
        $this->niveaux = $niveau;
        $this->niveau = $niveau->niveau;
    }

    public function store() {
        $data = $this->validate($this->rules());
        Niveau::create($data);
        $this->reset();
        session()->flash('success', 'Ajout effectué avec succès!');
    }
    public function update() {
        $data = $this->validate($this->rulesEdit());
        $this->niveaux->update($data);
        $this->reset();
        session()->flash('successUpdate', 'Modification effectuée avec succès!');
    }
    public function delete(Niveau $niveau) {
        try {
            $niveau->delete();
            session()->flash('successDelete', 'Suppression effectuée avec succès!');
        } catch (\Throwable $th) {
            session()->flash('errorDelete', "Une erreur s'est produite :" . $th->getMessage());
        }
    }

    #[Layout("components.layouts.template-administrateur")]
    public function render()
    {
        $niveauxx = Niveau::orderBy('created_at', 'desc')->paginate(10);
        return view('livewire.administrateur.niveaux-tables',[
            'niveauxx' => $niveauxx
        ]);
    }
}
