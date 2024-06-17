<?php

namespace App\Livewire\Administrateur;

use App\Actions\Fortify\PasswordValidationRules;
use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithPagination;

class UtilisateursTables extends Component
{
    use WithPagination;
    
    public User $user;
    public $name;
    public $matricule;
    public $email;
    public $password;
    public $role_id;

    public function rules() {
        return [
            'name' => ['required', 'string', 'max:255'],
            'matricule' => ['required','string', 'max:14', 'unique:users'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8'],
            'role_id' => ['required'],
        ];
    }
    public function rulesEdit() {
        return [
            'name' => ['required', 'string', 'max:255'],
            'matricule' => ['required','string', 'max:14', Rule::unique('users')->ignore($this->user->id, 'id')],
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users')->ignore($this->user->id, 'id')],
            'password' => ['required', 'string', 'min:8'],
            'role_id' => ['required'],
        ];
    }

    public function resetError(){
        $this->resetErrorBag();
    }

    public function resetChamps(){
        $this->reset();
        $this->resetError();
    }

    public function edit(User $user) {
        $this->user = $user;
        $this->name = $user->name;
        $this->matricule = $user->matricule;
        $this->role_id = $user->role_id;
        $this->email = $user->email; 
    }

    public function store() {
        $data = $this->validate($this->rules());
        $data['password'] = Hash::make($this->password);
        User::create($data);
        $this->reset();
        session()->flash('success', 'Ajout effectué avec succès!');
    }
    public function update() {
        $data = $this->validate($this->rulesEdit());
        $data['password'] = Hash::make($this->password);

        $this->user->update($data);
        $this->reset();
        session()->flash('successUpdate', 'Modification effectuée avec succès!');
    }
    public function delete(User $user) {
        try {
            $user->delete();
            session()->flash('successDelete', 'Suppression effectuée avec succès!');
        } catch (\Throwable $th) {
            session()->flash('errorDelete', "Une erreur s'est produite :" . $th->getMessage());
        }
    }

    #[Layout("components.layouts.template-administrateur")]
    public function render()
    {
        $roles = Role::all();
        $users = User::orderBy('created_at', 'desc')->paginate(15);
        return view('livewire.administrateur.utilisateurs-tables',[
            'users' => $users,
            'roles' => $roles
        ]);
    }
}
