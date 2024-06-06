<?php

namespace App\Livewire\Billeterie;

use App\Models\Departement;
use App\Models\Etudiant;
use App\Models\NatureRecu;
use App\Models\Promotion;
use App\Models\Recu;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithFileUploads;

class BilleterieCreate extends Component
{
    use WithFileUploads;

    public $numerorecu;
    public $serie;
    public $modereglement;
    public $somme;
    public $estVisible;
    public $etudiant_id;
    public $nature_recu_id;
    public $departement_id;
    public $promotion_id;

    /**
     * mount: initialiser les propriétés du composant.
     *
     * @return void
    */
    public function mount()
    {
        $this->genererNumeroRecu();
    }

    
    /**
     * Rules : les règles de validation
     *
     * @return array
    */
    protected function rules() {
        return [
            "numerorecu" => ["required",],
            "serie" => ["required", "min:2"],
            "modereglement" => ["required", "min:2"],
            "somme" => ["required", "min:2"],
            "etudiant_id" => ['required', 'exists:etudiants,id'],
            "nature_recu_id" => ['required', 'exists:nature_recus,id'],
            "departement_id" => ['required', 'exists:departements,id'],
            "promotion_id" => ['required', 'exists:promotions,id'],
        ];
    }

    public function clearStatus()
    {
        $this->resetErrorBag();
    }

     /**
     * cancel: la méthode qui se charge d'annuler l'action de d'ajout
     * @return redirect
     */
    public function cancel() {
        $this->clearStatus();
        return to_route('billeterie.list');
    }

    /**
     * generateNumeroRecu: génère le prochain numéro de reçu basé sur le nombre de reçus existants.
     *
     * @return void
    */
    public function genererNumeroRecu()
    {
        $totalRecus = Recu::count();
        $this->numerorecu = str_pad($totalRecus + 1, 3, '0', STR_PAD_LEFT);
    }

    /**
     * store: enrégistrer une matricule
     *
     * @return void
    */
    public function store()
    {
        $data = $this->validate();
        Recu::create($data);
        $this->reset();
        return redirect()->route('billeterie.list')->with('success', 'Réçu enregistré avec succès!');
    }

    #[Layout("components.layouts.template-guichet")]
    public function render()
    {
        return view('livewire.billeterie.billeterie-create' , [
            'recu' => new Recu(),
            'total' => Recu::count(),
            'etudiants' => Etudiant::all(),
            'departements' => Departement::all(),
            'promotions' => Promotion::all(),
            'naturerecus' => NatureRecu::all(),
        ]);
    }
}
