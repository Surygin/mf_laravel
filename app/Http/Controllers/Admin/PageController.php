<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Page\UpdatePageRequest;
use App\Models\Page;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class PageController extends Controller
{
    public function index(): View
    {
        $pages = Page::paginate(20);

        return \view('admin.pages.index', compact('pages'));
    }

    public function edit(Page $page): View
    {

        return \view('admin.pages.edit', compact('page'));
    }

    public function update(UpdatePageRequest $request, Page $page)
    {

        // Обновляем данные
        $page->title = $request->input('title');
        $page->description = $request->input('description');
        $page->content = $request->input('content');

        // Сохраняем
        $page->save();

        // Редирект с уведомлением
        return redirect()
            ->route('admin.pages')
            ->with('success', 'Страница "' . $page->title . '" успешно обновлена!');
    }
}
