<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{ScrapController, MangaController};


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', [MangaController::class, 'index'])->middleware('auth');;

Route::get('/scrap', [ScrapController::class, 'scrap'])->middleware('auth');

Route::resource('Mangas', MangaController::class)->middleware('auth');
Route::get('nom/mangas', [MangaController::class, 'search'])->name('mangas.nom')->middleware('auth');
