<?php

namespace App\Http\Requests\Case;

use Illuminate\Foundation\Http\FormRequest;

class StoreCaseFeedbackRequest extends FormRequest
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
            'case_record_id' => 'required|exists:case_records,id',
            'user_id' => 'required|exists:users,id',
            'type' => 'required|string|in:like,dislike',
        ];
    }
}
