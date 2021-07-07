<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\CarController;


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

Route::get('/', function () {
    return redirect('/car');
});

Route::get('/car', [CarController::class, 'index'])->name('car.index');
Route::get('/car/{id}', [CarController::class, 'show'])->name('car.show');
Route::get('/car/{id}/edit', [CarController::class, 'edit'])->name('car.edit');
Route::get('/car/{id}/details', [CarController::class, 'details'])->name('car.details');
Route::put('/car/{id}', [CarController::class, 'update'])->name('car.update');


