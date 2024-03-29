<?php

use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web routes.
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::middleware('guest')->group(function () {
    Route::get('/', fn () => redirect(route('login')));
});

Route::middleware('auth')->group(function () {
    Route::get('home', HomeController::class)->name('home');
    Route::post('logout', LogoutController::class)->name('logout');

    Route::get('users/{id}/profile', UserController::class)->name('users.profile');
    Route::get('tasks/{id}/details', TaskController::class)->name('tasks.details');
});
