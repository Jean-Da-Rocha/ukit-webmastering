<?php

use App\Http\Controllers\ProjectController;
use App\Http\Livewire\Actions\BillingStatus\CreateBillingStatus;
use App\Http\Livewire\Actions\BillingStatus\EditBillingStatus;
use App\Http\Livewire\Actions\Categories\CreateCategory;
use App\Http\Livewire\Actions\Categories\EditCategory;
use App\Http\Livewire\Actions\Customers\CreateCustomer;
use App\Http\Livewire\Actions\Customers\EditCustomer;
use App\Http\Livewire\Actions\Hostings\CreateHosting;
use App\Http\Livewire\Actions\Hostings\EditHosting;
use App\Http\Livewire\Actions\Projects\CreateProject;
use App\Http\Livewire\Actions\Projects\EditProject;
use App\Http\Livewire\Actions\Projects\ProjectAuthorizations;
use App\Http\Livewire\Actions\Servers\CreateServer;
use App\Http\Livewire\Actions\Servers\EditServer;
use App\Http\Livewire\Actions\Settings\SaveContactEmail;
use App\Http\Livewire\Actions\Tasks\CreateTask;
use App\Http\Livewire\Actions\Tasks\EditTask;
use App\Http\Livewire\Actions\Users\CreateUser;
use App\Http\Livewire\Actions\Users\EditSelfProfile;
use App\Http\Livewire\Actions\Users\EditUser;
use App\Http\Livewire\Auth\Login;
use App\Http\Livewire\Auth\Register;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Livewire Routes.
|--------------------------------------------------------------------------
*/

Route::middleware('guest')->group(function () {
    Route::get('login', Login::class)->name('login');
    Route::get('register', Register::class)->name('register');
});

Route::middleware('auth')->group(function () {
    // Projects.
    Route::view('projects', 'livewire.projects.index')->name('projects.index');
    Route::get('projects/create', CreateProject::class)->name('projects.create');
    Route::get('projects/{id}/edit', EditProject::class)->name('projects.edit');
    Route::get('projects/{id}/details', ProjectController::class)->name('projects.details');
    Route::get('projects/{id}/authorizations', ProjectAuthorizations::class)->name('projects.authorizations');

    // Categories.
    Route::view('categories', 'livewire.categories.index')->name('categories.index');
    Route::get('categories/create', CreateCategory::class)->name('categories.create');
    Route::get('categories/{id}/edit', EditCategory::class)->name('categories.edit');

    // Tasks.
    Route::view('tasks', 'livewire.tasks.index')->name('tasks.index');
    Route::get('tasks/create', CreateTask::class)->name('tasks.create');
    Route::get('tasks/{id}/edit', EditTask::class)->name('tasks.edit');

    // Users.
    Route::view('users', 'livewire.users.index')->name('users.index');
    Route::get('users/create', CreateUser::class)->name('users.create');
    Route::get('users/{id}/edit', EditUser::class)->name('users.edit');

    // Customers.
    Route::view('customers', 'livewire.customers.index')->name('customers.index');
    Route::get('customers/create', CreateCustomer::class)->name('customers.create');
    Route::get('customers/{id}/edit', EditCustomer::class)->name('customers.edit');

    // Hostings.
    Route::view('hostings', 'livewire.hostings.index')->name('hostings.index');
    Route::get('hostings/create', CreateHosting::class)->name('hostings.create');
    Route::get('hostings/{id}/edit', EditHosting::class)->name('hostings.edit');

    // Servers.
    Route::view('servers', 'livewire.servers.index')->name('servers.index');
    Route::get('servers/create', CreateServer::class)->name('servers.create');
    Route::get('servers/{id}/edit', EditServer::class)->name('servers.edit');

    // Billing status.
    Route::view('billing-status', 'livewire.billing_status.index')->name('billing_status.index');
    Route::get('billing-status/create', CreateBillingStatus::class)->name('billing_status.create');
    Route::get('billing-status/{id}/edit', EditBillingStatus::class)->name('billing_status.edit');

    Route::get('profile/me', EditSelfProfile::class)->name('profile.edit.self');

    Route::get('settings', SaveContactEmail::class)->name('settings.index');
});
