<?php

use App\Http\Controllers\LaundryController;
use App\Http\Controllers\SatuanController;
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

Route::get('/satuans', [SatuanController::class, 'index']);
Route::get('/satuan-add', [SatuanController::class, 'create']);
Route::post('/satuan', [SatuanController::class, 'store']);
Route::get('/satuan-edit/{id}', [SatuanController::class, 'edit']);
Route::put('/satuan/{id}', [SatuanController::class, 'update']);
Route::get('/satuan/updateStatus/{id}', [SatuanController::class, 'updateStatus']);

Route::get('/laundrys', [LaundryController::class, 'index']);
Route::get('/laundry-add', [LaundryController::class, 'create']);
Route::post('/laundry', [LaundryController::class, 'store']);
Route::get('/laundry-edit/{id}', [LaundryController::class, 'edit']);
Route::put('/laundry/{id}', [LaundryController::class, 'update']);
Route::get('/laundry/updateStatus/{id}', [LaundryController::class, 'updateStatus']);


Route::get('/laundrys/filter', [LaundryController::class, 'filter']);
