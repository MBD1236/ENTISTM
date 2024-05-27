<?php

namespace App\Livewire\Departements\GI;

use App\Models\InformationDepartement;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithFileUploads;

class GIInformationsCreate extends Component
{
    use WithFileUploads;

    public $departement;
    public $code;
    public $telephone;
    public $email;
    public $adresse;
    public $photo;
    public $description;

    /**
     * Rules : les règles de validation
     *
     * @return array
     */
    protected function rules() {
        return [
            "departement" => ["required", "unique:information_departements,departement"],
            "code" => ["required", "unique:information_departements,code"],
            "telephone" => ['required', 'regex:/^([0-9\s\-\+\(\)]*)$/', 'between:9,18', 'unique:information_departements,telephone'],   
            "email" => ["required", "email", "unique:information_departements,email"],
            "adresse" => ["required"],
            "description" => ['required', 'min:8'],
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
        return to_route('genieinfo.information.list');
    }

    /**
     * store: enrégistrer une departement
     *
     * @return void
     */
    public function store()
    {
        $data = $this->validate();

        /** @var \Illuminate\Http\UploadedFile|null $photo */
        $photo = $this->photo;

        if ($photo !== null && !$photo->getError()) {
            $photoSansExt = pathinfo($photo->getClientOriginalName(), PATHINFO_FILENAME);
            $nouveauNom = $photoSansExt . '_' . now()->format('YmdHis') . '.' . $photo->getClientOriginalExtension();
            $photo->storeAs('public/informations', $nouveauNom);
            $data['photo'] = $nouveauNom;
        }

        InformationDepartement::create($data);

        $this->reset();
        return redirect()->route('genieinfo.information.list')->with('success', 'Département enregistré avec succès!');
    }

    #[Layout("components.layouts.template-departements")]
    public function render()
    {
        return view('livewire.departements.g-i.g-i-informations-create', [
            'informations' => InformationDepartement::all()
        ]);
    }
}
