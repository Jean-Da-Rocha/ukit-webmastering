<?php

namespace App\Http\Livewire\Actions\Projects;

use App\Actions\TimeCalculation;
use App\Models\Project;

use Livewire\Component;

class UserDropdown extends Component
{
    /** @var Project */
    public Project $project;

    /** @var int */
    public int $selectedUserId = 0;

    /**
     * Array of event listeners for Livewire.
     *
     * @var array
     */
    protected $listeners = ['update-component' => '$refresh'];

    /**
     * Computed property to get all the authorized users
     * for the given project.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getAuthorizedUsersProperty()
    {
        return $this->project->getAuthorizedUsers();
    }

    /**
     * Render the component view.
     *
     * @return \Illuminate\View\View
     */
    public function render()
    {
        return view('livewire.projects.user_dropdown', [
            'project' => $this->project,
            'selectedUser' => $this->getSelectedUser()->first(),
            'selectedUserTotalTasksTime' => $this->getSelectedUserTotalTasksTime(),
        ]);
    }

    /**
     * Among all authorized users for the given project,
     * get the user that has been selected in the dropdown.
     *
     * @return mixed
     */
    private function getSelectedUser()
    {
        if ($this->authorizedUsers) {
            return $this->authorizedUsers->filter(function ($user) {
                if ($this->selectedUserId !== 0) {
                    return $user->id === $this->selectedUserId;
                }

                return $user->id === $this->authorizedUsers->first()->id;
            });
        }
    }

    /**
     * Get the total tasks time for the selected user.
     *
     * @return string|null
     */
    private function getSelectedUserTotalTasksTime()
    {
        if ($this->getSelectedUser()->first()) {
            return (new TimeCalculation($this->getSelectedUser()->first()))->getTotalTasksTime();
        }
    }
}
