<?php

namespace App\Livewire\Scolarite;

use App\Imports\EtudiantImport;
use App\Models\Etudiant;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithFileUploads;
use Maatwebsite\Excel\Facades\Excel;

class EtudiantTables extends Component
{
    use WithFileUploads;


    /**
     * searchIne: la propriété charger de recuperer la valeur de recherche de l'etudiant
     * par son ine
     *
     * @var string
     */
    public $searchIne = '';
    
    /**
     * fichier: la propriété charger de stocker le fichier à importer
     *
     * @var mixed
     */
    public $fichier;
    
    /**
     * rules: Règles de validation du fichier à importer
     *
     * @var array
     */
    protected $rules = [
        'fichier' => ['required','file']
    ];



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
     * importer: la méthode d'import de fichier
     *
     * @return void
     */
    public function importer()
    {
        $this->validate();

        try {
            if ($this->fichier) {
                Excel::import(new EtudiantImport, $this->fichier);
                $this->reset('fichier');
                session()->flash('success', 'Import effectué avec succès!');
            }
        } catch (\Throwable $th) {
            session()->flash('danger', "Une erreur s'est produite lors de l'importation : " . $th->getMessage());
    }
}


    /**
     * delete: la méthode de delete d'un etudiant
     *
     * @param  Etudiant $etudiant
     * @return void
     */
    public function delete(Etudiant $etudiant) {
        if ($etudiant->photo) {
            Storage::disk('public')->delete($etudiant->photo);
        }
        if ($etudiant->diplome) {
            Storage::disk('public')->delete($etudiant->diplome);
        }
        if ($etudiant->releve_notes) {
            Storage::disk('public')->delete($etudiant->releve_notes);
        }
        if ($etudiant->certificat_medical) {
            Storage::disk('public')->delete($etudiant->certificat_medical);
        }
        if ($etudiant->certificat_nationalite) {
            Storage::disk('public')->delete($etudiant->certificat_nationalite);
        }
        if ($etudiant->extrait_naissance) {
            Storage::disk('public')->delete($etudiant->extrait_naissance);
        }

        $etudiant->delete();
        session()->flash('success', 'Suppression effectuée avec succès!');
    }

    /**
     * render : la méthode render qui se charge de rendre le composant etudiant-tables
     * avec les etudiants ou un etudiant recherché.
     *
     * @return view
     */
    #[Layout("components.layouts.template-scolarite")]    
    public function render()
    {
        $query = Etudiant::query();
        $query->where(function ($query) {
            $query->where('ine', 'LIKE', "%{$this->searchIne}%")
            ->orWhere('session', 'LIKE', "%{$this->searchIne}%")
            ->orWhere('programme', 'LIKE', "%{$this->searchIne}%");
        });
        return view('livewire.scolarite.etudiant-tables',[
            "etudiants"=> $query->paginate(10),
        ]);
    }
}
