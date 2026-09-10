<?php

namespace App\Http\Requests\Document;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class StoreDocumentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
//    public function authorize(): bool
//    {
//        return false;
//    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'required|string|max:255',
            'url' => 'required|file|mimes:pdf,doc,docx,xls,xlsx,ppt,pptx,txt|max:20480', // 20MB
        ];
    }

    /**
     * Get custom messages for validator errors.
     */
    public function messages(): array
    {
        return [
            'title.required' => 'Название документа обязательно для заполнения',
            'title.max' => 'Название документа не должно превышать 255 символов',
            'url.required' => 'Файл документа обязателен для загрузки',
            'url.file' => 'Загрузите корректный файл',
            'url.mimes' => 'Допустимые форматы файлов: PDF, DOC, DOCX, XLS, XLSX, PPT, PPTX, TXT, CSV',
            'url.max' => 'Размер файла не должен превышать 20 МБ',
        ];
    }
}
