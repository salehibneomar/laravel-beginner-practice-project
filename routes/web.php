<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\AdminProfileController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\SliderController;
use Illuminate\Support\Facades\Route;

//Frontend Routes
Route::get('/', [FrontendController::class, 'index'])->name('page.home');
Route::get('/brands', [FrontendController::class, 'brandPage'])->name('page.brand');

Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');

Route::middleware(['auth:sanctum', 'verified'])->group(function()
{
    Route::get('/dashboard', function(){
        return view('admin.index');
    })->name('dashboard');

    Route::get('user/profile', function () {
        return abort(401);
    });

    //Category routes
    Route::get('/category/all', [CategoryController::class, 'index'])->name('all.cat');
    Route::post('/category/store', [CategoryController::class, 'store'])->name('store.cat');
    Route::get('/category/edit/{id}', [CategoryController::class, 'edit'])->name('edit.cat');
    Route::post('/category/update/{id}', [CategoryController::class, 'update'])->name('update.cat');
    Route::get('/category/soft-delete/{id}', [CategoryController::class, 'softDestroy'])->name('soft-del.cat');
    Route::get('/category/restore/{id}', [CategoryController::class, 'restore'])->name('restore.cat');
    Route::get('/category/permanent-del/{id}', [CategoryController::class, 'destroy'])->name('permanent-del.cat');
    
    //Brand routes
    Route::get('/brand/all', [BrandController::class, 'index'])->name('all.brand');
    Route::post('/brand/store', [BrandController::class, 'store'])->name('store.brand');
    Route::get('/brand/edit/{id}', [BrandController::class, 'edit'])->name('edit.brand');
    Route::post('/brand/update/{id}', [BrandController::class, 'update'])->name('update.brand');
    Route::get('/brand/soft-delete/{id}', [BrandController::class, 'softDestroy'])->name('soft-del.brand');
    Route::get('/brand/restore/{id}', [BrandController::class, 'restore'])->name('restore.brand');
    Route::get('/brand/permanent-del/{id}', [BrandController::class, 'destroy'])->name('permanent-del.brand');

    //Slider routes
    Route::get('/slider/all', [SliderController::class, 'index'])->name('all.slider');
    Route::post('/slider/store', [SliderController::class, 'store'])->name('store.slider');
    Route::get('/slider/edit/{id}', [SliderController::class, 'edit'])->name('edit.slider');
    Route::post('/slider/update/{id}', [SliderController::class, 'update'])->name('update.slider');
    Route::get('/slider/delete/{id}', [SliderController::class, 'destroy'])->name('del.slider');

    //About routes
    Route::get('/about', [AboutController::class, 'index'])->name('about.home');
    Route::post('/about/store', [AboutController::class, 'store'])->name('about.store');
    Route::get('/about/edit/{id}', [AboutController::class, 'edit'])->name('about.edit');
    Route::post('/about/update/{id}', [AboutController::class, 'update'])->name('about.update');

    //Admin profile routes
    Route::get('/admin/password', [AdminProfileController::class, 'editPassword'])->name('admin.editpass');
    Route::post('/admin/password', [AdminProfileController::class, 'updatePassword'])->name('admin.updatepass');
    Route::get('/admin/profile', [AdminProfileController::class, 'editProfile'])->name('admin.editprofile');
    Route::post('/admin/profile', [AdminProfileController::class, 'updateProfile'])->name('admin.updateprofile');
});