<?php

namespace App\Livewire\Departements\GI;

use App\Models\Enseignant;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\Layout;
use Livewire\Component;

class GIEnseignantsShow extends Component
{
    public Enseignant $enseignant;
    /* les propriétés de la table enseignant */
    public $matricule;
    public $nom;
    public $prenom;
    public $telephone;
    public $email;
    public $adresse;
    public $departement_id;
    public $photo;

    /**
     * show: initialise les propriétés
     * @param  Enseignant $enseignant
     * @return void
    */
    public function show(Enseignant $enseignant) {
        $this->enseignant = $enseignant;
        $this->matricule = $enseignant->matricule;
        $this->nom = $enseignant->nom;
        $this->prenom = $enseignant->prenom;
        $this->telephone = $enseignant->telephone;
        $this->email = $enseignant->email;
        $this->adresse = $enseignant->adresse;
        $this->departement_id = $enseignant->departement_id;
        $this->photo= $enseignant->photo;
    }

    // methode de suppression
    public function destroy($id)
    {
         $enseignant = Enseignant::findOrFail($id);
        if ($enseignant->photo) {
            Storage::disk('public')->delete('enseignants/'.$enseignant->photo);
        }
        $enseignant->delete();
        return redirect()->route('genieinfo.enseignant.list')->with('success','Enseignant supprimé avec succès');
    }


    #[Layout("components.layouts.template-departements")]
    public function render()
    {
        return view('livewire.departements.g-i.g-i-enseignants-show');
    }
}
