<?php

namespace App\Livewire\Scolarite;

use App\Models\Etudiant;
use Livewire\Attributes\Layout;
use Livewire\Component;

class ViewDocuments extends Component
{

    public $diplomeVisible = false;
    public $relevenotesVisible = false;
    public $certificatnationaliteVisible = false;
    public $certificatmedicalVisible = false;
    public $extraitnaissanceVisible = false;
    public $photoVisible = false;
    public Etudiant $etudiant;


    public function mount(Etudiant $etudiant) {
        $this->etudiant = $etudiant;
    }

    public function toggleDiplomeVisibility()
    {
        $this->diplomeVisible = !$this->diplomeVisible;
    }

    public function toggleReleveNotesVisibility()
    {
        $this->relevenotesVisible = !$this->relevenotesVisible;
    }

    public function toggleCertificatNationaliteVisibility()
    {
        $this->certificatnationaliteVisible =!$this->certificatnationaliteVisible; 
    }
    public function toggleCertificatMedicalVisibility()
    {
        $this->certificatmedicalVisible =!$this->certificatmedicalVisible; 
    }
    public function toggleExtraitNaissanceVisibility()
    {
        $this->extraitnaissanceVisible =!$this->extraitnaissanceVisible; 
    }
    public function togglephotoVisibility()
    {
        $this->photoVisible =!$this->photoVisible; 
    }

    #[Layout("components.layouts.template-scolarite")]
    public function render()
    {
        return view('livewire.scolarite.view-documents');
    }
}
