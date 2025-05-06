<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminCarrierUserRequest extends FormRequest
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
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email',
        'is_active' => 'required|string',
        'company_address' => 'required|string|max:255',
        'authority' => 'required|string|max:255',
        'dot' => 'required|string|max:255',
        'mc' => 'required|string|max:255',
        'scac_code' => 'required|string|max:255',
        'country' => 'required|string|max:255',
        'caat_code' => 'required|string|max:255',
        'service_category' => 'required|string|max:255',
        'phone' => 'required|string|max:12',
        'transfer_approval_documents' => 'required|file|mimes:pdf,jpg,jpeg,png|max:2048',
        'insurance_certificate' => 'required|file|mimes:pdf,jpg,jpeg,png|max:2048',
        ];
    }
}
