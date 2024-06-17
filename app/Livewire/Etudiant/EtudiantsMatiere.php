<?php

namespace App\Livewire\Etudiant;

use App\Models\Inscription;
use App\Models\Matiere;
use App\Models\Programme;
use App\Models\Semestre;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Component;

class EtudiantsMatiere extends Component
{
    public Semestre $semestre;
    public $semestre_id;

    #[Layout("components.layouts.template-etudiant")]
    public function render()
    {
        $matricule = Auth::user()->matricule;
        $programmeId = Inscription::whereHas('etudiant', function($p) use($matricule){
            $p->where('ine', $matricule);
        })->pluck('programme_id');

        
        $semestres = Semestre::all();

        $matieres = Matiere::query()->where('programme_id', $programmeId)->orderBy('created_at', 'desc');
        if( $this->semestre_id)
            $matieres->where('semestre_id', $this->semestre_id);

        return view('livewire.etudiant.etudiants-matiere',[
            'matieres' => $matieres->get(),
            'semestres' => $semestres
        ]);
    }
}
