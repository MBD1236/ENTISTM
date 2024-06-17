<?php

namespace App\Livewire\Administrateur;

use App\Models\Promotion;
use Illuminate\Validation\Rule;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithPagination;

class PromotionsTables extends Component
{
    use WithPagination;
    
    public Promotion $promotions;
    public $promotion;

    public function rules() {
        return [
            'promotion' => ['required','string', 'regex:([a-z])', 'unique:promotions'],
        ];
    }
    public function rulesEdit() {
        return [
            'promotion' => ['required','string', 'regex:([a-z])', Rule::unique('promotions')->ignore($this->promotions->id, 'id')],
        ];
    }

    public function resetError(){
        $this->resetErrorBag();
    }

    public function resetChamps(){
        $this->reset();
        $this->resetError();
    }

    public function edit(Promotion $promotions) {
        $this->promotions = $promotions;
        $this->promotion = $promotions->promotion;
    }

    public function store() {
        $data = $this->validate($this->rules());
        Promotion::create($data);
        $this->reset();
        session()->flash('success', 'Ajout effectué avec succès!');
    }
    public function update() {
        $data = $this->validate($this->rulesEdit());
        $this->promotions->update($data);
        $this->reset();
        session()->flash('successUpdate', 'Modification effectuée avec succès!');
    }
    public function delete(Promotion $promotion) {
        try {
            $promotion->delete();
            session()->flash('successDelete', 'Suppression effectuée avec succès!');
        } catch (\Throwable $th) {
            session()->flash('errorDelete', "Une erreur s'est produite :" . $th->getMessage());
        }
    }

    #[Layout("components.layouts.template-administrateur")]
    public function render()
    {
        $promotionss = Promotion::orderBy('created_at', 'desc');
        return view('livewire.administrateur.promotions-tables',[
            'promotionss' => $promotionss->paginate(15)
        ]);
    }
}
