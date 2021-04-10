<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Exports\CustomerExportController;
use App\Http\Controllers\Exports\HostingExportController;
use App\Http\Controllers\Exports\ProjectExportController;
use App\Http\Controllers\Exports\ProjectTaskExportController;
use App\Http\Controllers\Exports\TaskExportController;
use App\Http\Controllers\Exports\UserExportController;

/*
|--------------------------------------------------------------------------
| Excel export routes.
|--------------------------------------------------------------------------
*/

// Export routes.
Route::middleware('auth')->group(function () {
    Route::get('projects/export', ProjectExportController::class)->name('projects.export');
    Route::get('project-tasks/{id}/export', ProjectTaskExportController::class)->name('project_tasks.export');
    Route::get('tasks/export', TaskExportController::class)->name('tasks.export');
    Route::get('users/export', UserExportController::class)->name('users.export');
    Route::get('customers/export', CustomerExportController::class)->name('customers.export');
    Route::get('hostings/export', HostingExportController::class)->name('hostings.export');
});
