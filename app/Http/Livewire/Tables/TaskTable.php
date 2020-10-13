<?php

namespace App\Http\Livewire\Tables;

use App\Models\Task;
use App\Http\Livewire\Tables\{Column, TableComponent};

use Illuminate\Database\Eloquent\Builder;

class TaskTable extends TableComponent
{
    /**
     * Return an Eloquent model query to be used by the table.
     *
     * @return Builder
     */
    public function query(): Builder
    {
        return Task::with(['project', 'user'])->select('tasks.*');
    }

    /**
     * Set the array of columns to use in the table.
     *
     * @return array
     */
    public function columns(): array
    {
        return [
            Column::make('#', 'id')->sortable(),
            Column::make('Task name', 'task_name')->searchable()->sortable(),
            Column::make('Project name', 'project.project_name')->searchable()->sortable(),
            Column::make('Project creator', 'user.username')->searchable()->sortable(),
            Column::make('Task duration', 'task_duration')
                ->view('vendor.includes.tasks.time_per_task')
                ->searchable()
                ->sortable(),
            Column::make('Starting date', 'task_starting_date')->searchable()->sortable(),
            Column::make('Actions')->view('vendor.includes.actions_buttons'),
        ];
    }
}
