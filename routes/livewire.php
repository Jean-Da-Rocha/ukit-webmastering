<?php


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
        Route::get("{$routeName}/create", generate_class_namespace($routeName, 'create'))
            ->name("{$routeName}.create");
        Route::get("{$routeName}/{id}/edit", generate_class_namespace($routeName, 'edit'))
            ->name("{$routeName}.edit");
    }

    Route::view('settings', 'livewire.settings.index')->name('settings.index');
});
