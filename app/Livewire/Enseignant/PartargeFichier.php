<?php

namespace App\Livewire\Enseignant;

use App\Models\PartageFile;
use App\Models\Service;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithFileUploads;

class PartargeFichier extends Component
{
    use WithFileUploads;
    public PartageFile $partage;

    public $fichier;
    public $service_id;
    public $user_id;

    /**
     * mount: cette méthode d'initialiser toutes les propriétés dès la création
     * du composant à travers la méthode initialisation()
     *
     * @param  mixed $partage
     * @return void
     */
    /**
     * Rules : les règles de validation
     *
     * @return array
    */
    protected function rules() {
        return [
            "fichier" => ["required",'mimes:pdf,png,jpeg,jpg,svg,gif,mp4,ico,mp3,avi,pptx,docx,doc'],
            "service_id" => ['required', 'exists:services,id'],
        ];
    }

    public function rulesEdit() {
        return [
            'fichier' => !is_string($this->fichier) ? ['nullable','mimes:pdf,png,jpeg,jpg,svg,gif,mp4,ico,mp3,avi,pptx,docx,doc'] : [],
            "service_id" => ['required', 'exists:services,id'],

        ];
    }

    public function resetError(){
        $this->resetErrorBag();
    }

    public function resetChamps(){
        $this->reset();
        $this->resetError();
    }

    /**
     * cancel: la méthode qui se charge d'annuler l'action de d'ajout
     * @return redirect
    */
    public function cancel() {
        $this->clearStatus();
        return to_route('scolarite.partagefile');
    }

    public function edit(PartageFile $partage) {
        $this->partage = $partage;
        $this->service_id = $this->partage->service_id;
        $this->fichier = $this->partage->fichier;
       
    }

    /**
     * store: enrégistrer une matricule
     *
     * @return void
    */
    public function store()
    {
        $data = $this->validate($this->rules());

        $fichier = $this->fichier;
    
        if ($fichier !== null && !$fichier->getError()) {
            $fichierSansExt = pathinfo($fichier->getClientOriginalName(), PATHINFO_FILENAME);
            $nouveauNom = $fichierSansExt . '_' . now()->format('YmdHis') . '.' . $fichier->getClientOriginalExtension();
            $fichier->storeAs('public/partagefiles', $nouveauNom);
            $data['fichier'] = $nouveauNom;
        }

        $data['user_id'] = 1;
        PartageFile::create($data);
        $this->reset();
        return redirect()->route('scolarite.partagefile')->with('success', 'Fichier partagé avec succès!');
    }

    /**
     * @param  PartageFile $partage
     * @return void
     */
    /*
     * store: modifier une les fichier
     *
     * @return void
    */
    public function update()
    {
        $data = $this->validate($this->rulesEdit());

        if ($this->fichier && !is_string($this->fichier)) {
            if ($this->partage && $this->partage->fichier) {
                Storage::disk('public')->delete('partagefiles/' . $this->partage->fichier);
            }
            $fichierSansExt = pathinfo($this->fichier->getClientOriginalName(), PATHINFO_FILENAME);
            $nouveauNom = $fichierSansExt . '_' . now()->format('YmdHis') . '.' . $this->fichier->getClientOriginalExtension();
            $this->fichier->storeAs('public/partagefiles', $nouveauNom);
            $data['fichier'] = $nouveauNom;
        } else {
            unset($data['fichier']);
        }

        $this->partage->update($data);
        $this->reset();
        return redirect()->route('scolarite.partagefile')->with('success', 'Fichier partagé modifier avec succès!');
    }

    /**
     * delete: la méthode de delete d'un partage
     *
     * @param  PartageFile $partage
     * @return void
     */
    public function destroy($id)
    {
        $partage = PartageFile::findOrFail($id);
        if ($partage->fichier) {
            Storage::disk('public')->delete('partagefiles/'.$partage->fichier);
        }
        $partage->delete();
        return redirect()->route('scolarite.partagefile')->with('success','Suppression du fichier effectuée avec succès');
    }

    #[Layout("components.layouts.template-enseignant")]
    public function render()
    {
        $userId = Auth::user()->id;
        
        $services = Service::all();
        $partages = PartageFile::query()->where('user_id', $userId); //fichier partagés
        if ($this->service_id)
            $partages = $partages->where('service_id', $this->service_id);

        return view('livewire.enseignant.partarge-fichier', [
            'services' => $services,
            'partages' => $partages->paginate(15)
        ]);
    }
}
