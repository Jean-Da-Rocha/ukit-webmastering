<?php

use App\Http\Livewire\Auth\Login;
use App\Http\Livewire\Auth\Register;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CustomerController;

use App\Http\Livewire\Actions\Project\CreateProject;
use App\Http\Livewire\Actions\Project\EditProject;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Livewire\Actions\Tasks\CreateTask;
use App\Http\Livewire\Actions\Tasks\EditTask;

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
    Route::get('/', fn () => redirect(route('login')));
    Route::get('login', Login::class)->name('login');
    Route::get('register', Register::class)->name('register');
});

Route::middleware('auth')->group(function () {
    Route::get('home', HomeController::class)->name('home');

    Route::resource('users', UserController::class);
    Route::resource('customers', CustomerController::class);

    Route::post('logout', LogoutController::class)->name('logout');
});
