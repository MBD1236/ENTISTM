<?php

namespace App\Livewire\Departements\GenieInformatique;

use App\Models\Note;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Validate;
use Livewire\Component;

class EditNotes extends Component
{
    public Note $note;
    public $matiere_id;

    #[Validate('required|integer')]
    public $note1;

    #[Validate('required|integer')]
    public $note2;

    #[Validate('required|integer')]
    public $note3;
    public $nom;
    public $prenom;
    public $matricule;

    #[Validate('required|integer')]
    public $moyenne_generale;

    public function mount(Note $note) {
        $this->note = $note;
        $this->matiere_id = $note->matiere->matiere;
        $this->note1 = $note->note1;
        $this->note2 = $note->note2;
        $this->note3 = $note->note3;
        $this->nom = $note->inscription->etudiant->nom;
        $this->matricule = $note->inscription->etudiant->ine;
        $this->prenom = $note->inscription->etudiant->prenom;
        $this->moyenne_generale = $note->moyenne_generale;
    }

    public function clearStatus()
    {
        $this->resetErrorBag();
    }

    public function cancel() {
        $this->clearStatus();
        return redirect()->route('genieinfo.notes.matiere');
    }

    public function update() {
        $this->note->update($this->validate());
        $this->reset();
        session()->flash('success', 'Modification effectuée avec succès!');
        return redirect()->route('genieinfo.notes.matiere');
    }


    #[Layout("components.layouts.template-departements")]
    public function render()
    {
        return view('livewire.departements.genie-informatique.edit-notes');
    }
}
