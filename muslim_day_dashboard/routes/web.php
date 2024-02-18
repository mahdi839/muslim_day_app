<?php

use App\Http\Controllers\DuaCategoryController;
use App\Http\Controllers\DuaItemController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/dashboard', function () {
    return view('dashboard.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::resource('dua_category', DuaCategoryController::class);
    Route::resource('dua_items', DuaItemController::class);
    Route::get('/recycle_bin', [DuaItemController::class, 'recycle_bin'])->name('recycle_bin');
    Route::get('recycle_bin/restore/{id}', [DuaItemController::class, 'dua_items_restore'])->name('dua_items.restore');
    Route::get('recycle_bin/permanent/delete/{id}', [DuaItemController::class, 'dua_items_permanent_delete'])->name('dua_items.permanent_delete');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
