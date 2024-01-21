<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AutoController;
use App\Http\Controllers\SiswaController;

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
    return redirect()->route('dashboard');
});

Route::controller(AutoController::class)->group(function (){ 
    Route::get('register','register')->name('register');
    Route::post('register','registerSave')->name('register.save');

    Route::get('login','login')->name('login');
    Route::post('login', 'loginAction')->name('login.action');
    Route::get('logout', 'logout')->middleware('auth')->name('logout');
});
  
Route::middleware('auth')->group(function () {
    Route::get('dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
 
    Route::controller(SiswaController::class)->prefix('siswas')->group(function () {
        Route::get('', 'index')->name('siswas');
        Route::get('create', 'create')->name('siswas.create');
        Route::post('store', 'store')->name('siswas.store');
        Route::get('show/{id}', 'show')->name('siswas.show');
        Route::get('edit/{id}', 'edit')->name('siswas.edit');
        Route::put('edit/{id}', 'update')->name('siswas.update');
        Route::delete('destroy/{id}', 'destroy')->name('siswas.destroy');
    });
 
});