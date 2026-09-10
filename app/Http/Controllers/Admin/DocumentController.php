<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Document\StoreDocumentRequest;
use App\Http\Requests\Document\UpdateDocumentRequest;
use Illuminate\Http\Request;
use App\Models\Document;
use Illuminate\View\View;
use Illuminate\Support\Str;

class DocumentController extends Controller
{
    public function index(): View
    {
        $docs = Document::paginate(10);
        return \view('admin.docs.index', compact('docs'));
    }

    public function create(): View
    {
        return \view('admin.docs.create');
    }

    public function store(StoreDocumentRequest $request)
    {
        $doc = new Document();
        $doc->title = $request->input('title');

        if ($request->hasFile('url')) {
            $file = $request->file('url');

            $directory = public_path('uploads/documents');

            if (!is_dir($directory)) {
                mkdir($directory, 0755, true);
            }

            $extension = $file->getClientOriginalExtension();
            $fileName = time() . '_' . Str::random(10) . '.' . $extension;
            $fullPath = $directory . '/' . $fileName;

            $file->move($directory, $fileName);

            $doc->url = 'uploads/documents/' . $fileName;
        }

        $doc->save();

        return redirect()
            ->route('admin.docs')
            ->with('success', 'Документ "' . $doc->title . '" успешно создан!');
    }

    public function edit(Document $doc): View
    {
        return \view('admin.docs.edit', compact('doc'));
    }

    public function update(Request $request, $id)
    {
        \Log::info('=== DOCUMENT UPDATE START ===', [
            'id' => $id,
            'method' => $request->method(),
            'content_type' => $request->header('Content-Type'),

            'has_file' => $request->hasFile('url'),

            'file' => $request->file('url'),

            'file_error' => $request->file('url')
                ? $request->file('url')->getError()
                : null,

            'file_error_message' => $request->file('url')
                ? $request->file('url')->getErrorMessage()
                : null,

            'file_size' => $request->file('url')
                ? $request->file('url')->getSize()
                : null,

            'original_name' => $request->file('url')
                ? $request->file('url')->getClientOriginalName()
                : null,

            'is_valid' => $request->file('url')
                ? $request->file('url')->isValid()
                : null,
        ]);

        $doc = Document::findOrFail($id);

        /*
         * Обновляем название
         */
        $doc->title = $request->input('title');

        /*
         * Проверяем загруженный файл
         */
        if ($request->hasFile('url')) {

            $file = $request->file('url');

            \Log::info('=== FILE RECEIVED ===', [
                'original_name' => $file->getClientOriginalName(),
                'size' => $file->getSize(),
                'mime' => $file->getMimeType(),
                'error' => $file->getError(),
                'valid' => $file->isValid(),
                'tmp_path' => $file->getPathname(),
            ]);

            /*
             * Папка для документов
             */
            $directory = public_path('uploads/documents');

            if (!is_dir($directory)) {
                mkdir($directory, 0755, true);
            }

            /*
             * Удаляем старый файл
             */
            if (
                $doc->url &&
                file_exists(public_path($doc->url))
            ) {
                unlink(public_path($doc->url));

                \Log::info('=== OLD FILE DELETED ===', [
                    'old_file' => $doc->url,
                ]);
            }

            /*
             * Генерируем новое имя
             */
            $extension = $file->getClientOriginalExtension();

            $fileName =
                time() .
                '_' .
                Str::random(10) .
                '.' .
                $extension;

            /*
             * Полный путь
             */
            $fullPath = $directory . '/' . $fileName;

            \Log::info('=== START MOVING FILE ===', [
                'directory' => $directory,
                'file_name' => $fileName,
                'full_path' => $fullPath,
            ]);

            /*
             * Перемещаем файл
             */
            $file->move(
                $directory,
                $fileName
            );

            /*
             * Проверяем физическое наличие
             */
            \Log::info('=== FILE AFTER MOVE ===', [
                'full_path' => $fullPath,
                'exists' => file_exists($fullPath),
                'size' => file_exists($fullPath)
                    ? filesize($fullPath)
                    : null,
            ]);

            /*
             * Записываем относительный путь в БД
             */
            $doc->url = 'uploads/documents/' . $fileName;
        }

        /*
         * Сохраняем документ
         */
        $doc->save();

        \Log::info('=== DOCUMENT UPDATE FINISHED ===', [
            'id' => $doc->id,
            'title' => $doc->title,
            'url' => $doc->url,
        ]);

        return redirect()
            ->route('admin.docs')
            ->with(
                'success',
                'Документ "' . $doc->title . '" успешно обновлён!'
            );
    }

    public function destroy(Document $doc)
    {
        $doc->delete();

        return redirect()
            ->route('admin.docs')
            ->with('success', 'Документ "' . $doc->title . '" перемещён в корзину!');
    }

    public function restore($id)
    {
        $report = Document::withTrashed()->findOrFail($id);
        $report->restore();

        return redirect()
            ->route('admin.reports')
            ->with('success', 'Отчет "' . $report->title . '" успешно восстановлен!');
    }

    public function forceDelete($id)
    {
        $report = Document::withTrashed()->findOrFail($id);

        $title = $report->title;

        if ($report->url && file_exists(public_path($report->url))) {
            unlink(public_path($report->url));
        }

        $report->forceDelete();

        return redirect()
            ->route('admin.docs')
            ->with('success', 'Документ "' . $title . '" удалён безвозвратно!');
    }
}
