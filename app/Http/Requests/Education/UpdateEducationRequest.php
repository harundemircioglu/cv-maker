<?php

namespace App\Http\Requests\Education;

use Illuminate\Foundation\Http\FormRequest;

class UpdateEducationRequest extends FormRequest
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
            'study_program' => ['required', 'string', 'max:255'],
            'place_of_education' => ['required', 'string', 'max:255'],
            'is_present' => ['required', 'integer', 'in:0,1'],
            'start_date' => ['required', 'date', 'date_format:Y-m'],
            'end_date' => ['required_if:is_present,0', 'date', 'date_format:Y-m'],
            'projects' => ['nullable', 'array'],
            'projects.*' => ['nullable', 'string'],
        ];
    }

    public function messages(): array
    {
        return [
            //
        ];
    }
}
