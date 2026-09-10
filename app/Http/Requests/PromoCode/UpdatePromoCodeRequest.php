<?php

namespace App\Http\Requests\PromoCode;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class UpdatePromoCodeRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function rules(): array
    {
        return [
            'title' => 'required|string|max:255',
            'url' => 'nullable|file|mimes:pdf,doc,docx,xls,xlsx,ppt,pptx,txt|max:20480', // 20MB
            'date' => 'required|date',
        ];
    }

    public function messages(): array
    {
        return [
            'title.required' => 'Название документа обязательно для заполнения',
            'title.max' => 'Название документа не должно превышать 255 символов',
            'url.file' => 'Загрузите корректный файл',
            'url.mimes' => 'Допустимые форматы файлов: PDF, DOC, DOCX, XLS, XLSX, PPT, PPTX, TXT, CSV',
            'url.max' => 'Размер файла не должен превышать 20 МБ',
            'date.required' => 'Дата обязательна для заполнения',
            'date.date' => 'Введите корректную дату',
        ];
    }
}
