<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RentLevelAndYearRequest extends FormRequest
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
            'rentLevel' => 'required|numeric|min:1',
            'yearSelect' => 'required|digits:4|integer',
        ];
    }

    public function messages()
    {
        return [
            'rentLevel.required' => 'Campul rentLevel este obligatoriu.',
            'rentLevel.numeric' => 'Campul rentLevel trebuie sa fie un numar.',
            'rentLevel.min' => 'Valoarea campului rentLevel trebuie sa fie mai mare de 0.',
            'yearSelect.required' => 'Campul yearSelect este obligatoriu.',
            'yearSelect.digits' => 'Campul yearSelect trebuie sa contina 4 cifre.',
            'yearSelect.integer' => 'Campul yearSelect trebuie sa fie un numar intreg.',
        ];
    }
}
