<?php

namespace App\Livewire\Administrateur;

use App\Models\AnneeUniversitaire;
use Illuminate\Validation\Rule;
use Livewire\Attributes\Layout;
use Livewire\Component;

class AnneeUniversitairesTables extends Component
{
    public AnneeUniversitaire $anneeuniversitaire;
    public $session;

    public function rules() {
        return [
            'session' => ['required','string', 'regex:([a-z])', 'unique:anneeuniversitaires'],
        ];
    }
    public function rulesEdit() {
        return [
            'session' => ['required','string', 'regex:([a-z])', Rule::unique('anneeuniversitaires')->ignore($this->anneeuniversitaire->id, 'id')],
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
        $this->anneeuniversitaires->update($data);
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
