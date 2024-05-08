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
            'suprafata' => 'required|numeric|min:0.1',
        ];
    }

    public function messages()
    {
        return [
            'nameLand.required' => 'Campul "Nume teren" este obligatoriu.',
            'suprafata.required' => 'Campul "Suprafață teren" este obligatoriu.',
            'suprafata.integer' => 'Campul "Suprafață teren" trebuie sa fie un numar.',
            'suprafata.min' => 'Valoarea campului "Suprafață teren" trebuie sa fie mai mare de 0.'
        ];
    }
}
