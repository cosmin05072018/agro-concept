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
            'nameLand' => 'required|string',
            'suprafata' => 'required|numeric',
        ];
    }

    public function messages()
    {
        return [
            // 'nameLand.required' => 'Campul "Nivel arendă" este obligatoriu.',
            // 'suprafata.numeric' => 'Campul "Nivel arendă" trebuie sa fie un numar.',
            // 'suprafata.min' => 'Valoarea campului "Nivel arendă" trebuie sa fie mai mare de 0.'
        ];
    }
}
