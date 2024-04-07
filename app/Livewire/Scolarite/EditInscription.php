<?php

namespace App\Livewire\Scolarite;

use App\Models\Etudiant;
use App\Models\Inscription;
use App\Models\Recu;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;

class EditInscription extends Component
{
    use WithFileUploads;

    /**
     * inerechere: la propriété charger de recuperer la valeur de recherche de l'ine
     *
     * @var string
     */
    public $inerecherche = '';

    public Etudiant $etudiant;

    /* les propriétés de la table etudiant */
    public $nom;
    public $prenom;
    public $telephone;
    public $email;
    public $photo;
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
     * rules : les règles de validations
     *
     * @return array
     */
    public function rules() {
        return [
            "etudiant_id" => ["required"],
            "promotion_id" => ["required"],
            "niveau_id" => ["required"],
            "annee_universitaire_id" => ["required"],
            "programme_id" => ["required"],
            "recu_id" => ["required","exists:recus,numrecu"],
        ];
    }
    /**
     * la 2e règle de validation pour s'assurer que le numrecu soit unique
     */ 
    public function rulesRecu() {
        return [
            'recu_id' => ["unique:recus,numrecu"]
        ];
    }

    /**
     * init: à l'inscription d'un etudiant on le recherche d'abord par son ine,
     * ensuite on charge ses informations grâce à la méthode initialisation()
     *
     * @return void
     */
    public function init() {
        $etudiants = Etudiant::where('ine', $this->inerecherche)->get();
        foreach ($etudiants as $etudiant) {
            $this->initialisation($etudiant);
        }
    }

    /**
     * initialisation: reçoit l'etudiant recherché ensuite passe cet etudiant
     * à la propriété $etudiant et ses autres informations aux autres propriétés
     * car c'est son ces propriétés qui sont liés aux champs de mon formulaire
     *
     * @param  Etudiant $etudiant
     * @return void
     */
    public function initialisation(Etudiant $etudiant) {
        $this->etudiant = $etudiant;

        $this->etudiant_id = $etudiant->id;
        $this->nom = $etudiant->nom;
        $this->prenom= $etudiant->prenom;
        $this->telephone= $etudiant->telephone;
        $this->email= $etudiant->email;
        $this->photo= $etudiant->photo;
        $this->ine= $etudiant->ine;
        $this->pere= $etudiant->pere;
        $this->mere= $etudiant->mere;
        $this->date_naissance= $etudiant->datenaissance;
        $this->lieu_naissance= $etudiant->lieunaissance;
        $this->adresse= $etudiant->adresse;
        $this->nom_tuteur= $etudiant->nomtuteur;
        $this->telephone_tuteur= $etudiant->telephonetuteur;

    }

    public function clearStatus()
    {
        $this->resetErrorBag();
    }

    /**
     * store: enrégistrer une inscription
     *
     * @return void
     */
    public function store()
    {
        $this->validate($this->rules());
        $recu = Recu::where('numrecu', $this->recu_id)->first()->id;
        // Créer l'inscription en associant l'identifiant du reçu
        $verif = Inscription::where('recu_id',$recu)->first(); 
       /*je recupere l'id du recu ensuite je verifie si ce id se trouve dans inscription 
       pour cela je fais une requete qui recupere le resultat: si ce resultat n'est pas nul je recupere
       l'id si je le trouve je declenche la fonction rulesRecu car ca veut dire que le recu est deja utilisé
       NB:Pourquoi j'ai pas directement recuperer l'id parceque si le resultat est vide une erreur se soulevera
       contrairement a la premiere request sur le recu car la regle de validation d'en haut s'assure d'abord
       que le numrecu existe */
        if ($verif !== null) {
            $idrecu = $verif->id;
            if ($idrecu !== null) {
                $this->validate($this->rulesRecu());
            }
        };
        Inscription::create([
            'annee_universitaire_id' => $this->annee_universitaire_id,
            'promotion_id' => $this->promotion_id,
            'niveau_id' => $this->niveau_id,
            'programme_id' => $this->programme_id,
            'etudiant_id' => $this->etudiant_id,
            'recu_id' => $recu,
        ]);

            /*vérifier si une nouvelle photo est chargée, car si c'est le cas la propriété $this->photo
            sera de type UploadedFile si c'est le contraire il sera de type string */
        if (!is_string($this->photo)) {
                if ($this->etudiant && $this->etudiant->photo) {
                        Storage::disk('public')->delete($this->etudiant->photo);
                }
                $nouveau_nom= $this->photo->getClientOriginalName();
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
                return redirect()->route('inscriptionetreinscription.index')->with('success', 'Inscription effectuée avec succès!');
       
    }


    #[Layout("components.layouts.template-scolarite")]
    public function render()
    {
        return view('livewire.scolarite.edit-inscription');
    }
}
