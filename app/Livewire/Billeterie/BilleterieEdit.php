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

class BilleterieEdit extends Component
{
    use WithFileUploads;
    public Recu $recu;

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
     * mount: cette méthode d'initialiser toutes les propriétés dès la création
     * du composant à travers la méthode initialisation()
     *
     * @param  mixed $recu
     * @return void
     */
    public function mount(Recu $recu)
    {
        $this->initialisation($recu);
    }

    /**
     * Rules : les règles de validation
     *
     * @return array
    */
    protected function rules() {
        return [
            "numerorecu" => ["required"],
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
     * @param  Recu $recu
     * @return void
     */
    public function initialisation(Recu $recu)
    {
        $this->recu = $recu;
        $this->numerorecu = $recu->numerorecu;
        $this->serie = $recu->serie;
        $this->modereglement = $recu->modereglement;
        $this->somme = $recu->somme;
        $this->etudiant_id = $recu->etudiant_id;
        $this->nature_recu_id = $recu->nature_recu_id;
        $this->departement_id = $recu->departement_id;
        $this->promotion_id = $recu->promotion_id;
    }

    /**
     * store: enrégistrer une matricule
     *
     * @return void
    */
    public function update()
    {
        $data = $this->validate();  
        $this->recu->update($data);
        $this->reset();
        return redirect()->route('billeterie.list')->with('success', 'Réçu modifié avec succès!');
    }

    #[Layout("components.layouts.template-guichet")]
    public function render()
    {
        return view('livewire.billeterie.billeterie-edit', [
            'departements' => Departement::all(),
            'etudiants' => Etudiant::all(),
            'promotions' => Promotion::all(),
            'naturerecus' => NatureRecu::all(),
        ]);
    }
}
