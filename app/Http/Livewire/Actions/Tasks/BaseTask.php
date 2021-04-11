<?php

namespace App\Http\Livewire\Actions\Tasks;

use App\Models\Project;
use App\Models\Task;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Livewire\Component;

class BaseTask extends Component
{
    use AuthorizesRequests;

    /**
     * @var Task
     */
    public Task $task;

    /**
     * @var bool
     */
    public bool $updateMode = false;

    /**
     * @var array
     */
    protected array $rules = [
        'task.project_id' => ['required', 'integer'],
        'task.quoted' => ['required', 'boolean'],
        'task.quotation_ref' => ['nullable', 'string', 'max:100'],
        'task.billed' => ['required', 'boolean'],
        'task.bill_num' => ['nullable', 'string', 'max:100'],
        'task.duration' => ['required', 'string', 'max:30'],
        'task.starting_date' => ['required', 'date', 'date_format:Y-m-d'],
        'task.name' => ['required', 'string', 'max:255'],
        'task.description' => ['nullable', 'string', 'max:5000'],
    ];

    /**
     * Computed property to get all the projects
     * where the authenticated user is authorized
     * to create tasks.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getAvailableProjectsProperty()
    {
        return Project::select('id', 'name', 'authorizations')
            ->get()
            ->filter(function ($project) {
                if ($project->authorizations) {
                    return in_array(auth()->id(), $project->authorizations);
                }
            });
    }

    /**
     * Render the component view.
     *
     * @return \Illuminate\View\View
     */
    public function render()
    {
        abort_if(
            $this->availableProjects->count() === 0,
            403,
            'You must be granted authorization for a project to be able to create a task.'
        );

        return view('livewire.tasks.create_edit_form', [
            'projects' => $this->availableProjects,
            'task' => $this->task,
        ]);
    }
}
