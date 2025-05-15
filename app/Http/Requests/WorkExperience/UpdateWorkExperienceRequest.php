<?php

namespace App\Http\Requests\WorkExperience;

use Illuminate\Foundation\Http\FormRequest;

class UpdateWorkExperienceRequest extends FormRequest
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
            'title' => ['required', 'string', 'max:255'],
            'workplace' => ['required', 'string', 'max:255'],
            'is_present' => ['required', 'integer', 'in:0,1'],
            'start_date' => ['required', 'date', 'date_format:Y-m'],
            'end_date' => ['required_if:is_present,0', 'date', 'date_format:Y-m'],
            'city' => ['required', 'string', 'max:255'],
            'tasks' => ['required', 'array'],
            'tasks.*' => ['required', 'string', 'max:255'],
        ];
    }

    public function messages(): array
    {
        return [
            //
        ];
    }
}
