<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PromoCode\StorePromoCodeRequest;
use App\Http\Requests\PromoCode\UpdatePromoCodeRequest;
use App\Models\PromoCode;
use Illuminate\View\View;
use Illuminate\Support\Str;

class PromoCodeController extends Controller
{
    public function index(): View
    {
        $promoCodes = PromoCode::paginate(10);
        return view('admin.promoCode.index', compact('promoCodes'));
    }

    public function create(): View
    {
        return view('admin.promoCode.create');
    }

    public function store(StorePromoCodeRequest $request)
    {
        $data = $request->validationData();

        if ($request->hasFile('url')) {
            $file = $request->file('url');

            $directory = public_path('uploads/promoCode');

            if (!is_dir($directory)) {
                mkdir($directory, 0755, true);
            }

            $extension = $file->getClientOriginalExtension();
            $fileName = time() . '_' . Str::random(10) . '.' . $extension;

            $file->move($directory, $fileName);

            $data['url'] = 'uploads/promoCode/' . $fileName;
        }

        PromoCode::create($data);

        return redirect()
            ->route('admin.promo-codes')
            ->with('success', 'Промокод "' . $data['title'] . '" успешно создан!');
    }

    public function edit(PromoCode $promoCode): View
    {
        return view('admin.promoCode.edit', compact('promoCode'));
    }

    public function update(UpdatePromoCodeRequest $request, PromoCode $promoCode)
    {
        $data = $request->validationData();

        if ($request->hasFile('url')) {
            $file = $request->file('url');

            $directory = public_path('uploads/promoCode');

            if (!is_dir($directory)) {
                mkdir($directory, 0755, true);
            }

            $extension = $file->getClientOriginalExtension();
            $fileName = time() . '_' . Str::random(10) . '.' . $extension;

            $file->move($directory, $fileName);

            // Удаляем старый файл, если он есть
            if ($promoCode->url && file_exists(public_path($promoCode->url))) {
                unlink(public_path($promoCode->url));
            }

            $data['url'] = 'uploads/promoCode/' . $fileName;
        }

        $promoCode->update($data);

        return redirect()
            ->route('admin.promo-codes')
            ->with('success', 'Промокод "' . $data['title'] . '" успешно обновлён!');
    }

    public function destroy(PromoCode $promoCode)
    {
        $promoCode->delete();

        return redirect()
            ->route('admin.promo-codes')
            ->with('success', 'Промокод "' . $promoCode->title . '" перемещён в корзину!');
    }

    public function restore($id)
    {
        $promoCode = PromoCode::withTrashed()->findOrFail($id);
        $promoCode->restore();

        return redirect()
            ->route('admin.promo-codes')
            ->with('success', 'Промокод "' . $promoCode->title . '" успешно восстановлен!');
    }

    public function forceDelete($id)
    {
        $promoCode = PromoCode::withTrashed()->findOrFail($id);

        $title = $promoCode->title;

        if ($promoCode->url && file_exists(public_path($promoCode->url))) {
            unlink(public_path($promoCode->url));
        }

        $promoCode->forceDelete();

        return redirect()
            ->route('admin.promo-codes')
            ->with('success', 'Промокод "' . $title . '" удалён безвозвратно!');
    }
}
