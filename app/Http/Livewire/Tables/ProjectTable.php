<?php

namespace App\Http\Livewire\Tables;

use App\Actions\TimeCalculation;
use App\Http\Livewire\Tables\Column;
use App\Http\Livewire\Tables\TableComponent;
use App\Models\Project;
use App\Traits\Livewire\WithDeleteConfirmation;
use Illuminate\Database\Eloquent\Builder;

class ProjectTable extends TableComponent
{
    use WithDeleteConfirmation;

    /**
     * Route name used to export
     * projects data in .xlsx format.
     *
     * @var string
     */
    public $exportRouteName = 'projects.export';

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
        return Project::select('projects.*')
            ->with('customer:id,designation')
            ->with('tasks:id,duration,project_id');
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
                ->hideBoth(auth()->user()->cannot('performAdminAction')),
        ];
    }
}
