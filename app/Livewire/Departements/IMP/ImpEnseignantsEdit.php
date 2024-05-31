<?php

namespace App\Livewire\Departements\IMP;

use App\Models\Departement;
use App\Models\Enseignant;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithFileUploads;

class ImpEnseignantsEdit extends Component
{
    use WithFileUploads;
    /**
     * @var Enseignant
    */
    public Enseignant $enseignant;

    /* les propriétés de la table enseignant du matricule */
    public $id;
    public $matricule;
    public $nom;
    public $prenom;
    public $telephone;
    public $email;
    public $adresse;
    public $photo;
    public $departement_id;

    /**
     * mount: cette méthode d'initialiser toutes les propriétés dès la création
     * du composant à travers la méthode initialisation()
     *
     * @param  mixed $enseignant
     * @return void
     */
    public function mount(Enseignant $enseignant)
    {
        $this->edit($enseignant);
    }


    /**
     * edit: initialise les propriétés
     * @param  Enseignant $enseignant
     * @return void
     */
    public function edit(Enseignant $enseignant) {
        $this->enseignant = $enseignant;
        $this->matricule = $enseignant->matricule;
        $this->prenom = $enseignant->prenom;
        $this->nom = $enseignant->nom;
        $this->telephone = $enseignant->telephone;
        $this->email = $enseignant->email;
        $this->adresse = $enseignant->adresse;
        $this->departement_id = $enseignant->departement_id;
        $this->photo= $enseignant->photo;
    }
    
    /**
    * rules : les règles de validations
    *
    * @return array
    */
    protected function rules() {
        return [
            "matricule" => ["required"],
            "nom" => ["required", "min:2"],
            "prenom" => ["required", "min:2"],
            "telephone" => ["required", "regex:/^([0-9\s\-\+\(\)]*)$/", "between:9,18"],
            "email" => ["required", "email"],
            "adresse" => ["required"],
            "departement_id" => ["required"],
            'photo' => !is_string($this->photo) ? ['nullable','image', 'mimes:jpg,jpeg,png,gif,svg', 'max:5000'] : [],
        ];
    }

    public function clearStatus()
    {
        $this->resetErrorBag();
    }
 
    /**
     * cancel: la méthode qui se charge d'annuler l'action de modification
     * @return redirect
    */
    public function cancel() {
        $this->clearStatus();
        return to_route('cfm.enseignants');
    }

    /**
     * update: la méthode de modification
     *
     * @return void
     */
    public function update()
    {
        $data = $this->validate();

        if ($this->photo && !is_string($this->photo)) {
            if ($this->enseignant && $this->enseignant->photo) {
                Storage::disk('public')->delete('enseignants/' . $this->enseignant->photo);
            }
            $photoSansExt = pathinfo($this->photo->getClientOriginalName(), PATHINFO_FILENAME);
            $nouveauNom = $photoSansExt . '_' . now()->format('YmdHis') . '.' . $this->photo->getClientOriginalExtension();
            $this->photo->storeAs('public/enseignants', $nouveauNom);
            $data['photo'] = $nouveauNom;
        } else {
            unset($data['photo']);
        }

        $this->enseignant->update($data);

        $this->reset();
        return redirect()->route('cfm.enseignants')->with('success', 'Enseignant modifiée avec succès!');
    }
   
    /**
     * @return view
     */
    #[Layout("components.layouts.template-departements")]
    public function render()
    {
        return view('livewire.departements.i-m-p.imp-enseignants-edit',[
            'departements' => Departement::where('departement', 'Instrumentation et Mesures Physiques')->get()
        ]);
    }
}

