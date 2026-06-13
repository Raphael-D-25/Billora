<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/products',[ProductController::class,'index'])->name('product_index');
Route::get('/product_add', [ProductController::class, 'add'])->name('product_add');
Route::post('product_store', [ProductController::class, 'store'])->name('product_store');
Route::get('/product_edit/{id}', [ProductController::class, 'edit'])->name('product_edit');
Route::put('/product_update/{id}', [ProductController::class, 'update'])->name('product_update');
Route::delete('/product_delete/{id}', [ProductController::class, 'destroy'])->name('product_delete');


require __DIR__.'/auth.php';
