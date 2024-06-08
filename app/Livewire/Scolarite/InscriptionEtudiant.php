<?php

namespace App\Livewire\Scolarite;

use App\Models\AnneeUniversitaire;
use App\Models\Etudiant;
use App\Models\Inscription;
use App\Models\Niveau;
use App\Models\Programme;
use App\Models\Promotion;
use App\Models\Recu;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithFileUploads;

class InscriptionEtudiant extends Component
{
    use WithFileUploads;

    public $inerecherche = '';
    public Etudiant $etudiant;
   
    /* les propriétés de la table etudiant */
    public $nom;
    public $prenom;
    public $telephone;
    public $email;
    public $pv; //etudiant non orienté
    public $session; //etudiant non orienté
    public $profil; //etudiant non orienté
    public $centre; //etudiant non orienté
    public $ecole_origine; //etudiant non orienté
    public $programme; //etudiant non orienté
    public $photo;
    public $ine;
    public $date_naissance;
    public $lieu_naissance;
    public $nom_tuteur;
    public $telephone_tuteur;
    public $adresse;
    public $mere;
    public $pere;
    public $diplome;
    public $releve_notes;
    public $certificat_nationalite;
    public $certificat_medical;
    public $extrait_naissance;

    /* les propriétés de la table inscription */
    public int $annee_universitaire_id;
    public $promotion_id;
    public $niveau_id;
    public $programme_id;
    public $etudiant_id;
    public $recu_id;


    public function rules() {
        return [
            "etudiant_id" => ["required", "unique:inscriptions,etudiant_id"],
            "promotion_id" => ["required"],
            "niveau_id" => ["required"],
            "annee_universitaire_id" => ["required"],
            "programme_id" => ["required"],
            "recu_id" => ["required","exists:recus,numerorecu"],
            'diplome' => ['required', 'mimes:jpeg,png,jpg,gif,svg,ico,pdf','max:10240'],
            'releve_notes' => ['required', 'mimes:jpg,jpeg,png,gif,svg,ico,pdf','max:10240'],
            'certificat_nationalite' => ['required', 'mimes:jpg,jpeg,svg,png,gif,ico,pdf','max:10240'],
            'certificat_medical' => ['required', 'mimes:jpg,jpeg,png,svg,gif,ico,pdf','max:10240'],
            'extrait_naissance' => ['required', 'mimes:jpg,jpeg,png,gif,svg,ico,pdf','max:10240'],
            'photo' => ['required', 'image', 'mimes:jpg,jpeg,png,gif,svg', 'max:10240'],
            'nom_tuteur' => ['string', 'min:2'],
            'telephone_tuteur' => ['regex:/^([0-9\s\-\+\(\)]*)$/', 'between:9,18', 'unique:etudiants'],      
        ];
    }

    public function rulesRecu() {
        return [
            'recu_id' => ["unique:recus,numerorecu"]
        ];
    }

    public function init() {
        $etudiant = Etudiant::where('ine', $this->inerecherche)->first();
        if ($etudiant) {
            $this->initialisation($etudiant);
        }
    }

    public function initialisation(Etudiant $etudiant) {
        $this->etudiant = $etudiant;

        $this->etudiant_id = $etudiant->id;
        $this->nom = $etudiant->nom;
        $this->prenom = $etudiant->prenom;
        $this->telephone = $etudiant->telephone;
        $this->email = $etudiant->email;
        $this->photo = $etudiant->photo;
        $this->ine = $etudiant->ine;
        $this->pere = $etudiant->pere;
        $this->mere = $etudiant->mere;
        $this->date_naissance = $etudiant->date_naissance;
        $this->lieu_naissance = $etudiant->lieu_naissance;
        $this->adresse = $etudiant->adresse;
        $this->nom_tuteur = $etudiant->nom_tuteur;
        $this->telephone_tuteur = $etudiant->telephone_tuteur;
        $this->diplome = $etudiant->diplome;
        $this->releve_notes = $etudiant->releve_notes;
        $this->certificat_nationalite = $etudiant->certificat_nationalite;
        $this->certificat_medical = $etudiant->certificat_medical;
        $this->extrait_naissance = $etudiant->extrait_naissance;
    }

