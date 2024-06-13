<?php

namespace App\Livewire\Departements\GI;

use App\Imports\EmploiImport;
use App\Models\AnneeUniversitaire;
use App\Models\EmploiTemps;
use App\Models\Programme;
use App\Models\Promotion;
use App\Models\Semestre;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithFileUploads;
use Maatwebsite\Excel\Facades\Excel;

class GIEmploiImport extends Component
{
    use WithFileUploads;

    public $fichier;
    public $programme_id;
    public $annee_universitaire_id;
    public $promotion_id;
    public $semestre_id;


     /**
     * rules: Règles de validation du fichier à importer
     *
     * @var array
     */
    protected $rules = [
        'fichier' => ['required'],
        'programme_id' => ['required'],
        'annee_universitaire_id' => ['required'],
        'promotion_id' => ['required'],
        'semestre_id' => ['required'],
    ];

    public function importer(){
        $this->validate();
        try {
            $filePath = $this->fichier->path();
            // dd($filePath); // Vérifiez le chemin du fichier
            Excel::import(new EmploiImport(
                $this->programme_id, 
                $this->annee_universitaire_id, 
                $this->promotion_id, 
                $this->semestre_id
            ), $filePath);
    
            $this->reset('fichier');
            return redirect()->route('genieinfo.emploitemps')->with('success', "Import de l'emploi du temps effectué avec succès !");
        } catch (\Throwable $th) {
            // Capturez l'erreur exacte pour un meilleur débogage
            return redirect()->route('genieinfo.emploitemps')->with('danger', "Echec de l'import de l'emploi du temps : " . $th->getMessage());
        }
    }
    
     

    public function clearStatus()
    {
        $this->resetErrorBag();
    }

    #[Layout("components.layouts.template-departements")]
    public function render()
    {
        return view('livewire.departements.g-i.g-i-emploi-import',[
            "programmes" => Programme::whereHas('departement', function($query){
                $query->where('departement', 'Génie Informatique')
                ->orwhere('departement', 'Genie Informatique');
            })->get(),
            'emploisTemps' => EmploiTemps::paginate(10), 
            'promotions' => Promotion::all(),
            'annee_universitaires' => AnneeUniversitaire::all(),
            'semestres' => Semestre::all(),
        ]);
    }

}
