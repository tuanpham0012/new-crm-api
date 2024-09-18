<?php

namespace App\Http\Requests\CustomerRequest;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\RequiredIf;

class StoreCustomerRequest extends FormRequest
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
            'first_name' => ['required', 'max:100'],
            'last_name' => ['required', 'max:100'],
            'address' => ['nullable', 'max:1000'],
            'emails.data.*.value' => ['required'],
            'phones.data.*.value' => ['required'],
            'messages.data.*.value' => ['required'],
            'bank_id' => [
                new RequiredIf($this->bank_number || $this->bank_username),
            ],
            'bank_number' => [
                new RequiredIf($this->bank_id),
            ],
            'bank_username' => [
                new RequiredIf($this->bank_id),
            ]
        ];
    }

    public function messages(): array
    {
        return [
            // 'emails.data.*.value.required' => 'Value field is required',
            // 'phones.data.*.value.required' => 'Value field is required',
            // 'messages.data.*.value.required' => 'Value field is required',
        ];
    }

    public function attributes()
    {
        return [
            'emails.data.*.value' => 'email',
            'phones.data.*.value' => 'phone',
            'messages.data.*.value' => 'message',
            'bank_id' => 'bank'
        ];
    }
}
