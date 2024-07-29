<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProductController;
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

require __DIR__.'/auth.php';

Route::get('/producto',[ProductController::class, 'index'])->name('producto.index');
Route::get('/producto/crear',[ProductController::class, 'create'])->name('producto.create');
Route::post('/producto/crear',[ProductController::class, 'store'])->name('producto.store');
Route::delete('/producto/{id}',[ProductController::class, 'delete'])->name('producto.delete');
Route::get('/producto/editar/{product}',[ProductController::class, 'edit'])->name('producto.edit');
Route::put('/producto/actualizar/{product}',[ProductController::class, 'update'])->name('producto.update');
