<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Contact\UpdateContactRequest;
use App\Models\Contact;
use App\Models\Requisite;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ContactController extends Controller
{
    public function edit(): View
    {
        $contact = Contact::firstOrFail();

        return view('admin.contacts.edit', compact('contact'));
    }

    public function update(UpdateContactRequest $request): \Illuminate\Http\RedirectResponse
    {

        $contact = Contact::firstOrFail();

        $validated = $request->validated();

        $contact->update($validated);

        return redirect()
            ->route('contacts.edit')
            ->with('success', 'Контактные данные успешно обновлены.');
    }
}
