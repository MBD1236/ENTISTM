<?php

namespace App\Livewire\Administrateur;

use App\Models\AnneeUniversitaire;
use Illuminate\Validation\Rule;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithPagination;

class AnneeUniversitairesTables extends Component
{
    use WithPagination;
    public AnneeUniversitaire $anneeuniversitaire;
    public $session;

    public function rules() {
        return [
            'session' => ['required','string', 'unique:annee_universitaires'],
        ];
    }
    public function rulesEdit() {
        return [
            'session' => ['required','string', Rule::unique('annee_universitaires')->ignore($this->anneeuniversitaire->id, 'id')],
        ];
    }

    public function resetError(){
        $this->resetErrorBag();
    }

    public function resetChamps(){
        $this->reset();
        $this->resetError();
    }

    public function edit(AnneeUniversitaire $anneeuniversitaire) {
        $this->anneeuniversitaire = $anneeuniversitaire;
        $this->session = $anneeuniversitaire->session;
    }

    public function store() {
        $data = $this->validate($this->rules());
        AnneeUniversitaire::create($data);
        $this->reset();
        session()->flash('success', 'Ajout effectué avec succès!');
    }
    public function update() {
        $data = $this->validate($this->rulesEdit());
        $this->annee_universitaires->update($data);
        $this->reset();
        session()->flash('successUpdate', 'Modification effectuée avec succès!');
    }
    public function delete(AnneeUniversitaire $anneeuniversitaire) {
        try {
            $anneeuniversitaire->delete();
            session()->flash('successDelete', 'Suppression effectuée avec succès!');
        } catch (\Throwable $th) {
            session()->flash('errorDelete', "Une erreur s'est produite :" . $th->getMessage());
        }
    }

    #[Layout("components.layouts.template-administrateur")]
    public function render()
    {
        $anneeuniversitaires = AnneeUniversitaire::orderBy('created_at', 'desc')->paginate(6);
        return view('livewire.administrateur.annee-universitaires-tables',[
            'anneeuniversitaires' => $anneeuniversitaires
        ]);
    }
}
