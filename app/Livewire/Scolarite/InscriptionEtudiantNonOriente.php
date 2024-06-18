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
use Symfony\Polyfill\Intl\Idn\Resources\unidata\Regex;

class InscriptionEtudiantNonOriente extends Component
{
    use WithFileUploads;

    public $inerecherche = '';
    public Etudiant $etudiant;

    public $nom;
    public $prenom;
    public $telephone;
    public $email;
    public $profil;
    public $centre;
    public $ecole_origine;
    public $programme;
    public $photo;
    public $session;
    public $ine;
    public $pv;
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

    public int $annee_universitaire_id;
    public $promotion_id;
    public $niveau_id;
    public $programme_id;
    public $etudiant_id;
    public $recu_id;

   
    public function rulesEtudiant() {
        return [
            "nom" => ["required", "string", 'regex:([a-z])'],
            "prenom" => ["required", "string",'regex:([a-z])'],
            "telephone" => ["required", "string",'regex:/^([0-9\s\-\+\(\)]*)$/', 'between:9,18'],
            "email" => ["required", "string"],
            "pv" => ["required", "integer"],
            "ine" => ["required", "max:15"],
            "session" => ["required", "string"],
            "profil" => ["required", "string"],
            "centre" => ["required", "string"],
            "ecole_origine" => ["required", "string"],
            "date_naissance" => ["required", "date"],
            "lieu_naissance" => ["required", "string"],
            "pere" => ["required", "string",'regex:([a-z])'],
            "mere" => ["required", "string",'regex:([a-z])'],
            "programme" => ["required", "string",'regex:([a-z])'],
            'nom_tuteur' => ['required','string', 'min:2','regex:([a-z])'],
            'telephone_tuteur' => ['required','regex:/^([0-9\s\-\+\(\)]*)$/', 'between:9,18'],
            "adresse" => ["required",'regex:([a-z])'],
            'photo' => ['required', 'image', 'mimes:jpg,jpeg,png,gif,svg', 'max:10240'],
            'diplome' => ['required', 'mimes:jpeg,png,jpg,gif,svg,ico,pdf','max:10240'],
            'releve_notes' => ['required', 'mimes:jpg,jpeg,png,gif,svg,ico,pdf','max:10240'],
            'certificat_nationalite' => ['required', 'mimes:jpg,jpeg,svg,png,gif,ico,pdf','max:10240'],
            'certificat_medical' => ['required', 'mimes:jpg,jpeg,png,svg,gif,ico,pdf','max:10240'],
            'extrait_naissance' => ['required', 'mimes:jpg,jpeg,png,gif,svg,ico,pdf','max:10240'],
        ];
    }
    public function rulesRecu() {
        return [
            'recu_id' => ["unique:recus,numrecu"]
        ];
    }
    
    public function rulesInscription() {
        return [
            "recu_id" => ["required","exists:recus,numrecu"],
            "programme_id" => ["required"],
            "promotion_id" => ["required"],
            "niveau_id" => ["required"],
            "annee_universitaire_id" => ["required"],
        ];
    }
  
    public function clearStatus() {
        $this->resetErrorBag();
    }
    
