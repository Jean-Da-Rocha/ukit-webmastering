<?php

namespace App\Http\Livewire\Actions\Projects;

use App\Models\{Project, User};

use Livewire\Component;

class ProjectAuthorizations extends Component
{
    /** @var Project */
    public Project $project;

    /** @var int */
    public int $limit = 10;

    /** @var int */
    public int $totalUsers = 0;

    /**
     * List of users we want to authorize
     * for a given project.
     *
     * @var array
     */
    public array $authorizations = [];

    /**
     * Set the default properties for the livewire component.
     *
     * @param  int  $id
     * @return void
     */
    public function mount(int $id)
    {
        $this->project = Project::findOrFail($id);
        $this->totalUsers = User::count();
        $this->authorizations = $this->project->authorizations ?? [];
    }

    /**
     * Load more user to authorize
     *
     * @return void
     */
    public function loadMore()
    {
        $this->limit += 10;
    }

    /**
     * Load less user to authorize.
     *
     * @return void
     */
    public function loadLess()
    {
        $this->limit -= 10;
    }

    /**
     * Computed property to get the user properties.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getUsersProperty()
    {
        return User::select('id', 'username')->limit($this->limit)->get();
    }

    /**
     * Authorize a list of user.
     *
     * @return void
     */
    public function authorizeUsers()
    {
        $this->project->update(
            $this->validate([
                'authorizations' => ['nullable', 'array']
            ])
        );

        session()->flash('success', trans('message.updated'));
    }

    /**
     * Render the component view.
     *
     * @return \Illuminate\View\View
     */
    public function render()
    {
        return view('livewire.projects.authorizations', [
            'project' => $this->project,
        ]);
    }
}
