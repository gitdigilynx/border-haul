<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateDocumentRequest extends FormRequest
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
            'document_type' => 'required|string|max:255',
            'expires_at' => 'nullable|date',
            'status' => 'nullable|string|in:pending,approved,rejected',
            'notes' => 'nullable|string',
            'file_path' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:20480', // adjust as needed
        ];
    }
}
