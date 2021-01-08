<?php

namespace App\Http\Livewire\Tables;

use App\Http\Livewire\Tables\TableComponent;
use App\Models\Task;
use App\Traits\Livewire\WithDeleteConfirmation;

use Illuminate\Database\Eloquent\Builder;

class ProjectTasksTable extends TableComponent
{
    use WithDeleteConfirmation;

    /**
     * @var int
     */
    public int $projectId = 1;

    /**
     * Array of event listeners for Livewire.
     *
     * @var array
     */
    protected $listeners = ['getModelIdentifiers'];

    /**
     * Set the initial table properties.
     *
     * @param  int  $id
     * @return void
     */
    public function mount(int $id)
    {
        $this->projectId = $id;
    }

    /**
     * Return an Eloquent model query to be used by the table.
     *
     * @return Builder
     */
    public function query(): Builder
    {
        return Task::with('user:id,username')
            ->where('project_id', (int) $this->projectId)
            ->select('tasks.*');
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
            Column::make('Task author', 'user.username')->searchable()->sortable(),
            Column::make('Task duration', 'duration')->searchable()->sortable(),
            Column::make('Starting date', 'starting_date')->searchable()->sortable(),
            Column::make('Actions')->view('vendor.includes.actions_buttons'),
        ];
    }
}
