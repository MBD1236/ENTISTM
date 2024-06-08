<?php

namespace App\Livewire\Departements\GI;

use App\Models\Departement;
use App\Models\Enseignant;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithFileUploads;

class GIEnseignantsCreate extends Component
{
    use WithFileUploads;

    public $matricule;
    public $nom;
    public $prenom;
    public $telephone;
    public $email;
    public $adresse;
    public $departement_id;
    public $photo;

    /**
     * Rules : les règles de validation
     *
     * @return array
    */
    protected function rules() {
        return [
            "matricule" => ["required"],
            "nom" => ["required", "min:2"],
            "prenom" => ["required", "min:2"],
            "telephone" => ['required', 'regex:/^([0-9\s\-\+\(\)]*)$/', 'between:9,18'],
            "email" => ["required", "email"],
            "adresse" => ["required"],
            "departement_id" => ['required'],
            "photo" => ["required", 'image', 'mimes:jpeg,png,jpg,gif,svg', 'max:5000'],
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
        return to_route('genieinfo.enseignant.list');
    }

    /**
     * store: enrégistrer une matricule
     *
     * @return void
    */
    public function store()
    {
        $data = $this->validate();
        $mat = $data['matricule'];
        $departement = $data['departement_id'];
        $verify_enseignant = Enseignant::where('matricule', $mat)->where('departement_id', $departement)->get();
        if ($verify_enseignant === 0) {
            /** @var \Illuminate\Http\UploadedFile|null $photo */
            $photo = $this->photo;
    
            if ($photo !== null && !$photo->getError()) {
                $photoSansExt = pathinfo($photo->getClientOriginalName(), PATHINFO_FILENAME);
                $nouveauNom = $photoSansExt . '_' . now()->format('YmdHis') . '.' . $photo->getClientOriginalExtension();
                $photo->storeAs('public/enseignants', $nouveauNom);
                $data['photo'] = $nouveauNom;
            }
    
            Enseignant::create($data);
    
            $this->reset();
            return redirect()->route('genieinfo.enseignant.list')->with('success', 'Enseignant enregistré avec succès!');
        }

        }

    #[Layout("components.layouts.template-departements")]
    public function render()
    {
        return view('livewire.departements.g-i.g-i-enseignants-create',[
            'departements' => Departement::where('departement', 'Génie Informatique')->get()
        ]);
    }
}
