<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRentLevel extends FormRequest
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
            'valoareNoua'=> 'required|numeric|min:1'
        ];
    }

    public function messages()
    {
        return [
            'valoareNoua.required' => 'Campul "Actualizează nivel arendă" este obligatoriu.',
            'valoareNoua.numeric' => 'Campul "Actualizează nivel arendă" trebuie sa fie un numar.',
            'valoareNoua.min' => 'Valoarea campului "Actualizează nivel arendă" trebuie sa fie mai mare de 0.'
        ];
    }
}
