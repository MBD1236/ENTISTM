<?php

namespace App\Livewire\Enseignant;

use App\Exports\EnseignantExportEtudiant;
use App\Models\Inscription;
use App\Models\Publication;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Maatwebsite\Excel\Facades\Excel;

class VoirEtudiants extends Component
{
    public $etudiants;
    public Publication $publication;

    public function mount(Publication $publication){
        $this->publication = $publication;
    }

    public function export() {
        return Excel::download(new EnseignantExportEtudiant(
            $this->publication->programme_id, $this->publication->niveau_id, $this->publication->promotion_id),
             'etudiants.xlsx');
    }

    #[Layout("components.layouts.template-enseignant")]
    public function render()
    {
        $this->etudiants = Inscription::where('programme_id', $this->publication->programme_id)
            ->where('niveau_id', $this->publication->niveau_id)
            ->where('promotion_id', $this->publication->promotion_id)->get();
        return view('livewire.enseignant.voir-etudiants',[
            'etudiants' => $this->etudiants
        ]);
    }
}
