<?php

namespace App\Livewire\Departements\GI;


use App\Models\AnneeUniversitaire;
use App\Models\EmploiTemps as ModelsEmploiTemps;
use App\Models\Matiere;
use App\Models\Programme;
use App\Models\Promotion;
use App\Models\Semestre;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithFileUploads;
use Maatwebsite\Excel\Excel;

class GIEmploiTemps extends Component
{
    use WithFileUploads;

    public $fichier;
    public $matiere_id;
    public $annee_universitaire_id;
    public $promotion_id;
    public $semestre_id;

    public function clearStatus()
    {
        $this->resetErrorBag();
    }

    #[Layout("components.layouts.template-departements")]
    public function render()
    {
        $emploisTempsQuery = ModelsEmploiTemps::query();

        if ($this->promotion_id) {
            $emploisTempsQuery->where('promotion_id', $this->promotion_id);
        }

        if ($this->annee_universitaire_id) {
            $emploisTempsQuery->where('annee_universitaire_id', $this->annee_universitaire_id);
        }

        if ($this->semestre_id) {
            $emploisTempsQuery->where('semestre_id', $this->semestre_id);
        }

        $emploisTemps = $emploisTempsQuery->paginate(10);

        return view('livewire.departements.g-i.g-i-emploi-temps', [
            "matieres" => Matiere::whereHas('programme', function($query){
                $query->where('programme', 'Génie Informatique')
                      ->orWhere('programme', 'Genie Informatique');
            })->get(),
            'emploisTemps' => $emploisTemps,
            'promotions' => Promotion::all(),
            'annee_universitaires' => AnneeUniversitaire::all(),
            'semestres' => Semestre::all(),
            'programmes' => Programme::all(),
        ]);
    }
}
