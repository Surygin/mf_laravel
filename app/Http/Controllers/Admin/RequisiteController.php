<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Requisite\UpdateRequisiteRequest;
use App\Models\Requisite;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class RequisiteController extends Controller
{
    public function edit(): View
    {
        $requisite = Requisite::firstOrFail();

        return \view('admin.requisites.edit', compact('requisite'));
    }

    public function update(UpdateRequisiteRequest $request): RedirectResponse
    {

        $requisite = Requisite::firstOrFail();

        $validated = $request->validated();

        $requisite->update($validated);

        return redirect()
            ->route('requisites.edit')
            ->with('success', 'Реквизиты успешно обновлены.');
    }
}
