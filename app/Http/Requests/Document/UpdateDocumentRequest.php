<?php

namespace App\Http\Requests\Document;

use Illuminate\Contracts\Validation\ValidationRule;
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
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $docId = $this->route('doc');

        return [
            'title' => 'required|string|max:255',
            'date' => 'nullable|date',
            'url' => 'nullable|file|mimes:pdf,doc,docx,jpg,jpeg,png,gif,webp|max:5120',
        ];
    }

    public function messages(): array
    {
        return [
            'title.required' => 'Название документа обязательно для заполнения.',
            'title.max' => 'Название не может превышать 255 символов.',
            'date.date' => 'Поле "Дата документа" должно быть корректной датой.',
            'url.file' => 'Поле "Файл документа" должно быть файлом.',
            'url.mimes' => 'Поддерживаемые форматы: pdf, PDF, DOC, DOCX, JPG, JPEG, PNG, GIF, WEBP.',
            'url.max' => 'Размер файла не должен превышать 5MB.',
        ];
    }

    public function attributes(): array
    {
        return [
            'title' => 'Название документа',
            'date' => 'Дата документа',
            'url' => 'Файл документа',
        ];
    }
}
