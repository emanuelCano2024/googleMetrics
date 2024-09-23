<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GoogleMetricsController;
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
Route::get('/metrics', [GoogleMetricsController::class, 'index'])->name('metrics.index');
Route::post('/metrics/findMetrics', [GoogleMetricsController::class, 'process'])->name('metrics.process');
Route::post('/metrics/saveMetrics', [GoogleMetricsController::class, 'save'])->name('metrics.save');
Route::post('/metrics/historyMetrics', [GoogleMetricsController::class, 'history'])->name('metrics.history');



