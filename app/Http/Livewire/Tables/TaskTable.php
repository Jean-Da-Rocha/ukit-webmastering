<?php

namespace App\Http\Livewire\Tables;

use App\Http\Livewire\Tables\Column;
use App\Http\Livewire\Tables\TableComponent;
use App\Models\Task;
use App\Models\User;
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
     * Route name used to export
     * tasks data in .xlsx format.
     *
     * @var string
     */
    public $exportRouteName = 'tasks.export';

    /** @var bool */
    public bool $showDetailsRoute = true;

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
            Column::make('Task name', 'name')
                ->format(fn (Task $model) => generate_html_link(route('tasks.details', $model->id), $model->name))
                ->searchable()
                ->sortable(),
            Column::make('Project name', 'project.name')->searchable()->sortable(),
            Column::make('Project creator', 'user.username')->searchable()->sortable(),
            Column::make('Task duration', 'duration')
                ->format(fn (Task $model) => format_time($model->duration))
                ->searchable()
                ->sortable(),
            Column::make('Starting date', 'starting_date')->searchable()->sortable(),
            Column::make('Actions')->format(function (Task $model) {
                if (
                    auth()->user()->can('update', $model)
                    || auth()->user()->can('delete', $model)
                ) {
                    return view('vendor.includes.actions_buttons', ['model' => $model]);
                }
            })
            ->hideBoth(! User::hasTasks()),
        ];
    }
}
