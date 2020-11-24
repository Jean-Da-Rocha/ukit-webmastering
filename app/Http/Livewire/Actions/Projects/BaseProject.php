<?php

namespace App\Http\Livewire\Actions\Projects;

use App\Models\{Category, Customer, Project};

use Livewire\Component;

class BaseProject extends Component
{
    /** @var Project */
    public Project $project;

    /** @var bool */
    public bool $updateMode = false;

    /** @var array */
    protected array $rules = [
        'project.category_id' => ['required', 'integer'],
        'project.customer_id' => ['required', 'integer'],
        'project.name' => ['required', 'string', 'max:255'],
        'project.starting_date' => ['required', 'date'],
        'project.description' => ['nullable', 'string', 'max:5000'],
    ];

    /**
     * Render the component view.
     *
     * @return \Illuminate\View\View
     */
    public function render()
    {
        return view('livewire.projects.create_edit_form', [
            'projectCategories' => Category::select('id', 'type')->orderBy('type', 'asc')->get(),
            'customers' => Customer::select('id', 'designation')->orderBy('designation', 'asc')->get(),
            'project' => $this->project,
        ]);
    }
}
