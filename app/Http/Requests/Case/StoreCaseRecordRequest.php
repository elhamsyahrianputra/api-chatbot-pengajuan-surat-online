<?php

namespace App\Http\Requests\Case;

use Illuminate\Foundation\Http\FormRequest;

class StoreCaseRecordRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'problem' => 'required|string',
            'solution' => 'string',
            'keywords' => 'string',
            'frequency' => 'numeric',
            'confidence_score' => 'decimal:1,2|between:0,1',
            'status' => 'string',
        ];
    }
}
