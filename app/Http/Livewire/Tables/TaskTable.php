<?php

namespace App\Http\Livewire\Tables;

use App\Http\Livewire\Tables\{Column, TableComponent};
use App\Models\Task;
use App\Traits\Livewire\WithDeleteConfirmation;

use Illuminate\Database\Eloquent\Builder;

class TaskTable extends TableComponent
{
    use WithDeleteConfirmation;

    /**
     * Emit an event to access model identifiers
     * in the delete confirmation modal.
     *
     * @var array
     */
    protected $listeners = ['getModelIdentifiers'];

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
            Column::make('Task name', 'name')->searchable()->sortable(),
            Column::make('Project name', 'project.name')->searchable()->sortable(),
            Column::make('Project creator', 'user.username')->searchable()->sortable(),
            Column::make('Task duration', 'duration')
                ->format(fn (Task $model) => format_time($model->duration))
                ->searchable()
                ->sortable(),
            Column::make('Starting date', 'starting_date')->searchable()->sortable(),
            Column::make('Actions')->view('vendor.includes.actions_buttons'),
        ];
    }
}