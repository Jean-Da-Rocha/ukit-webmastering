<?php

namespace App\Http\Livewire\Actions\Projects;

use App\Models\Project;
use App\Models\User;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Livewire\Component;

class ProjectAuthorizations extends Component
{
    use AuthorizesRequests;

    /** @var Project */
    public Project $project;

    /**
     * List of users we want to authorize
     * for a given project.
     *
     * @var array
     */
    public array $authorizations = [];

    /**
     * Search terms used to find a specific
     * user to authorize for the given project.
     *
     * @var string
     */
    public string $searchTerms = '';

    /**
     * Set the default properties for the
     * ProjectAuthorizations livewire component.
     *
     * @param  int  $id
     * @return void
     */
    public function mount(int $id)
    {
        $this->project = Project::findOrFail($id);
        $this->authorizations = $this->project->authorizations ?? [];
    }

    /**
     * Computed property to get the user properties.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getUsersProperty()
    {
        return User::select('id', 'username')
            ->where('username', 'LIKE', "%{$this->searchTerms}%")
            ->get();
    }

    /**
     * Authorize a list of user for a given project.
     *
     * @return void
     */
    public function saveAuthorizations()
    {
        $this->project->update(
            $this->validate([
                'authorizations' => ['nullable', 'array'],
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
        $this->authorize('performWebmasterAction');

        return view('livewire.projects.authorizations', [
            'project' => $this->project,
        ]);
    }
}
