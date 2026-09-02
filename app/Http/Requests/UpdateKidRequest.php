<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateKidRequest extends FormRequest
{
//    public function authorize(): bool
//    {
//        return true;
//    }

    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'name_declension' => 'nullable|string|max:255',
            'history' => 'nullable|string',
            'current_amount' => 'required|numeric|min:0',
            'target_amount' => 'required|numeric|min:0',
            'avatar' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Необходимо указать имя.',
            'last_name.required' => 'Необходимо указать фамилию.',
            'target_amount.required' =>
                'Необходимо указать требуемую сумму.',
            'target_amount.numeric' =>
                'Требуемая сумма должна быть числом.',
            'target_amount.min' =>
                'Требуемая сумма не может быть отрицательной.',
            'avatar.image' =>
                'Загруженный файл не является изображением.',
            'avatar.mimes' =>
                'Допустимые форматы: JPEG, PNG, JPG, GIF, WEBP.',
            'avatar.max' =>
                'Размер изображения не должен превышать 2 МБ.',
        ];
    }
}
