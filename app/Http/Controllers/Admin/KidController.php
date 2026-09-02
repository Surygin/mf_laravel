<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreKidRequest;
use App\Http\Requests\UpdateKidRequest;
use App\Models\Fundraising;
use App\Models\Kid;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class KidController extends Controller
{
    public function index(): View
    {
        $kids = Kid::with('fundraisings')
            ->orderBy('id', 'desc')
            ->paginate(20);
        return \view('admin.kids.index', compact('kids'));
    }

    public function create(): View
    {
        return \view('admin.kids.create');
    }

    public function edit(Kid $kid): View
    {
        return \view('admin.kids.edit', compact('kid'));
    }

    /**
     * Записить данные ребенка
     */
    public function store(StoreKidRequest $request)
    {
        $data = $request->validated();

        // is_active определяем самостоятельно через наличие checkbox
        $data['is_active'] = $request->has('is_active');

        // Сохраняем путь к новому аватару,
        // чтобы при ошибке удалить загруженный файл
        $avatarPath = null;

        try {

            /*
             * =========================================================
             * 1. Загрузка аватара
             * =========================================================
             */

            if ($request->hasFile('avatar')) {

                $file = $request->file('avatar');
                $avatarPath = $file->store('avatars', 'public');
                $data['avatar'] = $avatarPath;
            }

            /*
             * =========================================================
             * 2. Отделяем сумму сбора от данных ребенка
             * =========================================================
             *
             * target_amount находится в таблице fundraisings,
             * а не в таблице kids.
             */

            $targetAmount = $data['target_amount'];

            unset($data['target_amount']);

            /*
             * =========================================================
             * 3. Создаем ребенка и сбор в одной транзакции
             * =========================================================
             */

            DB::beginTransaction();

            $kid = Kid::create($data);

            Fundraising::create([
                'kid_id' => $kid->id,
                'current_amount' => 0,
                'target_amount' => $targetAmount,
                'is_active' => $data['is_active'],
            ]);

            DB::commit();

            /*
             * =========================================================
             * 5. Успешное завершение
             * =========================================================
             */

            return redirect()
                ->route('admin.kids')
                ->with(
                    'success',
                    'Ребенок "' . $kid->full_name . '" успешно добавлен!'
                );

        } catch (\Throwable $e) {

            /*
             * =========================================================
             * 6. Откат транзакции
             * =========================================================
             */

            if (DB::transactionLevel() > 0) {
                DB::rollBack();
            }

            /*
             * =========================================================
             * 8. Если аватар уже был сохранен —
             *    удаляем его
             * =========================================================
             */

            if (
                $avatarPath &&
                Storage::disk('public')->exists($avatarPath)
            ) {

                Storage::disk('public')->delete($avatarPath);
            }

            /*
             * =========================================================
             * 9. Возвращаем пользователя обратно
             * =========================================================
             */

            return back()
                ->withInput()
                ->with(
                    'error',
                    'Произошла ошибка при добавлении ребенка. Пожалуйста, попробуйте снова.'
                );
        }
    }


    /**
     * Обновить данные ребенка
     */
    public function update(UpdateKidRequest $request, Kid $kid)
    {
        $data = $request->validated();

        // is_active определяем самостоятельно через наличие checkbox
        $data['is_active'] = $request->has('is_active');

        // Сохраняем путь старого аватара
        $oldAvatarPath = $kid->avatar;

        // Путь нового аватара
        $newAvatarPath = null;

        try {

            if ($request->hasFile('avatar')) {

                $file = $request->file('avatar');

                $newAvatarPath = $file->store('avatars', 'public');

                $data['avatar'] = $newAvatarPath;
            }

            $targetAmount = $data['target_amount'];
            $currentAmount = $data['current_amount'];

            unset($data['target_amount']);

            DB::beginTransaction();

            // Обновляем данные ребенка
            $kid->update($data);

            // Получаем существующий сбор
            $fundraising = $kid->fundraisings()->first();

            if ($fundraising) {

                $fundraising->update([
                    'current_amount' => $currentAmount,
                    'target_amount' => $targetAmount,
                    'is_active' => $data['is_active'],
                ]);

            } else {

                // На случай, если у ребенка почему-то еще нет сбора
                Fundraising::create([
                    'kid_id' => $kid->id,
                    'current_amount' => 0,
                    'target_amount' => $targetAmount,
                    'is_active' => $data['is_active'],
                ]);
            }

            if ($fundraising->current_amount >= $fundraising->target_amount) {
                // Активируем сбор
                $fundraising->update(['is_active' => false]);

                // Активируем ребенка
                $kid->update(['is_active' => false]);
            }

            DB::commit();

            if (
                $newAvatarPath &&
                $oldAvatarPath &&
                $oldAvatarPath !== $newAvatarPath &&
                Storage::disk('public')->exists($oldAvatarPath)
            ) {

                Storage::disk('public')->delete($oldAvatarPath);
            }

            /*
             * =========================================================
             * 6. Успешное завершение
             * =========================================================
             */

            return redirect()
                ->back()
                ->with(
                    'success',
                    'Ребенок "' . $kid->full_name . '" успешно обновлен!'
                );

        } catch (\Throwable $e) {

            /*
             * =========================================================
             * 7. Откат транзакции
             * =========================================================
             */

            if (DB::transactionLevel() > 0) {
                DB::rollBack();
            }


            /*
             * =========================================================
             * 9. Если новый аватар уже был сохранен —
             *    удаляем его
             * =========================================================
             */

            if (
                $newAvatarPath &&
                Storage::disk('public')->exists($newAvatarPath)
            ) {

                Storage::disk('public')->delete($newAvatarPath);
            }

            return back()
                ->withInput()
                ->with(
                    'error',
                    'Произошла ошибка при обновлении ребенка. Пожалуйста, попробуйте снова.'
                );
        }
    }

    /**
     * Удалить ребенка (мягкое удаление)
     */
    public function destroy(Kid $kid)
    {
        // Мягкое удаление (в deleted_at проставляется дата)
        $kid->delete();

        return redirect()
            ->route('admin.kids')
            ->with('success', 'Ребенок "' . $kid->full_name . '" перемещен в корзину!');
    }

    /**
     * Восстановить ребенка из корзины
     */
    public function restore($id)
    {
        $kid = Kid::withTrashed()->findOrFail($id);
        $kid->restore();

        return redirect()
            ->route('admin.kids')
            ->with('success', 'Ребенок "' . $kid->full_name . '" восстановлен!');
    }

    /**
     * Полностью удалить ребенка (без возможности восстановления)
     */
    public function forceDelete($id)
    {
        $kid = Kid::withTrashed()->findOrFail($id);

        // Удаляем аватар
        if ($kid->avatar && Storage::disk('public')->exists($kid->avatar)) {
            Storage::disk('public')->delete($kid->avatar);
        }

        // Полное удаление
        $kid->forceDelete();

        return redirect()
            ->route('admin.kids')
            ->with('success', 'Ребенок "' . $kid->full_name . '" полностью удален!');
    }
}
