<?php

namespace App\Livewire\Enseignant;

use App\Models\Cour;
use App\Models\Enseignant;
use App\Models\Niveau;
use App\Models\Programme;
use App\Models\Promotion;
use App\Models\Publication;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithFileUploads;

class CoursTable extends Component
{
    use WithFileUploads;

    public Cour $cour;
    public $titre;
    public $contenu;
    public $enseignant_id;


    public $promotion_id;
    public $programme_id;
    public $niveau_id;
    public $cour_id;

    public $filtre;


    public function rules() {
        return [
            'titre' => ['required','string', 'regex:([a-z])'],
            'contenu' => ['required','mimes:mp4,pdf,avi', 'max:512000']
        ];
    }

    public function rulesPublish() {
        return [
            'promotion_id' => ['required'],
            'programme_id' => ['required'],
            'niveau_id' => ['required'],
            'cour_id' => ['required'],
        ];
    }

    public function rulesEdit() {
        return [
            'titre' => ['required','string', 'regex:([a-z])'],
            'contenu' => !is_string($this->contenu) ? ['nullable','mimes:avi,mp4,pdf'] : [],

        ];
    }

    public function setPublierCours(int $id) {
        $this->cour_id = $id;
    }

    public function storePublish() {
        $data = $this->validate($this->rulesPublish());

        // Avant de faire une publication, vérifier si ce cours n'est pas 
        // publié pour cette même promotion, même niveau et même programme
        $prom_id = $data['promotion_id'];
        $prog_id = $data['programme_id'];
        $niv_id = $data['niveau_id'];
        $cou_id = $data['cour_id'];

        $verif = Publication::where('promotion_id', $prom_id)
            ->where('programme_id', $prog_id)
            ->where('niveau_id', $niv_id)
            ->where('cour_id', $cou_id)
            ->first();

        if ($verif) {
            // Si une publication existe déjà, retournez un message d'erreur ou prenez une autre action
            session()->flash('errorPublish', 'Ce cours a déjà été publié pour cette promotion, niveau et programme.');
        } else {
            // Si aucune publication existante n'est trouvée, créez une nouvelle publication
            Publication::create($data);
            $this->reset();
            session()->flash('successPublish', 'Ajout effectué avec succès!');
        }

    }
    public function store() {

        //je recupere le matricule de l'user connecté(enseignant)
        $enseignant = 'E2024CFM';
        $this->enseignant_id = Enseignant::where('matricule', $enseignant)->pluck('id')->first();
        $data = $this->validate();
        $data['enseignant_id'] = $this->enseignant_id;
        if ($this->contenu) {
            if ($this->contenu->getClientOriginalExtension() == 'mp4' || $this->contenu->getClientOriginalExtension() == 'avi') {
                $timestamp = Carbon::now()->format('Ymd_His');
                $nouveau_nom = $timestamp . '_' . $this->contenu->getClientOriginalName();
                $data['contenu'] = $this->contenu->storeAs('cours/videos', $nouveau_nom, 'public');
            }else {
                $timestamp = Carbon::now()->format('Ymd_His');
                $nouveau_nom = $timestamp . '_' . $this->contenu->getClientOriginalName();
                $data['contenu'] = $this->contenu->storeAs('cours/pdf', $nouveau_nom, 'public');
            }
        }
        // dd($data);
        Cour::create($data);
        $this->reset();
        session()->flash('success', 'Ajout effectué avec succès!');

    }

    public function edit(Cour $cours) {
        $this->cour = $cours;
        $this->titre = $cours->titre;
        $this->contenu = $cours->contenu;
    }

    public function update() {
        $data = $this->validate($this->rulesEdit());
        if (!is_string($this->contenu) && $this->contenu !== null) {
            Storage::disk('public')->delete($this->contenu);
            $timestamp = Carbon::now()->format('Ymd_His');
            $nouveau_nom = $timestamp . '_' . $this->contenu->getClientOriginalName();
            $data['contenu'] = $this->contenu->storeAs('cours', $nouveau_nom, 'public');
        }
        $this->cour->update($data);
        $this->reset();
        session()->flash('successUpdate', 'Modification effectuée avec succès!');

    }
    
    public function delete(Cour $cours) {
        Storage::disk('public')->delete($cours->contenu);
        $cours->delete();
        session()->flash('successDelete', 'Suppression effectuée avec succès!');
    }

    public function resetError(){
        $this->resetErrorBag();
    }

    public function resetChamps(){
        $this->reset();
        $this->resetError();
    }

    #[Layout("components.layouts.template-enseignant")]
    public function render()
    {
        /* je recupere l'identifiant de l'enseignant connecté, je recupère son matricule puis ses cours
        pour pouvoir afficher  */
        $enseignant = 'E2024CFM';
        $cours = Cour::query()->whereHas('enseignant', function($e) use ($enseignant){
            $e->where('matricule', $enseignant);
        });
        if($this->filtre){
            $cours->where('titre', 'LIKE', "%{$this->filtre}%");
        }
        return view('livewire.enseignant.cours-table',[
            'cours' => $cours->get(),
            'promotions' => Promotion::all(),
            'programmes' => Programme::all(),
            'niveaux' => Niveau::all(),
        ]);
    }
}
