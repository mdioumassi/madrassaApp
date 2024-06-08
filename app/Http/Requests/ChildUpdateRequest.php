<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ChildUpdateRequest extends FormRequest
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
            'firstname' => ['required', 'string', 'max:255'],
            'lastname' => ['required', 'string', 'max:255'],
            'birthdate' => ['required', 'date'],
            'genre' => ['required', 'string', 'max:1'],
            'french_class' => ['required', 'string', 'max:255'],
        ];
    }
}
