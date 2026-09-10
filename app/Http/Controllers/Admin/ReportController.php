<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Report\StoreReportRequest;
use App\Http\Requests\Report\UpdateReportRequest;
use App\Models\Report;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\View\View;

class ReportController extends Controller
{
    public function index(): View
    {
        $docs = Report::paginate(10);
        return \view('admin.reports.index', compact('docs'));
    }

    public function create(): View
    {
        return \view('admin.reports.create');
    }

    public function store(StoreReportRequest $request)
    {
        $data = $request->validationData();

        if ($request->hasFile('url')) {
            $file = $request->file('url');

            $directory = public_path('uploads/reports');

            if (!is_dir($directory)) {
                mkdir($directory, 0755, true);
            }

            $extension = $file->getClientOriginalExtension();
            $fileName = time() . '_' . Str::random(10) . '.' . $extension;

            $file->move($directory, $fileName);

            $data['url'] = 'uploads/reports/' . $fileName;
        }

        Report::create($data);

        return redirect()
            ->route('admin.reports')
            ->with('success', 'Отчет "' . $data['title'] . '" успешно создан!');
    }

    public function edit(Report $report): View
    {
        return \view('admin.reports.edit', compact('report'));
    }

    public function update(UpdateReportRequest $request, Report $report)
    {
        $data = $request->validationData();

        if ($request->hasFile('url')) {
            $file = $request->file('url');

            $directory = public_path('uploads/reports');

            if (!is_dir($directory)) {
                mkdir($directory, 0755, true);
            }

            $extension = $file->getClientOriginalExtension();
            $fileName = time() . '_' . Str::random(10) . '.' . $extension;

            $file->move($directory, $fileName);

            // Удаляем старый файл, если он есть
            if ($report->url && file_exists(public_path($report->url))) {
                unlink(public_path($report->url));
            }

            $data['url'] = 'uploads/reports/' . $fileName;
        }

        $report->update($data);

        return redirect()
            ->route('admin.reports')
            ->with('success', 'Отчет "' . $data['title'] . '" успешно обновлён!');
    }

    public function destroy(Report $report)
    {
        $report->delete();

        return redirect()
            ->route('admin.reports')
            ->with('success', 'Отчет "' . $report->title . '" перемещён в корзину!');
    }

    public function restore($id)
    {
        $report = Report::withTrashed()->findOrFail($id);
        $report->restore();

        return redirect()
            ->route('admin.reports')
            ->with('success', 'Отчет "' . $report->title . '" успешно восстановлен!');
    }

    public function forceDelete($id)
    {
        $report = Report::withTrashed()->findOrFail($id);

        $title = $report->title;

        if ($report->url && file_exists(public_path($report->url))) {
            unlink(public_path($report->url));
        }

        $report->forceDelete();

        return redirect()
            ->route('admin.reports')
            ->with('success', 'Отчет "' . $title . '" удалён безвозвратно!');
    }
}
