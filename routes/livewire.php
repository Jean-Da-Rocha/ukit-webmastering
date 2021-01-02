<?php

use App\Http\Livewire\Actions\Settings\SaveContactEmail;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Livewire Routes.
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {
    $livewireCrudRouteNames = ['projects', 'tasks', 'users', 'customers', 'hostings', 'servers', 'billing_status'];

    foreach ($livewireCrudRouteNames as $routeName) {
        Route::view(Str::slug($routeName), "livewire.{$routeName}.index")->name("{$routeName}.index");
        Route::get(Str::slug($routeName) . '/create', generate_class_namespace($routeName, 'create'))
            ->name("{$routeName}.create");
        Route::get(Str::slug($routeName) . '/{id}/edit', generate_class_namespace($routeName, 'edit'))
            ->name("{$routeName}.edit");
    }

    Route::get('settings', SaveContactEmail::class)->name('settings.index');
});