    public function save()
    {
        $donnees = $this->validate($this->rulesEtudiant());

        // if (str_starts_with($donnees['photo'], 'data:image')) {
        //     $photoPath = 'etudiants/etudiant/' . time() . '.png';
        //     Storage::disk('public')->put($photoPath, base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $donnees['photo'])));
        //     $donnees['photo'] = $photoPath;
        // }

        $timestamp = Carbon::now()->format('Ymd_His');
        if ($this->photo) {
            $nouveau_nom = $timestamp . '_' . $this->photo->getClientOriginalName();
            $donnees['photo'] = $this->photo->storeAs('etudiants/etudiant', $nouveau_nom, 'public');
        }
        if ($this->diplome) {
            $nouveau_nom = $timestamp . '_' . $this->diplome->getClientOriginalName();
            $donnees['diplome'] = $this->diplome->storeAs('etudiants/diplome', $nouveau_nom, 'public');
        }
        if ($this->releve_notes) {
            $nouveau_nom = $timestamp . '_' . $this->releve_notes->getClientOriginalName();
            $donnees['releve_notes'] = $this->releve_notes->storeAs('etudiants/releve_notes', $nouveau_nom, 'public');
        }
        if ($this->extrait_naissance) {
            $nouveau_nom = $timestamp . '_' . $this->extrait_naissance->getClientOriginalName();
            $donnees['extrait_naissance'] = $this->extrait_naissance->storeAs('etudiants/extrait_naissance', $nouveau_nom, 'public');
        }
        if ($this->certificat_nationalite) {
            $nouveau_nom = $timestamp . '_' . $this->certificat_nationalite->getClientOriginalName();
            $donnees['certificat_nationalite'] = $this->certificat_nationalite->storeAs('etudiants/certificat_nationalite', $nouveau_nom, 'public');
        }
        if ($this->certificat_medical) {
            $nouveau_nom = $timestamp . '_' . $this->certificat_medical->getClientOriginalName();
            $donnees['certificat_medical'] = $this->certificat_medical->storeAs('etudiants/certificat_medical', $nouveau_nom, 'public');
        }

        $etudiant = Etudiant::create([
            'nom' => $donnees['nom'],
            'prenom' => $donnees['prenom'],
            'telephone' => $donnees['telephone'],
            'email' => $donnees['email'],
            'pv' => $donnees['pv'],
            'ine' => $donnees['ine'],
            'session' => $donnees['session'],
            'profil' => $donnees['profil'],
            'centre' => $donnees['centre'],
            'ecole_origine' => $donnees['ecole_origine'],
            'date_naissance' => $donnees['date_naissance'],
            'lieu_naissance' => $donnees['lieu_naissance'],
            'pere' => $donnees['pere'],
            'mere' => $donnees['mere'],
            'programme' => $donnees['programme'],
            'nom_tuteur' => $donnees['nom_tuteur'],
            'telephone_tuteur' => $donnees['telephone_tuteur'],
            'adresse' => $donnees['adresse'],
            'photo' => $donnees['photo'],
            'diplome' => $donnees['diplome'],
            'releve_notes' => $donnees['releve_notes'],
            'extrait_naissance' => $donnees['extrait_naissance'],
            'certificat_nationalite' => $donnees['certificat_nationalite'],
            'certificat_medical' => $donnees['certificat_medical']
        ]);
        
        $recu = Recu::where('numrecu', $this->recu_id)->first()->id;
        $verif = Inscription::where('recu_id', $recu)->first(); 

        if ($verif !== null) {
            $idrecu = $verif->id;
            if ($idrecu !== null) {
                $this->validate($this->rulesRecu());
            }
        }
        $data = $this->validate($this->rulesInscription());
        Inscription::create([
            'etudiant_id' => $etudiant->id, // Utilisation de l'ID de l'étudiant nouvellement créé
            'annee_universitaire_id' => $data['annee_universitaire_id'],
            'promotion_id' => $data['promotion_id'],
            'niveau_id' => $data['niveau_id'],
            'programme_id' => $data['programme_id'],
            'recu_id' => $recu,
        ]);

        $this->reset();
        return redirect()->route('scolarite.inscriptionetreinscription.index')->with('success', 'Inscription effectuée avec succès!');
    }
    
    #[Layout("components.layouts.template-scolarite")]
    public function render()
    {
        return view('livewire.scolarite.inscription-etudiant-non-oriente',[
            'promotions' => Promotion::all(),
            'niveaux' => Niveau::where('niveau', 'Licence 1')->get(),
            'programmes'=> Programme::all(),
            'annee_universitaires'=> AnneeUniversitaire::latest()->paginate(1),
        ]);
    }
}
