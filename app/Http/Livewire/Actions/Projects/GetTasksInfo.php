<?php

namespace App\Http\Livewire\Actions\Projects;

use App\Actions\TimeCalculation;
use App\Models\Project;

use Livewire\Component;

class GetTasksInfo extends Component
{
    /**
     * @var Project
     */
    public Project $project;

    /**
     * Array of event listeners for Livewire.
     *
     * @var array
     */
    protected $listeners = ['update-component' => '$refresh'];

    /**
     * Set the initial project properties.
     *
     * @param  Project  $project
     * @return void
     */
    public function mount(Project $project)
    {
        $this->project = $project;
    }

    /**
     * Render the component view.
     *
     * @return \Illuminate\View\View
     */
    public function render()
    {
        return view('livewire.projects.tasks_info', [
            'project' => $this->project,
            'totalTasksTime' => (new TimeCalculation($this->project))->getTotalTasksTime(),
            'numberOfTasks' => $this->project->tasks->count(),
        ]);
    }
}
