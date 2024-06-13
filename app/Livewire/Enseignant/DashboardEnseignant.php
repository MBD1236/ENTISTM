<?php

namespace App\Livewire\Enseignant;

use App\Models\Cour;
use App\Models\Devoir;
use App\Models\Publication;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Component;

class DashboardEnseignant extends Component
{

    #[Layout("components.layouts.template-enseignant")]
    public function render()
    {
        $enseignant = Auth::user()->matricule;
        $cours = Cour::query()->whereHas('enseignant', function($e) use ($enseignant){
            $e->where('matricule', $enseignant);
        })->count();

        $publications = Publication::whereHas('cour', function($p) use($enseignant){
            $p->whereHas('enseignant', function($p) use($enseignant){
                $p->where('matricule', $enseignant);
            });
        })->count();

        $devoirs = Devoir::whereHas('publication', function($d) use($enseignant){
            $d->whereHas('cour', function($d) use($enseignant){
                $d->whereHas('enseignant', function($d) use($enseignant){
                    $d->where('matricule', $enseignant);
                });
            });
        })->count();

        return view('livewire.enseignant.dashboard-enseignant',[
            'cours' => $cours,
            'publications' => $publications,
            'devoirs' => $devoirs
        ]);
    }
}
