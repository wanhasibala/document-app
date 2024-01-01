<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\ProfileController;
use App\Models\Document;
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
    return view('welcome');
});

Route::get('/dashboard', function () {
    $documents = Document::all();
    return view('dashboard', compact('documents'));
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/create', [DocumentController::class, 'create'])->name('documents.create');
    Route::get('/document', [DocumentController::class, 'index'])->name('documents.index');
    Route::post('/document', [DocumentController::class, 'store'])->name('documents.store');
});
Route::middleware('admin', 'verified')->group(function(){
    Route::get('/dashboard/admin', [AdminController::class,'index'])->name('admin.index');
    Route::get('/dashboard/admin/create', [AdminController::class, 'create'])->name('admin.create');
    Route::get('/dashboard/admin/{user}/edit', [AdminController::class, 'edit'])->name('admin.edit');
    Route::delete('/dashboard/admin/{user}', [AdminController::class, 'destroy'])->name('admin.destroy');
    Route::post('/dashboard/admin', [AdminController::class, 'store'])->name('admin.store');
    Route::put('/admin/users/{user}', [AdminController::class, 'update'])->name('admin.update');
});
require __DIR__.'/auth.php';
