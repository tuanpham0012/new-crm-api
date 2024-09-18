<?php

namespace App\Http\Requests\UserRequest;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
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
            'name' => [
                'required',
                'max:255',
            ],
            'email' => [
                'required',
                'email',
                'regex:/(.+)@(.+)\.(.+)/i',
                'max:50'
            ],
            'phone' => [
                'required',
                'max:12'
            ],
            'birthday' => [
                'date'
            ],
            'address' => [
                'nullable',
                'string',
                'max:500',
            ],
            'avatar' => [
                'nullable',
                'string'
            ],
            'password' => [
                'required',
                'max:30'
            ],
            'note' => [
                'nullable',
                'string'
            ],
            'banks.data.*.bank_id' => [
                'required',
            ],
            'banks.data.*.bank_username' => [
                'required',
                'string'
            ],
            'banks.data.*.bank_number' => [
                'required',
                'string'
            ]
        ];
    }

    public function messages(){
        return [
            'banks.data.*.bank_id.required' => 'Bank field is required',
            'banks.data.*.bank_username.required' => 'Bank Username field is required',
            'banks.data.*.bank_number.required' => 'Bank Number field is required',
        ];
    }
}
