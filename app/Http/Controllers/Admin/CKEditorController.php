<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CKEditorController extends Controller
{
    public function imageUpload(Request $request)
    {
        // Логирование для отладки
        \Log::info('CKEditor upload request', [
            'has_file' => $request->hasFile('upload'),
            'func_num' => $request->input('CKEditorFuncNum'),
            'files' => $request->allFiles()
        ]);

        if (!$request->hasFile('upload')) {
            return $this->errorResponse(
                $request->input('CKEditorFuncNum'),
                'Файл не найден. Убедитесь, что поле называется "upload".'
            );
        }

        $file = $request->file('upload');

        // Проверка валидности файла
        if (!$file->isValid()) {
            return $this->errorResponse(
                $request->input('CKEditorFuncNum'),
                'Файл повреждён или не может быть загружен.'
            );
        }

        // Проверка MIME типа
        $allowedMimeTypes = ['image/jpeg', 'image/png', 'image/gif', 'image/webp', 'image/svg+xml'];
        $mimeType = $file->getClientMimeType();

        if (!in_array($mimeType, $allowedMimeTypes)) {
            return $this->errorResponse(
                $request->input('CKEditorFuncNum'),
                "Можно загружать только изображения (JPEG, PNG, GIF, WEBP, SVG). Ваш файл: {$mimeType}"
            );
        }

        // Проверка размера (максимум 5MB)
        $maxSize = 5 * 1024 * 1024; // 5MB
        if ($file->getSize() > $maxSize) {
            return $this->errorResponse(
                $request->input('CKEditorFuncNum'),
                "Размер файла не должен превышать 5MB. Ваш файл: " . round($file->getSize() / 1024 / 1024, 2) . "MB"
            );
        }

        try {
            // Генерация уникального имени
            $extension = $file->getClientOriginalExtension();
            $fileName = date('Y-m-d_His') . '_' . Str::random(10) . '.' . $extension;

            // Путь сохранения
            $path = public_path('uploads/posts/');

            // Создание папки, если её нет
            if (!file_exists($path)) {
                mkdir($path, 0777, true);
            }

            // Сохранение файла
            $file->move($path, $fileName);

            // Формирование URL
            $url = asset('uploads/posts/' . $fileName);
            $funcNum = $request->input('CKEditorFuncNum');

            \Log::info('CKEditor file uploaded successfully', [
                'file' => $fileName,
                'url' => $url
            ]);

            return $this->successResponse($funcNum, $url, 'Изображение успешно загружено!');

        } catch (\Exception $e) {
            \Log::error('CKEditor upload error', [
                'message' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);

            return $this->errorResponse(
                $request->input('CKEditorFuncNum'),
                'Ошибка сервера при загрузке файла. Пожалуйста, попробуйте снова.'
            );
        }
    }

    private function successResponse($funcNum, $url, $message = '')
    {
        $response = sprintf(
            '<script>window.parent.CKEDITOR.tools.callFunction(%d, "%s", "%s");</script>',
            $funcNum,
            $url,
            $message
        );

        return response($response)->header('Content-Type', 'text/html; charset=utf-8');
    }

    private function errorResponse($funcNum, $message)
    {
        $response = sprintf(
            '<script>window.parent.CKEDITOR.tools.callFunction(%d, "", "%s");</script>',
            $funcNum,
            addslashes($message) // Экранируем кавычки
        );

        return response($response)->header('Content-Type', 'text/html; charset=utf-8');
    }
}
