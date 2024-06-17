<?php

namespace App\Livewire\Administrateur;

use App\Models\Semestre;
use Illuminate\Validation\Rule;
use Livewire\Attributes\Layout;
use Livewire\Component;

class SemestresTables extends Component
{
    public Semestre $semestres;
    public $semestre;

    public function rules() {
        return [
            'semestre' => ['required','string','unique:semestres'],
        ];
    }
    public function rulesEdit() {
        return [
            'semestre' => ['required','string', Rule::unique('semestres')->ignore($this->semestres->id, 'id')],
        ];
    }

    public function resetError(){
        $this->resetErrorBag();
    }

    public function resetChamps(){
        $this->reset();
        $this->resetError();
    }

    public function edit(Semestre $semestre) {
        $this->semestres = $semestre;
        $this->semestre = $semestre->semestre;
    }

    public function store() {
        $data = $this->validate($this->rules());
        Semestre::create($data);
        $this->reset();
        session()->flash('success', 'Ajout effectué avec succès!');
    }
    public function update() {
        $data = $this->validate($this->rulesEdit());
        $this->semestres->update($data);
        $this->reset();
        session()->flash('successUpdate', 'Modification effectuée avec succès!');
    }
    public function delete(Semestre $semestre) {
        try {
            $semestre->delete();
            session()->flash('successDelete', 'Suppression effectuée avec succès!');
        } catch (\Throwable $th) {
            session()->flash('errorDelete', "Une erreur s'est produite :" . $th->getMessage());
        }
    }

    #[Layout("components.layouts.template-administrateur")]
    public function render()
    {
        $semestress = Semestre::orderBy('created_at', 'desc')->paginate(10);
        return view('livewire.administrateur.semestres-tables',[
            'semestress' => $semestress
        ]);
    }
}
