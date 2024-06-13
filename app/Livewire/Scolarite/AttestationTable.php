<?php

use App\Models\AnneeUniversitaire;
use App\Models\Attestation;
use App\Models\Niveau;
use App\Models\Programme;
use Livewire\Attributes\Layout;
use Livewire\Component;

class AttestationTable extends Component
{

    public $niveau_id = 0;
    public $semestre_id = 0;
    public $annee_universitaire_id = 0;
        
    #[Layout("components.layouts.template-scolarite")]
    public function render()
    {
        $query = Attestation::query()->with(['niveau', 'programme', 'anneeUniversitaire'])->orderBy('created_at', 'desc');

        if ($this->annee_universitaire_id) {
            $query->where('annee_universitaire_id', $this->annee_universitaire_id);
        }

        if ($this->programme_id) {
            $query->where('programme_id', $this->programme_id);
        }

        if ($this->niveau_id) {
            $query->where('niveau_id', $this->niveau_id);
        }

        $attestations = $query->paginate(20);

        return view('livewire.scolarite.attestation-table', [
            'attestations' => $attestations,
            'programmes' => Programme::all(),
            'niveaux' => Niveau::all(),
            'annee_universitaires' => AnneeUniversitaire::all(),
        ]);
    }
}