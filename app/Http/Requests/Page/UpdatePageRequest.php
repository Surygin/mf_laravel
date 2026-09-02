<?php

namespace App\Http\Requests\Page;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdatePageRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
//    public function authorize(): bool
//    {
//        return true;
//    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => [
                'required',
                'string',
                'max:255',
                Rule::unique('pages', 'title')->ignore($this->route('page')),
            ],
            'description' => 'nullable|string|max:500',
            'content' => 'nullable|string',
        ];
    }

    public function messages(): array
    {
        return [
            'title.required' => 'Название страницы обязательно для заполнения.',
            'title.max' => 'Название страницы не может превышать 255 символов.',
            'title.unique' => 'Страница с таким названием уже существует.',
            'description.max' => 'Описание не может превышать 500 символов.',
        ];
    }

    public function attributes(): array
    {
        return [
            'title' => 'Название страницы',
            'description' => 'Описание',
            'content' => 'Содержание',
        ];
    }
}
