<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CKEditorController extends Controller
{
    /**
     * Загрузка изображений через CKEditor
     */
    public function imageUpload(Request $request)
    {
        // Проверяем, есть ли файл
        if (!$request->hasFile('upload')) {
            return $this->errorResponse($request->input('CKEditorFuncNum'), 'Файл не найден');
        }

        $file = $request->file('upload');

        // Проверяем, что это изображение
        if (!$file->isValid() || !in_array($file->getClientMimeType(), ['image/jpeg', 'image/png', 'image/gif', 'image/webp', 'image/svg+xml'])) {
            return $this->errorResponse($request->input('CKEditorFuncNum'), 'Можно загружать только изображения (JPEG, PNG, GIF, WEBP, SVG)');
        }

        // Проверяем размер (максимум 5MB)
        if ($file->getSize() > 5 * 1024 * 1024) {
            return $this->errorResponse($request->input('CKEditorFuncNum'), 'Размер файла не должен превышать 5MB');
        }

        try {
            // Генерируем уникальное имя
            $extension = $file->getClientOriginalExtension();
            $fileName = time() . '_' . Str::random(10) . '.' . $extension;

            // Сохраняем файл
            $path = public_path('uploads/posts/');

            // Создаём папку, если её нет
            if (!file_exists($path)) {
                mkdir($path, 0777, true);
            }

            $file->move($path, $fileName);

            // Формируем ответ для CKEditor
            $CKEditorFuncNum = $request->input('CKEditorFuncNum');
            $url = asset('uploads/posts/' . $fileName);
            $message = 'Изображение успешно загружено!';

            return $this->successResponse($CKEditorFuncNum, $url, $message);

        } catch (\Exception $e) {
            return $this->errorResponse($request->input('CKEditorFuncNum'), 'Ошибка при загрузке: ' . $e->getMessage());
        }
    }

    /**
     * Успешный ответ для CKEditor
     */
    private function successResponse($funcNum, $url, $message = '')
    {
        $response = "<script>window.parent.CKEDITOR.tools.callFunction($funcNum, '$url', '$message');</script>";
        return response($response)->header('Content-Type', 'text/html; charset=utf-8');
    }

    /**
     * Ответ с ошибкой для CKEditor
     */
    private function errorResponse($funcNum, $message)
    {
        $response = "<script>window.parent.CKEDITOR.tools.callFunction($funcNum, '', '$message');</script>";
        return response($response)->header('Content-Type', 'text/html; charset=utf-8');
    }
}
