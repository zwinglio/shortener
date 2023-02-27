<?php

use Illuminate\Support\Facades\Route;
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
Route::get('/links', [LinkController::class, 'index'])->name('shorten');

Route::get('/{identifier}', [LinkController::class, 'redirect'])->name('redirect');
