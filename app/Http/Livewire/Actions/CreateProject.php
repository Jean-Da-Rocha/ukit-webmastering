<?php

namespace App\Http\Livewire\Actions;

use App\Models\{Category, Customer, Project};

use Livewire\Component;

class CreateProject extends Component
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

    public function mount()
    {
        $this->project = new Project();
    }

    public function store()
    {
        $this->validate();

        $this->project->user_id = auth()->id();
        $this->project->save();

        session()->flash('success', 'Project created successfully.');

        return redirect()->to('/projects');
    }

    public function render()
    {
        return view('livewire.projects.create', [
            'projectCategories' => Category::select('id', 'type')->orderBy('type', 'asc')->get(),
            'customers' => Customer::select('id', 'designation')->orderby('designation', 'asc')->get()
        ]);
    }
}
