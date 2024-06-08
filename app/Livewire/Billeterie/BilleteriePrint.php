<?php

namespace App\Livewire\Billeterie;

use App\Models\NatureRecu;
use App\Models\Promotion;
use App\Models\Recu;
use Livewire\Attributes\Layout;
use Livewire\Component;

class BilleteriePrint extends Component
{
    public Recu $recu;
   
    public $search = '';

    #[Layout("components.layouts.template-guichet")]
    public function render()
    {
        $recus = Recu::query()
        ->when($this->search, function ($query) {
            $query->where('numerorecu', 'like', '%'.$this->search.'%')
                ->orWhereHas('etudiant', function ($query) {
                    $query->where('ine', 'like', '%'.$this->search.'%')
                        ->orWhere('prenom', 'like', '%'.$this->search.'%')
                        ->orWhere('nom', 'like', '%'.$this->search.'%');
                });
        })->paginate(10);

        return view('livewire.billeterie.billeterie-print', [
            'recus' => $recus,
        ]);
    }
}
