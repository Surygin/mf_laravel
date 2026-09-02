<?php

namespace App\Http\Requests\Contact;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateContactRequest extends FormRequest
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
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules()
    {
        return [
            'phone' => ['nullable', 'string', 'max:255'],
            'email' => ['nullable', 'email', 'max:255'],
            'address' => ['nullable', 'string', 'max:255'],
        ];
    }

    public function messages()
    {
        return [
            'phone.string' => 'Телефон должен быть строкой.',
            'phone.max' => 'Телефон не должен превышать 255 символов.',

            'email.email' => 'Введите корректный email адрес.',
            'email.max' => 'Email не должен превышать 255 символов.',

            'address.string' => 'Адрес должен быть строкой.',
            'address.max' => 'Адрес не должен превышать 255 символов.',
        ];
    }

    public function attributes()
    {
        return [
            'phone' => 'телефон',
            'email' => 'email',
            'address' => 'адрес',
        ];
    }
}
