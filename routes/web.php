<?php

use App\Http\Controllers\Admin\CKEditorController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\DocumentController;
use App\Http\Controllers\Admin\KidController;
use App\Http\Controllers\Admin\PromoCodeController;
use App\Http\Controllers\Admin\ReportController;
use App\Http\Controllers\Admin\RequisiteController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PageController as FrontPageController;
use App\Http\Controllers\Admin\PageController as AdminPageController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'home'])->name('home');

Route::get('/history', [FrontPageController::class, 'about'])->name('history');
Route::get('/sms', [FrontPageController::class, 'sms'])->name('sms');
Route::get('/qr-sber', [FrontPageController::class, 'qrSber'])->name('qr-sber');
Route::get('/person/{kid}/show', [HomeController::class, 'person'])->name('person');

Route::get('/reports', [HomeController::class, 'reports'])->name('reports');

Route::get('/documents', [HomeController::class, 'docs'])->name('documents');

Route::get('/promo_codes', [HomeController::class, 'promoCodes'])->name('promo.codes');

//Админка

Route::get('/admin/panel', function () {
    return view('admin.test');
})->name('admin');

Route::prefix('admin')->group(function () {
    Route::post('/ck/image/upload', [CKEditorController::class, 'imageUpload'])->name('ckeditor.image.upload');

    Route::get('/kids', [KidController::class, 'index'])->name('admin.kids');
    Route::get('/kids/create', [KidController::class, 'create'])->name('admin.kids.create');
    Route::get('/kids/{kid}/edit', [KidController::class, 'edit'])->name('admin.kids.edit');
    Route::post('/kids/store', [KidController::class, 'store'])->name('admin.kids.store');
    Route::put('/kids/{kid}', [KidController::class, 'update'])->name('admin.kids.update');
    Route::get('/kids/{kid}/delete', [KidController::class, 'destroy'])->name('admin.kids.delete');

    Route::get('/pages', [AdminPageController::class, 'index'])->name('admin.pages');
    Route::get('/pages/{page}/edit', [AdminPageController::class, 'edit'])->name('admin.pages.edit');
    Route::put('/pages/{page}', [AdminPageController::class, 'update'])->name('admin.pages.update');

    Route::get('/docs', [DocumentController::class, 'index'])->name('admin.docs');
    Route::get('/docs/create', [DocumentController::class, 'create'])->name('admin.docs.create');
    Route::post('/docs', [DocumentController::class, 'store'])->name('admin.docs.store');
    Route::get('/docs/{doc}/edit', [DocumentController::class, 'edit'])->name('admin.docs.edit');
    Route::put('/docs/{doc}', [DocumentController::class, 'update'])->name('admin.docs.update');
    Route::get('/docs/{doc}/delete', [DocumentController::class, 'destroy'])->name('admin.docs.delete');

    Route::get('/reports', [ReportController::class, 'index'])->name('admin.reports');
    Route::get('/reports/create', [ReportController::class, 'create'])->name('admin.reports.create');
    Route::post('/reports', [ReportController::class, 'store'])->name('admin.reports.store');
    Route::get('/reports/{report}/edit', [ReportController::class, 'edit'])->name('admin.reports.edit');
    Route::put('/reports/{report}', [ReportController::class, 'update'])->name('admin.reports.update');
    Route::get('/reports/{report}/delete', [ReportController::class, 'destroy'])->name('admin.reports.delete');

    Route::get('/promo-codes', [PromoCodeController::class, 'index'])->name('admin.promo-codes');
    Route::get('/promo-codes/create', [PromoCodeController::class, 'create'])->name('admin.promo-codes.create');
    Route::post('/promo-codes', [PromoCodeController::class, 'store'])->name('admin.promo-codes.store');
    Route::get('/promo-codes/{promoCode}/edit', [PromoCodeController::class, 'edit'])->name('admin.promo-codes.edit');
    Route::put('/promo-codes/{promoCode}', [PromoCodeController::class, 'update'])->name('admin.promo-codes.update');
    Route::get('/promo-codes/{promoCode}/delete', [PromoCodeController::class, 'destroy'])->name('admin.promo-codes.delete');

    Route::get('/contacts/edit', [ContactController::class, 'edit'])->name('contacts.edit');
    Route::post('/contacts/update', [ContactController::class, 'update'])->name('contacts.update');

    Route::get('/requisites/edit', [RequisiteController::class, 'edit'])->name('requisites.edit');
    Route::put('/requisites', [RequisiteController::class, 'update'])->name('requisites.update');
});
