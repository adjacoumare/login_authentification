<?php

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

Route::get('/', function () {
    return view('welcome');
});

//Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/admin-register', [App\Http\Controllers\AdministrateurController::class, 'viewForm'])->name('admin.formview');
Route::post('/admin-create', [\App\Http\Controllers\AdministrateurController::class, 'registerAdmin'])->name('admin.create');

Route::get('/secret-register', [\App\Http\Controllers\SecretaireController::class, 'viewForm'])->name('secret.formview');
Route::post('/secret-create', [\App\Http\Controllers\SecretaireController::class, 'registerSecret'])->name('secret.create');

Route::get('/client-register', [\App\Http\Controllers\ClientController::class, 'viewForm'])->name('client.formview');
Route::post('/client-create', [\App\Http\Controllers\ClientController::class, 'registerClient'])->name('client.create');