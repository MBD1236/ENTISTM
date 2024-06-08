<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FrontenseignantRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return  true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'nom' => 'required|string','regex:[A-Z]',
            'prenom' => 'required|string','regex:[A-Z]',
            'cours' => 'required|string','regex:[A-Z]',
            'email' => 'required|email|unique:frontenseignants,email',
            'tel' => 'required|numeric|unique:frontenseignants,tel',
            'link_fb' => 'nullable|string|unique:frontenseignants,link_fb',
            'link_in' => 'nullable|string|unique:frontenseignants,link_in',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ];
    }
}
