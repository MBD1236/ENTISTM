<?php

namespace App\Http\Requests;

use App\Models\Attestation;
use Illuminate\Foundation\Http\FormRequest;

class AttestationRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'reference_id' => 'required|string',
            'attestation_type_id' => 'required|integer|exists:attestation_types,id',
            'etudiant_id' => 'required|integer|exists:etudiants,id',
            'niveau_id' => 'required|integer|exists:niveaux,id',
            'annee_universitaire_id' => 'required|integer|exists:annee_universitaires,id',
            'programme_id' => 'required|integer|exists:programmes,id',
        ];
    }

    // methode pour la verifiation de l'existence d'une autre attestation de meme type a la meme annne universitaire
    public function withValidator($validator)
    {
        $validator->after(function ($validator) {
            $data = $this->validated();

            // request de verification
            $existingAttestation = Attestation::where('etudiant_id', $data['etudiant_id'])
                ->where('niveau_id', $data['niveau_id'])
                ->where('annee_universitaire_id', $data['annee_universitaire_id'])
                ->where('id', '!=', $this->attestation ? $this->attestation->id : null)
                ->first();

            if ($existingAttestation) {
                $validator->errors()->add('etudiant_id', "Cet étudiant a déjà une attestation de même type,niveau et anneé");
            }
        });
    }
}
