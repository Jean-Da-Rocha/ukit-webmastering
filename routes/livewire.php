<?php


use Illuminate\Support\Facades\Route;

use App\Http\Livewire\Actions\Customers\{CreateCustomer, EditCustomer};
use App\Http\Livewire\Actions\Hostings\{CreateHosting, EditHosting};
use App\Http\Livewire\Actions\Projects\{CreateProject, EditProject};
use App\Http\Livewire\Actions\Servers\{CreateServer, EditServer};
use App\Http\Livewire\Actions\Tasks\{CreateTask, EditTask};
use App\Http\Livewire\Actions\Users\{CreateUser, EditUser};

/*
|--------------------------------------------------------------------------
| Livewire Routes.
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {
    // TODO: refactor with a foreach.
    Route::view('projects', 'livewire.projects.index')->name('projects.index');
    Route::get('projects/create', CreateProject::class)->name('projects.create');
    Route::get('projects/{id}/edit', EditProject::class)->name('projects.edit');

    Route::view('tasks', 'livewire.tasks.index')->name('tasks.index');
    Route::get('tasks/create', CreateTask::class)->name('tasks.create');
    Route::get('tasks/{id}/edit', EditTask::class)->name('tasks.edit');

    Route::view('users', 'livewire.users.index')->name('users.index');
    Route::get('users/create', CreateUser::class)->name('users.create');
    Route::get('users/{id}/edit', EditUser::class)->name('users.edit');

    Route::view('customers', 'livewire.customers.index')->name('customers.index');
    Route::get('customers/create', CreateCustomer::class)->name('customers.create');
    Route::get('customers/{id}/edit', EditCustomer::class)->name('customers.edit');

    Route::view('hostings', 'livewire.hostings.index')->name('hostings.index');
    Route::get('hostings/create', CreateHosting::class)->name('hostings.create');
    Route::get('hostings/{id}/edit', EditHosting::class)->name('hostings.edit');

    Route::view('servers', 'livewire.servers.index')->name('servers.index');
    Route::get('servers/create', CreateServer::class)->name('servers.create');
    Route::get('servers/{id}/edit', EditServer::class)->name('servers.edit');
});
