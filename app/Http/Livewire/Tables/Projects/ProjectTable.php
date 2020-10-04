<?php

namespace App\Http\Livewire\Tables\Projects;

use App\Models\Project;
use App\Http\Livewire\Tables\{Column, TableComponent};

use Illuminate\Database\Eloquent\Builder;

class ProjectTable extends TableComponent
{
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
            Column::make('Project name', 'project_name')->searchable()->sortable(),
            Column::make('Starting date', 'project_starting_date')->searchable()->sortable(),
            Column::make('Customer', 'customer.designation')->searchable()->sortable(),
        ];
    }
}
