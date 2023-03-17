<?php

use App\Http\Controllers\ClientController;
use App\Http\Controllers\FilmController;
use App\Http\Controllers\RentController;
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

// Route::get('/', function () {
//     return view('index');
// });
Route::get('/', [ClientController::class, 'index'])->name('clients.index');

Route::get('/films', [FilmController::class, 'index'])->name('films.index');
Route::get('/film/create', [FilmController::class, 'create'])->name('film.create');
Route::post('/film/store', [FilmController::class, 'store'])->name('film.store');
Route::put('/film/edit/{id}', [FilmController::class, 'edit'])->name('film.edit');
Route::put('/film/update', [FilmController::class, 'update'])->name('film.update');
Route::delete('/film/destroy/{id}', [FilmController::class, 'destroy'])->name('film.destroy');


Route::get('/rents', [RentController::class, 'index'])->name('rents.index');
Route::get('/rent/create', [RentController::class, 'create'])->name('rent.create');
Route::post('/rent/store', [RentController::class, 'store'])->name('rent.store');
Route::put('/rent/edit/{id}', [RentController::class, 'edit'])->name('rent.edit');
Route::put('/film/update', [FilmController::class, 'update'])->name('rent.update');
Route::delete('/rent/destroy/{id}', [RentController::class, 'destroy'])->name('rent.destroy');
