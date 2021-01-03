<?php

namespace App\Http\Livewire\Actions\Projects;

use App\Models\{Project, User};

use Livewire\Component;

class UserDropdown extends Component
{
    /** @var Project */
    public Project $project;

    /** @var int */
    public int $selectedUserId;

    /**
     * Array of event listeners for Livewire.
     *
     * @var array
     */
    protected $listeners = ['update-component' => '$refresh'];

    /**
     * Render the component view.
     *
     * @return \Illuminate\View\View
     */
    public function render()
    {
        return view('livewire.projects.user_dropdown', [
            'project' => $this->project,
            'userTasks' => $this->getTasksForSelectedUser(),
        ]);
    }

    private function getTasksForSelectedUser()
    {
        //
    }
}
