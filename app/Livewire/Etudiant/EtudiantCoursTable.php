<?php

namespace App\Livewire\Etudiant;

use App\Models\Devoir;
use App\Models\Inscription;
use App\Models\Publication;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Component;

class EtudiantCoursTable extends Component
{
    #[Layout("components.layouts.template-etudiant")]
    public function render()
    {
        $matricule = Auth::user()->matricule;
        $promotionId = Inscription::whereHas('etudiant', function($p) use($matricule){
            $p->where('ine', $matricule);
        })->pluck('promotion_id');
        $programmeId = Inscription::whereHas('etudiant', function($p) use($matricule){
            $p->where('ine', $matricule);
        })->pluck('programme_id');
        $niveauId = Inscription::whereHas('etudiant', function($p) use($matricule){
            $p->where('ine', $matricule);
        })->pluck('niveau_id');
        
        $devoirs = Devoir::all();
        $cours = Publication::whereIn('programme_id', $programmeId)->whereIn('promotion_id', $promotionId)->whereIn('niveau_id', $niveauId)->get();
        return view('livewire.etudiant.etudiant-cours-table',[
            'cours' => $cours,
            'devoirs' => $devoirs
        ]);
    }
}
