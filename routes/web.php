<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\FileController;
use App\Http\Controllers\LinkController;

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

Route::post('/links/shorten', [LinkController::class, 'create'])->name('shorten');
Route::get('/links', [LinkController::class, 'index'])->name('links');

Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/auth', [AuthController::class, 'authenticate'])->name('authenticate');

// protected routes
Route::middleware(['auth'])->group(function () {
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('/dashboard', [AuthController::class, 'dashboard'])->name('dashboard');

    Route::get('/create-file', [FileController::class, 'create'])->name('create-file');

    Route::delete('/links/{link}', [LinkController::class, 'destroy'])->name('link.destroy');
    Route::get('/links/{link}', [LinkController::class, 'edit'])->name('link.edit');
    Route::put('/links/{link}', [LinkController::class, 'update'])->name('link.update');
});

Route::get('/{identifier}', [LinkController::class, 'redirect'])->name('redirect');
