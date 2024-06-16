<?php

namespace App\Livewire\Scolarite;

use App\Models\AnneeUniversitaire;
use App\Models\Inscription;
use App\Models\Promotion;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithPagination;

class InscriptionTables extends Component
{
    use WithPagination;

    public $searchEtudiant = '';
    public $promotion_id = null;
    public $annee_universitaire_id = null;

    /**
     * delete: la méthode de suppression d'une inscription
     *
     * @param  Inscription $inscription
     * @return void
     */
    public function delete(Inscription $inscription) {
        $inscription->delete();
        session()->flash('success', 'Suppression effectuée avec succès!');
    }

    public function updating($name, $value)
    {
        if ($name === 'searchEtudiant' || $name === 'promotion_id' || $name === 'annee_id') {
            $this->resetPage();
        }
    }

    #[Layout("components.layouts.template-scolarite")]
    public function render()
    {
        $query = Inscription::query()->orderBy('created_at', 'desc')
            ->when($this->searchEtudiant, function ($query) {
                $query->where(function ($query) {
                    $query->orWhereHas('etudiant', function ($query) {
                        $query->where('ine', 'LIKE', "%{$this->searchEtudiant}%");
                    })
                    ->orWhereHas('promotion', function ($query) {
                        $query->where('promotion', 'LIKE', "%{$this->searchEtudiant}%");
                    })
                    ->orWhereHas('annee_universitaire', function ($query) {
                        $query->where('session', 'LIKE', '%' . $this->searchEtudiant . '%');
                    })
                    ->orWhereHas('programme', function ($query) {
                        $query->where('programme', 'LIKE', "%{$this->searchEtudiant}%");
                    })
                    ->orWhereHas("niveau", function ($query) {
                        $query->where("niveau", "LIKE", "%{$this->searchEtudiant}%");
                    });
                });
            })
            ->when($this->promotion_id, function ($query) {
                $query->whereHas('promotion', function ($query) {
                    $query->where('id', $this->promotion_id);
                });
            })
            ->when($this->annee_universitaire_id, function ($query) {
                $query->whereHas('annee_universitaire', function ($query) {
                    $query->where('id', $this->annee_universitaire_id);
                });
            })
            ->orderBy('created_at','desc');

        return view('livewire.scolarite.inscription-tables', [
            'inscriptions' => $query->paginate(10),
            'annee_universitaires' => AnneeUniversitaire::all(),
            'promotions' => Promotion::all(),
        ]);
    }
}