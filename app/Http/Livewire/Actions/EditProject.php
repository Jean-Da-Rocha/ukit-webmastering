<?php

namespace App\Http\Livewire\Actions;

use App\Models\{Category, Customer, Project};

use Livewire\Component;

class EditProject extends Component
{
    /** @var Project */
    public Project $project;

    /** @var array */
    protected array $rules =  [
        'project.category_id' => ['required', 'integer'],
        'project.customer_id' => ['required', 'integer'],
        'project.name' => ['required', 'string', 'max:255'],
        'project.starting_date' => ['required', 'date'],
        'project.description' => ['nullable', 'string', 'max:5000'],
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
            'projectCategories' => Category::select('id', 'type')->orderBy('type', 'asc')->get(),
            'customers' => Customer::select('id', 'designation')->orderBy('designation', 'asc')->get(),
            'project' => $this->project,
        ]);
    }
}
