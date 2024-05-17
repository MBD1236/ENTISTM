<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ServiceRequest extends FormRequest
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
        $id = $this->route("service");
        return [
            'matricule' => ['required','string', 'min:2', Rule::unique('services')->ignore($id, 'id')],
            'nom' => ['required','string', 'min:2'],
            'telephone' => ['required','regex:/^([0-9\s\-\+\(\)]*)$/','between:9,18', Rule::unique('services')->ignore($id,'id')],
            'email' => ['required','email', 'min:2', Rule::unique('services')->ignore($id, 'id')],
            'fonction' => ['required','string', 'min:2' ,Rule::unique('services')->ignore($id, 'id')],
            'nomservice' => ['required','string', 'min:2' ,Rule::unique('services')->ignore($id, 'id')],
            'sigle' => ['required','string', 'min:2' ,Rule::unique('services')->ignore($id, 'id')],
        ];
    }
}
