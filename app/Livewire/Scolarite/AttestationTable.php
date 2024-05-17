<?php

use App\Models\AnneeUniversitaire;
use App\Models\Attestation;
use App\Models\Niveau;
use App\Models\Programme;
use Livewire\Attributes\Layout;
use Livewire\Component;

class AttestationTable extends Component
{

    public $niveau = 0;
    public $programme = 0;
    public $annee_universitaire = 0;
        
    #[Layout("components.layouts.template-scolarite")]
    public function render()
    {
        $query = Attestation::query()->with('niveau')->orderBy('created_at', 'desc');

        if ($this->programme !== 0) {
            $query->where('programme_id', $this->programme);
        }

        if ($this->niveau !== 0) {
            $query->whereHas('niveau', function ($q) {
                $q->where('id', $this->niveau);
            });
        }

        // Filtrage par année universitaire
        if ($this->annee_universitaire !== 0) {
            $query->where("annee_universitaire_id", $this->annee_universitaire);
        }

        $attestations = $query->paginate(20);

        return view('livewire.scolarite.attestation-table' , [
            'attestations'=> $attestations,
            'programmes' => Programme::all(),
            'niveaux' => Niveau::orderBy('created_at', 'desc')->paginate(5),
            'annee_universitaires' => AnneeUniversitaire::orderBy('created_at', 'desc')->paginate(5),
        ]);
    }
}