<?php

namespace App\Livewire\Scolarite;

use App\Models\AnneeUniversitaire;
use App\Models\Etudiant;
use App\Models\Inscription;
use App\Models\Niveau;
use App\Models\Programme;
use App\Models\Promotion;
use App\Models\Recu;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithFileUploads;

class EditInscription extends Component
{
    use WithFileUploads;
    /**
     * etudiant: la propriété de type Etudiant, chargée de recuperer l'etudiant du fait
     * qu'on fait appel aux informations de l'etudiant à modifier comme
     * (son nom, son prenom...)
     *
     * @var Etudiant
     */
    public Etudiant $etudiant;
    /**
     * inscription: la propriété de type Inscription, chargée de recuperer les informations de
     * l'étudiant récupérer ci haut et ses autres informations dans la table inscriptions
     *
     * @var Inscription
     */
    public Inscription $inscription;

    /* les propriétés de la table this->etudiant */
    public $nom;
    public $prenom;
    public $telephone;
    public $email;
    public $photo;
    public $pv;
    public $ine;
    public $date_naissance;
    public $lieu_naissance;
    public $nom_tuteur;
    public $telephone_tuteur;
    public $adresse;
    public $mere;
    public $pere;

    /* les propriétés de la table inscription */
    public $annee_universitaire_id;
    public $promotion_id;
    public $niveau_id;
    public $programme_id;
    public $etudiant_id;
    public $recu_id;

    
    /**
     * rules: Règles de validation
     *
     * @return array
     */
    public function rules()
    {
        return [
            "etudiant_id" => ["required"],
            "promotion_id" => ["required"],
            "niveau_id" => ["required"],
            "annee_universitaire_id" => ["required"],
            "programme_id" => ["required"],
            
        ];
    }

        
    /**
     * mount: cette méthode d'initialiser toutes les propriétés dès la création du composant
     * à travers la méthode initialisation()
     *
     * @param  mixed $inscription
     * @return void
     */
    public function mount(Inscription $inscription)
    {
        $this->initialisation($inscription);
    }
    
    /**
     * cancel: la méthode qui se charge d'annuler l'action de modification
     *
     * @return redirect
     */
    public function cancel() {
        $this->clearStatus();
        return to_route('inscriptionetreinscription.index');
    }

    /**
     * initialisation: reçoit l'etudiant inscrit ou reinscrit à editer recherché,passer cet etudiant 
     * à la propriété $inscription et ses autres informations aux autres propriétés
     * car c'est sont ces propriétés qui sont liés aux champs de mon formulaire
     *
     * @param  Inscription $inscription
     * @return void
     */
    public function initialisation(Inscription $inscription)
    {
        $this->etudiant = $inscription->etudiant;
        $this->inscription = $inscription;


        $this->etudiant_id = $this->etudiant->id;
        $this->nom = $this->etudiant->nom;
        $this->prenom = $this->etudiant->prenom;
        $this->telephone = $this->etudiant->telephone;
        $this->email = $this->etudiant->email;
        $this->photo = $this->etudiant->photo;
        $this->pv = $this->etudiant->pv;
        $this->ine = $this->etudiant->ine;
        $this->pere = $this->etudiant->pere;
        $this->mere = $this->etudiant->mere;
        $this->date_naissance = $this->etudiant->date_naissance;
        $this->lieu_naissance = $this->etudiant->lieu_naissance;
        $this->photo = $this->etudiant->photo;
        $this->adresse = $this->etudiant->adresse;
        $this->nom_tuteur = $this->etudiant->nom_tuteur;
        $this->telephone_tuteur = $this->etudiant->telephone_tuteur;

        $this->annee_universitaire_id = $inscription->annee_universitaire_id;
        $this->programme_id = $inscription->programme_id;
        $this->niveau_id = $inscription->niveau_id;
        $this->promotion_id = $inscription->promotion_id;
        $this->recu_id = $inscription->recu->numrecu;



    }
    
    /**
     * update: la méthode de modification
     *
     * @return void
     */
    public function update()
    {
        $data = $this->validate();
        $this->inscription->update($data);

        if (!is_string($this->photo)) {
            if ($this->etudiant && $this->etudiant->photo) {
                Storage::disk('public')->delete($this->etudiant->photo);
            }
            $nouveau_nom = $this->photo->getClientOriginalName();
            $photoPath = $this->photo->storeAs('etudiants/etudiant', $nouveau_nom, 'public');
            if ($this->etudiant) {
                $this->etudiant->update(['photo' => $photoPath]);
            }
        }

        // Vérifier si l'étudiant existe
        if ($this->etudiant) {
            $this->etudiant->update([
                'telephone' => $this->telephone,
                'email' => $this->email,
                'nom_tuteur' => $this->nom_tuteur,
                'telephone_tuteur' => $this->telephone_tuteur,
                'adresse' => $this->adresse
            ]);
        }
        $this->reset();
        return redirect()->route('inscriptionetreinscription.index')->with('success', 'Enregistrement modifiée avec succès!');
    }

    public function clearStatus()
    {
        $this->resetErrorBag();
    }
   
    /**
     * render : la méthode qui rend le composant edit-inscription avec les
     * données des annee_universitaires, promotions, niveaux et programmes.
     *
     * @return view
     */
    #[Layout("components.layouts.template-scolarite")]    
    public function render()
    {

        return view('livewire.scolarite.edit-inscription',[
            'annee_universitaires' => AnneeUniversitaire::all(),
            'promotions' => Promotion::all(),
            'niveaux' => Niveau::all(),
            'programmes' => Programme::all(),
        ]);
    }
}
