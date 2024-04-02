<?php

namespace App\Livewire\Scolarite;

use App\Models\Niveau;
use Livewire\Component;
use App\Models\Etudiant;
use App\Models\AnneeUniv;
use App\Models\Programme;
use App\Models\Promotion;
use App\Models\Inscription;
use Livewire\WithFileUploads;
use Livewire\Attributes\Layout;
use Illuminate\Support\Facades\Storage;

class InscriptionEtudiant extends Component
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
    public $datenaissance;
    public $lieunaissance;
    public $nomtuteur;
    public $telephonetuteur;
    public $adresse;
    public $mere;
    public $pere;

    /* les propriétés de la table inscription */
    public $annee_universitaire_id;
    public $promotion_id;
    public $niveau_id;
    public $programme_id;
    public $etudiant_id;
    public $numrecu;


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
            "numrecu" => ["required"],
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

        $this->nom = $etudiant->nom;
        $this->prenom= $etudiant->prenom;
        $this->telephone= $etudiant->telephone;
        $this->email= $etudiant->email;
        $this->photo= $etudiant->photo;
        $this->ine= $etudiant->ine;
        $this->pere= $etudiant->pere;
        $this->mere= $etudiant->mere;
        $this->datenaissance= $etudiant->datenaissance;
        $this->lieunaissance= $etudiant->lieunaissance;
        $this->adresse= $etudiant->adresse;
        $this->nomtuteur= $etudiant->nomtuteur;
        $this->telephonetuteur= $etudiant->telephonetuteur;

    }

    /**
     * store: enrégistrer une inscription
     *
     * @return void
     */
    public function store()
    {
        Inscription::create($this->validate());
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
                    'nomtuteur' => $this->nom_tuteur,
                    'telephonetuteur' => $this->telephone_tuteur,
                    'adresse' => $this->adresse
                ]);
            }
            $this->reset();
            return redirect()->route('scolarite.inscription.index')->with('info', 'Inscription effectuée avec succès!');
    }


    #[Layout("components.layouts.template-scolarite")]
    public function render()
    {
        return view('livewire.scolarite.inscription-etudiant',[
            'promotions' => Promotion::all(),
            'niveaux' => Niveau::all(),
            'programmes'=> Programme::all(),
            'annee_universitaires'=> AnneeUniv::orderBy('created_at','desc')->paginate(5),
        ]);
    }
}
