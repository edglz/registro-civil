<?php

use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [DashboardController::class, 'index'])->middleware(['auth', 'verified']);

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');
Route::get('/matrimonio', [DashboardController::class, 'matrimonio'])->middleware(['auth', 'verified']);
Route::get('/rectificaciones', [DashboardController::class, 'rectificaciones'])->middleware(['auth', 'verified']);
Route::get('/defunciones', [DashboardController::class, 'defuncion'])->middleware(['auth', 'verified']);
Route::get('/nacimiento', [DashboardController::class, 'nacimiento'])->middleware(['auth', 'verified']);
Route::post('/crud', [DashboardController::class, 'genCrud'])->middleware(['auth', 'verified']);
Route::post('/deleteRow', [DashboardController::class, 'deleteRow'])->middleware(['auth', 'verified']);
Route::post('/showDetail', [DashboardController::class, 'getField']);
Route::get('/archivos', [DashboardController::class, 'archivos'])->middleware(['auth', 'verified']);
Route::get('/ayuda', [DashboardController::class, 'ayuda'])->middleware(['auth', 'verified']);
Route::get('/inicio', [DashboardController::class, 'inicio'])->middleware(['auth', 'verified']);
Route::post('/uploadFile', [DashboardController::class, 'uploadFile'])->middleware(['auth', 'verified']);
Route::post('/updateField', [DashboardController::class, 'updateFile'])->middleware(['auth', 'verified']);

Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth']], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});
Route::get('/error', function () {
    abort(500);
});

require __DIR__ . '/auth.php';
