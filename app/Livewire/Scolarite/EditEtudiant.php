<?php

namespace App\Livewire\Scolarite;

use App\Models\Etudiant;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithFileUploads;

class EditEtudiant extends Component
{
    use WithFileUploads;

    /**
     * etudiant: la propriété de type Etudiant, chargée de recuperer l'etudiant du fait
     * qu'on fait appel aux informations de l'etudiant à modifier
     * 
     * @var Etudiant
     */
    public Etudiant $etudiant;

    /* les propriétés de ma table etudiant (pour cabler les champs de mon formulaire */   
    public $nom;
    public $prenom;
    public $telephone;
    public $email;
    public $photo;
    public $pv;
    public $ine;
    public $session;
    public $profil;
    public $centre;
    public $ecole_origine;
    public $date_naissance;
    public $lieu_naissance;
    public $pere;
    public $mere;
    public $programme;
    public $nom_tuteur;
    public $telephone_tuteur;
    public $adresse;
    public $diplome;
    public $releve_notes;
    public $certificat_nationalite;
    public $certificat_medical;
    public $extrait_naissance;

    
    /**
     * mount: cette méthode permet d'initialiser toutes les propriétés dès la création du composant
     * à travers la méthode edit()
     *
     * @param  mixed $etudiant
     * @return void
     */
    public function mount(Etudiant $etudiant) {
        $this->edit($etudiant);
    }

    /**
     * clearStatus: elle se charge de reinitialiser les erreurs de validation
     * dans les champs du formulaire, elle est appélée au clic de l'un des champs
     * et son appel déclenche le reset des erreurs de validation
     *
     * @return void
     */
    public function clearStatus()
    {
        $this->resetErrorBag();
    }
        
    /**
     * cancel: elle se charge d'annuler l'édition de l'etudiant
     *
     * @return void
     */
    public function cancel() {
        $this->clearStatus();
        return redirect()->route('scolarite.orientation');
    }
    
    /**
     * edit: initialise les propriétés
     * @param  Etudiant $etudiant
     * @return void
     */
    public function edit(Etudiant $etudiant) {
        $this->etudiant = $etudiant;
        $this->nom = $etudiant->nom;
        $this->prenom= $etudiant->prenom;
        $this->telephone= $etudiant->telephone;
        $this->email= $etudiant->email;
        $this->photo= $etudiant->photo;
        $this->pv= $etudiant->pv;
        $this->ine= $etudiant->ine;
        $this->session= $etudiant->session;
        $this->profil= $etudiant->profil;
        $this->centre= $etudiant->centre;
        $this->ecole_origine= $etudiant->ecole_origine;
        $this->date_naissance= $etudiant->date_naissance;
        $this->lieu_naissance = $etudiant->lieu_naissance;
        $this->pere= $etudiant->pere;
        $this->mere = $etudiant->mere;
        $this->programme = $etudiant->programme;
        $this->nom_tuteur = $etudiant->nom_tuteur;
        $this->telephone_tuteur = $etudiant->telephone_tuteur;
        $this->adresse = $etudiant->adresse;
        $this->diplome = $etudiant->diplome;
        $this->releve_notes = $etudiant->releve_notes;
        $this->certificat_nationalite = $etudiant->certificat_nationalite;
        $this->certificat_medical = $etudiant->certificat_medical;
        $this->extrait_naissance = $etudiant->extrait_naissance;
    }
    
