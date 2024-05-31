<?php

namespace App\Livewire\Departements\SE;

use App\Models\Enseignant;
use App\Models\Matiere;
use App\Models\Niveau;
use App\Models\Planification;
use App\Models\Programme;
use App\Models\Promotion;
use App\Models\Semestre;
use Livewire\Attributes\Layout;
use Livewire\Component;

class SePlanificationCoursTables extends Component
{
    public $semestre = 0;
    public $searchProgramme = 0;
    public $promotion = 0;
    public $niveau = 0;
    public $addline = false;
    public $editingId;

    public $enseignant_id;
    public $matiere_id;
    public $promotion_id;
    public $niveau_id;
    public $programme_id;
    public $semestre_id;

    protected $rules = [
        'matiere_id' => ['required'],
        'enseignant_id' => ['required'],
        'niveau_id' => ['required'],
        'programme_id' => ['required'],
        'promotion_id' => ['required'],
        'semestre_id' => ['required'],
    ];

    public function toggleForm()
    {
        if ($this->addline) {
            return $this->addline = false;
        }
        return $this->addline = true;
    }

    public function edit(planification $planification)
    {
        // dd($planification);
        $this->editingId = $planification->id;
        $this->enseignant_id = $planification->enseignant_id;
        $this->matiere_id = $planification->matiere_id;
        $this->niveau_id = $planification->niveau_id;
        $this->promotion_id = $planification->promotion_id;
        $this->programme_id = $planification->programme_id;
        $this->semestre_id = $planification->semestre_id;
    }

    public function update()
    {
        $data = $this->validate();
        $planification = Planification::find($this->editingId);
        $planification->update($data);

        $this->cancel();
        session()->flash('success', 'Modification effectuée avec succès!');
    }

    public function cancel()
    {
        $this->reset('editingId');
    }

    public function delete(Planification $planification)
    {
        $planification->delete();
        session()->flash('success', 'Suppression effectuée avec succès!');
    }

    public function save()
    {
        $data = $this->validate();
        Planification::create($data);
        $this->reset();

        session()->flash('success', 'Ajout effectuée avec succès!');
    }

    public function clearStatus()
    {
        $this->resetErrorBag();
    }

  
    #[Layout("components.layouts.template-departements")]
    public function render()
    {
        $query = Planification::query()->whereHas('programme', function($p){
            $p->where('programme', 'Energétique');
        });

        // dd($query);
        if ($this->searchProgramme !== 0) {
            $query->where('programme_id', $this->searchProgramme);
        }

        if ($this->promotion !== 0) {
            $query->where('promotion_id', $this->promotion);
        }

        if ($this->semestre !== 0) {
            $query->where('semestre_id', $this->semestre);
        }

        if ($this->niveau !== 0) {
            $query->where('niveau_id', $this->niveau);
        }

        $planifications = $query->paginate(10);


        $matieres = Matiere::whereHas('programme', function ($subquery) {
                    $subquery->where('programme', 'Energétique');
                })->orderBy('created_at', 'asc')->get();
                
        return view('livewire.departements.s-e.se-planification-cours-tables',[
            'planifications' => $planifications,
            'matieres' => $matieres,
            'enseignants' => Enseignant::whereHas('departement', function($d){
                $d->where('departement', 'Sciences des Energies');
            })->get(),
            'promotions' => Promotion::all(),
            'semestres' => Semestre::all(),
            'niveaux' => Niveau::all(),
            'programmes' => Programme::where('programme', 'Energétique')->get()
        ]);
    }
}
