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
| Livewire Routes.
|--------------------------------------------------------------------------
*/
Route::middleware('auth')->group(function () {
    Route::view('projects', 'livewire.projects.index')->name('projects.index');
    Route::get('projects/create', CreateProject::class)->name('projects.create');
    Route::get('projects/{id}/edit', EditProject::class)->name('projects.edit');

    Route::view('tasks', 'livewire.tasks.index')->name('tasks.index');
    Route::get('tasks/create', CreateTask::class)->name('tasks.create');
    Route::get('tasks/{id}/edit', EditTask::class)->name('tasks.edit');

    Route::resource('users', UserController::class);
    Route::resource('customers', CustomerController::class);
});
