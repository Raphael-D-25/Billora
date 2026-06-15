<?php

use App\Http\Controllers\BillingController;
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

//Product CRUD

Route::get('/products',[ProductController::class,'index'])->name('product_index');
Route::get('/product_add', [ProductController::class, 'add'])->name('product_add');
Route::post('product_store', [ProductController::class, 'store'])->name('product_store');
Route::get('/product_edit/{id}', [ProductController::class, 'edit'])->name('product_edit');
Route::put('/product_update/{id}', [ProductController::class, 'update'])->name('product_update');
Route::delete('/product_delete/{id}', [ProductController::class, 'destroy'])->name('product_delete');

//Billing

Route::get('/bills',[BillingController::class, 'index'])->name('bill_index');
Route::get('/bill_add',[BillingController::class, 'add'])->name('bill_add');
Route::post('bill_store',[BillingController::class, 'store'])->name('bill_store');
Route::get('/bill_edit/{id}',[BillingController::class, 'edit'])->name('bill_edit');
Route::put('/bill_update/{id}',[BillingController::class, 'update'])->name('bill_update');
Route::delete('bill_delete/{id}',[BillingController::class, 'destroy'])->name('bill_delete');

require __DIR__.'/auth.php';
