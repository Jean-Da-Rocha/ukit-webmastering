<?php

namespace App\Http\Livewire\Tables;

use App\Models\Project;
use App\Actions\TimeCalculation;
use Illuminate\Support\Facades\Gate;

use Illuminate\Database\Eloquent\Builder;
use App\Traits\Livewire\WithDeleteConfirmation;
use App\Http\Livewire\Tables\{Column, TableComponent};

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
            Column::make('Project name', 'name')
                ->format(fn (Project $model) => generate_html_link(route('projects.details', $model->id), $model->name))
                ->searchable()
                ->sortable(),
            Column::make('Starting date', 'starting_date')->searchable()->sortable(),
            Column::make('Customer', 'customer.designation')->searchable()->sortable(),
            Column::make('Total task time')->format(
                fn (Project $model) => (new TimeCalculation($model))->getTotalTasksTime()
            ),
            Column::make('Authorizations')
                ->view('vendor.includes.projects.authorizations')
                ->hideBoth(auth()->user()->cannot('performWebmasterAction')),
            Column::make('Actions')
                ->view('vendor.includes.actions_buttons')
                ->hideBoth(auth()->user()->cannot('haveAccess')),
        ];
    }
}
