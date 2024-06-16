<?php

namespace App\Livewire\Administrateur;

use App\Models\Role;
use Livewire\Attributes\Layout;
use Livewire\Component;
use PhpParser\Node\Stmt\TryCatch;

class RolesTables extends Component
{

    public Role $roles;
    public $role;

    public function rules() {
        return [
            'role' => ['required','string', 'regex:([a-z])', 'unique:roles'],
        ];
    }
    public function rulesEdit() {
        return [
            'role' => ['required','string', 'regex:([a-z])'],
        ];
    }

    public function resetError(){
        $this->resetErrorBag();
    }

    public function resetChamps(){
        $this->reset();
        $this->resetError();
    }

    public function edit(Role $roles) {
        $this->roles = $roles;
        $this->role = $roles->role;
    }

    public function store() {

        $data = $this->validate($this->rules());
        Role::create($data);
        $this->reset();
        session()->flash('success', 'Ajout effectué avec succès!');

    }
    public function update() {
        $data = $this->validate($this->rulesEdit());
        $this->roles->update($data);
        $this->reset();
        session()->flash('successUpdate', 'Modification effectuée avec succès!');
    }
    public function delete(Role $role) {
        try {
            $role->delete();
            session()->flash('successDelete', 'Suppression effectuée avec succès!');
        } catch (\Throwable $th) {
            session()->flash('errorDelete', "Une erreur s'est produite :" . $th->getMessage());
        }
    }
    #[Layout("components.layouts.template-administrateur")]
    public function render()
    {
        $rules = Role::orderBy('created_at', 'desc');
        return view('livewire.administrateur.roles-tables',[
            'rules' => $rules->get()
        ]);
    }
}
