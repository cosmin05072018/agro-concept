<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class addLand extends FormRequest
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
            'nameLand' => 'required',
            'judet' => 'required',
            'localitate' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'nameLand.required' => 'Campul "Nume teren" este obligatoriu.',
            'judet.required' => 'Campul "Nume teren" este obligatoriu.',
            'localitate.required' => 'Campul "Nume teren" este obligatoriu.',
        ];
    }
}