    public function clearStatus() {
        $this->resetErrorBag();
    }

    public function store() {
        $data = $this->validate($this->rules());
        $recu = Recu::where('numerorecu', $this->recu_id)->first()->id;
        $verif = Inscription::where('recu_id', $recu)->first(); 
        if ($verif !== null) {
            $idrecu = $verif->id;
            if ($idrecu !== null) {
                $this->validate($this->rulesRecu());
            }
        }
        Inscription::create([
            'annee_universitaire_id' => $data['annee_universitaire_id'],
            'promotion_id' => $data['promotion_id'],
            'niveau_id' => $data['niveau_id'],
            'programme_id' => $data['programme_id'],
            'etudiant_id' => $data['etudiant_id'],
            'recu_id' => $recu,
        ]);

        $timestamp = Carbon::now()->format('Ymd_His');

        if ($this->etudiant) {
            if ($this->photo) {
                $nouveau_nom = $timestamp . '_' . $this->photo->getClientOriginalName();
                $data['photo'] = $this->photo->storeAs('etudiants/etudiant', $nouveau_nom, 'public');
            }
            if ($this->diplome) {
                $nouveau_nom = $timestamp . '_' . $this->diplome->getClientOriginalName();
                $data['diplome'] = $this->diplome->storeAs('etudiants/diplome', $nouveau_nom, 'public');
            }
            if ($this->releve_notes) {
                $nouveau_nom = $timestamp . '_' . $this->releve_notes->getClientOriginalName();
                $data['releve_notes'] = $this->releve_notes->storeAs('etudiants/releve_notes', $nouveau_nom, 'public');
            }
            if ($this->extrait_naissance) {
                $nouveau_nom = $timestamp . '_' . $this->extrait_naissance->getClientOriginalName();
                $data['extrait_naissance'] = $this->extrait_naissance->storeAs('etudiants/extrait_naissance', $nouveau_nom, 'public');
            }
            if ($this->certificat_nationalite) {
                $nouveau_nom = $timestamp . '_' . $this->certificat_nationalite->getClientOriginalName();
                $data['certificat_nationalite'] = $this->certificat_nationalite->storeAs('etudiants/certificat_nationalite', $nouveau_nom, 'public');
            }
            if ($this->certificat_medical) {
                $nouveau_nom = $timestamp . '_' . $this->certificat_medical->getClientOriginalName();
                $data['certificat_medical'] = $this->certificat_medical->storeAs('etudiants/certificat_medical', $nouveau_nom, 'public');
            }

            $this->etudiant->update([
                'telephone' => $this->telephone,
                'email' => $this->email,
                'nom_tuteur' => $data['nom_tuteur'],
                'telephone_tuteur' => $data['telephone_tuteur'],
                'adresse' => $this->adresse,
                'photo' => $data['photo'],
                'diplome' => $data['diplome'],
                'releve_notes' => $data['releve_notes'],
                'extrait_naissance' => $data['extrait_naissance'],
                'certificat_nationalite' => $data['certificat_nationalite'],
                'certificat_medical' => $data['certificat_medical']
            ]);
        }

        $this->reset();
        return redirect()->route('inscriptionetreinscription.index')->with('success', 'Inscription effectuée avec succès!');
    }
    #[Layout("components.layouts.template-scolarite")]
    public function render() {
        return view('livewire.scolarite.inscription-etudiant',[
            'promotions' => Promotion::all(),
            'niveaux' => Niveau::where('niveau', 'Licence 1')->get(),
            'programmes' => Programme::all(),
            'annee_universitaires' => AnneeUniversitaire::latest()->paginate(1),
        ]);
    }
}
