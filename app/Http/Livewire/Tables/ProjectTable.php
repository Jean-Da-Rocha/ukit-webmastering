<?php

namespace App\Http\Livewire\Tables;

use App\Http\Livewire\Tables\{Column, TableComponent};
use App\Models\Project;
use App\Traits\Livewire\WithDeleteConfirmation;

use Illuminate\Database\Eloquent\Builder;

class ProjectTable extends TableComponent
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
        return Project::with(['customer', 'tasks'])->select('projects.*');
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
            Column::make('Project name', 'name')->searchable()->sortable(),
            Column::make('Starting date', 'starting_date')->searchable()->sortable(),
            Column::make('Customer', 'customer.designation')->searchable()->sortable(),
            Column::make('Total tasks time')->view('vendor.includes.projects.total_tasks_time'),
            Column::make('Authorizations')->view('vendor.includes.projects.authorizations'),
            Column::make('Actions')->view('vendor.includes.actions_buttons'),
        ];
    }
}
