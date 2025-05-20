<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAddressBook extends FormRequest
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
                'name' => 'required|string|max:50',
                'phone' => 'nullable|string|max:20',
                'street_address' => 'required|string|max:50',
                'city' => 'required|string|max:20',
                'state' => 'required|string|max:20',
                'postal_code' => 'required|string|max:5',
                'country' => 'required|string|max:10',
                'type' => 'required',
                'contact_person_name' => 'required|string|max:50',
           ];
    }
}
