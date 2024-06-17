<?php

namespace App\Actions\Fortify;

use App\Models\Etudiant; // Importer le modèle Etudiant
use App\Models\Role;
use App\Models\Team;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Jetstream\Jetstream;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Create a newly registered user.
     *
     * @param  array<string, string>  $input
     */
    public function create(array $input): User
    {
        $validator = Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'matricule' => ['required', 'string', 'max:14'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => $this->passwordRules(),
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['accepted', 'required'] : '',
        ]);

        // Vérifier si le matricule existe dans la table des étudiants
        $matricule = $input['matricule'];
        $etudiant = Etudiant::where('ine', $matricule)->first();

        if (!$etudiant) {
            // Si le matricule n'existe pas, ajouter une erreur de validation
            $validator->errors()->add('matricule', 'Ce matricule n\'existe pas dans la base de données.');
            throw new ValidationException($validator);
        }
        $role = Role::where('role', 'etudiant')->pluck('id')->first();

        $validator->validate();

        return User::create([
            'name' => $input['name'],
            'matricule' => $input['matricule'],
            'role_id' => $role,
            'email' => $input['email'],
            'password' => Hash::make($input['password']),
        ]);
    }

    /**
     * Create a personal team for the user.
     */
    // protected function createTeam(User $user): void
    // {
    //     $user->ownedTeams()->save(Team::forceCreate([
    //         'user_id' => $user->id,
    //         'name' => explode(' ', $user->name, 2)[0]."'s Team",
    //         'personal_team' => true,
    //     ]));
    // }
}
