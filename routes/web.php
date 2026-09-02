<?php

use App\Http\Controllers\Admin\CKEditorController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\KidController;
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

Route::get('/reports', function () {
    return view('reports');
})->name('reports');

Route::get('/documents', function () {
    return view('docs');
})->name('documents');

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

    Route::get('/contacts/edit', [ContactController::class, 'edit'])->name('contacts.edit');
    Route::post('/contacts/update', [ContactController::class, 'update'])->name('contacts.update');

    Route::get('/requisites/edit', [RequisiteController::class, 'edit'])->name('requisites.edit');
    Route::put('/requisites', [RequisiteController::class, 'update'])->name('requisites.update');
});
