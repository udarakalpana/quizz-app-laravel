<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class QuestionCreateRequest extends FormRequest
{
    private array $validateRules = ['required', 'string', 'min:1'];

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
            'question' => $this->validateRules,
            'correct' => $this->validateRules,
            'answer1' => $this->validateRules,
            'answer2' => $this->validateRules,
            'answer3' => $this->validateRules,
            'answer4' => $this->validateRules,
        ];
    }
}
