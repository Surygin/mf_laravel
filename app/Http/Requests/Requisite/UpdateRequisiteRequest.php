<?php

namespace App\Http\Requests\Requisite;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateRequisiteRequest extends FormRequest
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
            'inn' => ['nullable', 'string', 'max:255'],
            'rs_number' => ['nullable', 'string', 'max:255'],
            'cs_number' => ['nullable', 'string', 'max:255'],
            'kpp' => ['nullable', 'string', 'max:255'],
            'bik' => ['nullable', 'string', 'max:255'],
            'ogrn' => ['nullable', 'string', 'max:255'],
            'bank' => ['nullable', 'string', 'max:255'],
        ];
    }

    public function messages()
    {
        return [
            'inn.string' => 'ИНН должен быть строкой.',
            'inn.max' => 'ИНН не должен превышать 255 символов.',

            'rs_number.string' => 'Расчетный счет должен быть строкой.',
            'rs_number.max' => 'Расчетный счет не должен превышать 255 символов.',

            'cs_number.string' => 'Корреспондентский счет должен быть строкой.',
            'cs_number.max' => 'Корреспондентский счет не должен превышать 255 символов.',

            'kpp.string' => 'КПП должен быть строкой.',
            'kpp.max' => 'КПП не должен превышать 255 символов.',

            'bik.string' => 'БИК должен быть строкой.',
            'bik.max' => 'БИК не должен превышать 255 символов.',

            'ogrn.string' => 'ОГРН должен быть строкой.',
            'ogrn.max' => 'ОГРН не должен превышать 255 символов.',

            'bank.string' => 'Банк должен быть строкой.',
            'bank.max' => 'Банк не должен превышать 255 символов.',
        ];
    }

    public function attributes()
    {
        return [
            'inn' => 'ИНН',
            'rs_number' => 'расчетный счет',
            'cs_number' => 'корреспондентский счет',
            'kpp' => 'КПП',
            'bik' => 'БИК',
            'ogrn' => 'ОГРН',
            'bank' => 'банк',
        ];
    }
}
