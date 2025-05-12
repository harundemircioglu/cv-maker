<?php

namespace App\Http\Requests\Plan;

use Illuminate\Foundation\Http\FormRequest;

class StorePlanFeatureRequest extends FormRequest
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
            'key' => ['required', 'string'],
            'value' => ['required', 'string'],
            'plan_ids' => ['required', 'array'],
            'plan_ids.*' => ['required', 'exists:plans,id'],
        ];
    }

    public function messages(): array
    {
        return [
            //
        ];
    }
}