    /**
     * rules: les règles de validations
     * Ex:'photo' => !is_string($this->photo) ? ['nullable','image', 'mimes:jpg,jpeg,png,gif,svg', 'max:1024'] : [],
     * Explication de l'exemple: Avec livewire, vu que les champs du formulaire sont liés aux
     * propriétés(qui contiennent des valeurs) donc quand on soumet le formulaire une erreur se 
     * déclenche pour ce champs de type file car au debut il devrait etre (image), pour contourner
     * cela on dit si la photo n'est pas changée (donc c'est l'ancienne) alors n'applique aucune
     * règle de validation si c'est le contraire applique la regle de validation pour ce champs.
     *
     * @return array
     */
    public function rules() {
        return [
            'nom' => ['required', 'string', 'min:2'],
            'prenom' => ['required', 'string', 'min:2'],
            'telephone' => ['required', 'regex:/^([0-9\s\-\+\(\)]*)$/', 'between:9,18', Rule::unique('etudiants')->ignore($this->etudiant)],
            'email' => ['required', 'email', Rule::unique('etudiants')->ignore($this->etudiant)],
            'pv' => ['required', 'integer', Rule::unique('etudiants')->ignore($this->etudiant)],
            'ine' => ['required', 'string', 'min:14', 'max:20', Rule::unique('etudiants')->ignore($this->etudiant)],
            'session' => ['required', 'string'],
            'profil' => ['required', 'string', 'min:2'],
            'centre' => ['required', 'string', 'min:2'],
            'ecole_origine' => ['required', 'string'],
            'date_naissance' => ['required', 'date'],
            'lieu_naissance' => ['required', 'string', 'min:2'],
            'pere' => ['required', 'string', 'min:2'],
            'mere' => ['required', 'string', 'min:2'],
            'programme' => ['required', 'string', 'min:2'],
            'nom_tuteur' => ['nullable','string', 'min:2'],
            'telephone_tuteur' => ['nullable','regex:/^([0-9\s\-\+\(\)]*)$/', 'between:9,18', Rule::unique('etudiants')->ignore($this->etudiant)],
            'adresse' => ['string', 'min:2'],
            'diplome' => !is_string($this->diplome) ? ['nullable','mimes:jpeg,png,jpg,gif,svg,ico,pdf'] : [],
            'releve_notes' => !is_string($this->releve_notes) ? ['nullable','mimes:jpg,jpeg,png,gif,svg,ico,pdf'] : [],
            'certificat_nationalite' => !is_string($this->certificat_nationalite) ? ['nullable','mimes:jpg,jpeg,svg,png,gif,ico,pdf'] : [],
            'certificat_medical' => !is_string($this->certificat_medical) ? ['nullable','mimes:jpg,jpeg,png,svg,gif,ico,pdf'] : [],
            'extrait_naissance' => !is_string($this->extrait_naissance) ? ['nullable','mimes:jpg,jpeg,png,gif,svg,ico,pdf'] : [],
            'photo' => !is_string($this->photo) ? ['nullable','image', 'mimes:jpg,jpeg,png,gif,svg', 'max:1024'] : [],
        ];
    }

    /**
     * update: la méthode de modification de l'etudiant
     * on recupere les données validées pour le cas des fichiers on regarde s'ils ne sont
     * pas de type fichier et ne sont pas nuls alors un nouveau fichier a été chargé donc on 
     * procède à son enrégistrement.
     *
     * @return redirect
     */
    public function update() {
        $data = $this->validate();
        if (!is_string($this->photo) && $this->photo !== null) {
            Storage::disk('public')->delete($this->etudiant->photo);
            $nouveau_nom = $this->photo->getClientOriginalName();
            $data['photo'] = $this->photo->storeAs('etudiants/etudiant', $nouveau_nom, 'public');
        }

        if (!is_string($this->diplome) && $this->diplome !== null) {
            Storage::disk('public')->delete($this->etudiant->diplome);
            $nouveau_nom = $this->diplome->getClientOriginalName();
            $data['diplome'] = $this->diplome->storeAs('etudiants/diplome', $nouveau_nom, 'public');
        }

        if (!is_string($this->releve_notes) && $this->releve_notes !== null) {
            Storage::disk('public')->delete($this->etudiant->releve_notes);
            $nouveau_nom = $this->releve_notes->getClientOriginalName();
            $data['releve_notes'] = $this->releve_notes->storeAs('etudiants/releve_notes', $nouveau_nom, 'public');
        }

        if (!is_string($this->extrait_naissance) && $this->extrait_naissance !== null) {
            Storage::disk('public')->delete($this->etudiant->extrait_naissance);
            $nouveau_nom = $this->extrait_naissance->getClientOriginalName();
            $data['extrait_naissance'] = $this->extrait_naissance->storeAs('etudiants/extrait_naissance', $nouveau_nom, 'public');
        }

        if (!is_string($this->certificat_nationalite) && $this->certificat_nationalite !== null) {
            Storage::disk('public')->delete($this->etudiant->certificat_nationalite);
            $nouveau_nom = $this->certificat_nationalite->getClientOriginalName();
            $data['certificat_nationalite'] = $this->certificat_nationalite->storeAs('etudiants/certificat_nationalite', $nouveau_nom, 'public');
        }
        if (!is_string($this->certificat_medical) && $this->certificat_medical !== null) {
            Storage::disk('public')->delete($this->etudiant->certificat_medical);
            $nouveau_nom = $this->certificat_medical->getClientOriginalName();
            $data['certificat_medical'] = $this->certificat_medical->storeAs('etudiants/certificat_medical', $nouveau_nom, 'public');
        }
        $this->etudiant->update($data);
        $this->reset();
        session()->flash('success', 'Modification effectuée avec succès!');
        return redirect()->route('scolarite.orientation');
    }
    
    #[Layout("components.layouts.template-scolarite")]    
    public function render()
    {
        return view('livewire.scolarite.edit-etudiant');
    }
}
