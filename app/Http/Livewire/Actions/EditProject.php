<?php

namespace App\Http\Livewire\Actions;

use App\Models\Project;
use App\Models\Category;
use App\Models\Customer;
use Livewire\Component;

class EditProject extends Component
{
    /** @var Project */
    public Project $project;

    /** @var array */
    protected array $rules =  [
        'project.category_id' => ['required', 'integer'],
        'project.customer_id' => ['required', 'integer'],
        'project.project_name' => ['required', 'string', 'max:255'],
        'project.project_starting_date' => ['required', 'date'],
        'project.project_description' => ['nullable', 'string', 'max:5000'],
    ];

    public function update()
    {
        $this->project->update($this->validate());

        session()->flash('success', 'Project updated successfully.');

        return redirect()->to('/projects');
    }

    public function mount(int $id)
    {
        $this->project = Project::findOrFail($id);
    }

    public function render()
    {
        return view('livewire.projects.edit', [
            'projectCategories' => Category::select('id', 'category_type')->get(),
            'customers' => Customer::select('id', 'designation')->get(),
            'project' => $this->project,
        ]);
    }
}
