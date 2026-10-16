<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ContactRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    protected function failedValidation(Validator $validator)
    {
        dd($validator->errors()->all(), $this->all());
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255',],
            'email' => ['required', 'email', 'max:255'],
            'reason' => [
                'required',
                Rule::in([
                    'doubt',
                    'tech_problem',
                    'suggestion',
                    'report_content',
                    'privacy_policy',
                    'other'
                    ]),
                ],
            'message' => ['required', 'string', 'max:1000'],
            'privacy_policy' => ['accepted'],
        ];
    }

    public function messages(): array
    {
        return [
            'privacy_policy.accepted' => 'Debes aceptar la política de privacidad para poder enviar el mensaje.',
            'reason.in' => 'El motivo seleccionado no es válido.',
        ];
    }
}
