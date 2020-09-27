<?php

use App\Http\Controllers\Auth\LogoutController;
use App\Http\Livewire\Auth\{Login, Register};

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

Route::middleware('guest')->group(function () {
    Route::view('/', 'auth.login');
    Route::get('login', Login::class)->name('login');
    Route::get('register', Register::class)->name('register');
});

Route::middleware('auth')->group(function () {
    Route::view('/', 'home')->name('home');
    Route::post('logout', LogoutController::class)->name('logout');
});
