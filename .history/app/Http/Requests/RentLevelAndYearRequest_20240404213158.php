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
            'rentLevel' => 'required|numeric|min:1', // rentLevel trebuie să fie numeric și mai mare decât 0
            'yearSelect' => 'required|digits:4|integer', // yearSelect trebuie să fie un număr întreg de exact 4 cifre
        ];
    }
}
