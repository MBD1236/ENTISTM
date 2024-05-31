<?php

namespace App\Livewire\Departements\TL;

use App\Models\InformationDepartement;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithFileUploads;

class TlInformationsEdit extends Component
{
    use WithFileUploads;
    /**
     * @var InformationDepartement
    */
    public InformationDepartement $information;

    /* les propriétés de la table information du departement */
    public $id;
    public $departement;
    public $code;
    public $telephone;
    public $email;
    public $adresse;
    public $photo;
    public $description;

    /**
     * mount: cette méthode d'initialiser toutes les propriétés dès la création
     * du composant à travers la méthode initialisation()
     *
     * @param  mixed $information
     * @return void
     */
    public function mount(InformationDepartement $information)
    {
        $this->initialisation($information);
    }


    /**
     * edit: initialise les propriétés
     * @param  InformationDepartement $information
     * @return void
     */
    public function edit(InformationDepartement $information) {
        $this->information = $information;
        $this->departement = $information->departement;
        $this->code = $information->code;
        $this->telephone = $information->telephone;
        $this->email = $information->email;
        $this->adresse = $information->adresse;
        $this->description = $information->description;
        $this->photo= $information->photo;
    }
    
    /**
    * rules : les règles de validations
    *
    * @return array
    */
     public function rules() {
        return [
            "departement" => ["required", "unique:information_departements,id"],
            "code" => ["required", "unique:information_departements,id"],
            "telephone" => ['required', 'regex:/^([0-9\s\-\+\(\)]*)$/', 'between:9,18', 'unique:information_departements,telephone,' . $this->information->id],
            "email" => ["required" , "unique:information_departements,id"],
            "adresse" => ["required"],
            "description" => ['required', 'min:8'],
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
        return to_route('tl.information.list');
    }

    /**
     * initialisation: reçoit l'information inscrit ou reinscrit à editer recherché,passer cet information 
     * à la propriété $information et ses autres informations aux autres propriétés
     * car c'est sont ces propriétés qui sont liés aux champs de mon formulaire
     *
     * @param  information $information
     * @return void
     */
    public function initialisation(InformationDepartement $information)
    {
        $this->id = $this->information->id;
        $this->departement = $this->information->departement;
        $this->code = $this->information->code;
        $this->telephone = $this->information->telephone;
        $this->email = $this->information->email;
        $this->adresse = $this->information->adresse;
        $this->description = $this->information->description;
        $this->photo = $this->information->photo;
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
            if ($this->information && $this->information->photo) {
                Storage::disk('public')->delete('informations/' . $this->information->photo);
            }
            $photoSansExt = pathinfo($this->photo->getClientOriginalName(), PATHINFO_FILENAME);
            $nouveauNom = $photoSansExt . '_' . now()->format('YmdHis') . '.' . $this->photo->getClientOriginalExtension();
            $this->photo->storeAs('public/informations', $nouveauNom);
            $data['photo'] = $nouveauNom;
        } else {
            unset($data['photo']);
        }

        $this->information->update($data);

        $this->reset();
        return redirect()->route('tl.information.list')->with('success', 'Information modifiée avec succès!');
    }
   
    /**
     * @return view
     */
    #[Layout("components.layouts.template-departements")]
    public function render()
    {
        return view('livewire.departements.t-l.tl-informations-edit');
    }
}
