<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class QueryReqeust extends FormRequest
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
            'with' => ['sometimes', 'string'],
            'page' => ['sometimes', 'numeric'],
            'per_page' => ['sometimes', 'numeric'],
        ];
    }
}
