<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class addContractRequest extends FormRequest
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
            'nume' => 'required',
            'prenume' => 'required',
            'data_incepere' => 'required',
            'data_incheiere' => 'required',
            'locul_terenului' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'nume.required' => 'Campul "Nume" este obligatoriu.',
            'prenume.required' => 'Campul "Prenume" este obligatoriu.',
            'data_incepere.required' => 'Campul "Data incepere" este obligatoriu.',
            'data_incheiere.required' => 'Campul "Dataincheiere" este obligatoriu.',
            'locul_terenului.required' => 'Campul "Localitate" este obligatoriu.',
        ];
    }
}
