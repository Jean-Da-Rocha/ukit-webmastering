<?php

namespace App\Http\Livewire\Actions;

use App\Models\Project;
use Livewire\Component;

use App\Models\Category;
use App\Models\Customer;

class CreateProject extends Component
{
    /** @var int */
    public int $category_id;

    /** @var int */
    public int $customer_id;

    /** @var string */
    public string $project_name = '';

    /** @var \Carbon\Carbon|null */
    public $project_starting_date;

    /** @var string */
    public string $project_description = '';

    /** @var array */
    protected array $rules =  [
        'category_id' => ['required', 'integer'],
        'customer_id' => ['required', 'integer'],
        'project_name' => ['required', 'string', 'max:255'],
        'project_starting_date' => ['required', 'date'],
        'project_description' => ['nullable', 'string', 'max:5000'],
    ];

    public function store()
    {
        Project::create(
            array_merge(
                $this->validate(),
                ['user_id' => auth()->id()],
            )
        );

        session()->flash('success', 'Project created successfully.');

        return redirect()->to('/projects');
    }

    public function mount()
    {
        $this->category_id = Category::pluck('id')->first();
        $this->customer_id = Customer::orderBy('id', 'asc')->pluck('id')->first();
    }

    public function render()
    {
        return view('livewire.projects.create', [
            'projectCategories' => Category::select('id', 'category_type')->get(),
            'customers' => Customer::select('id', 'designation')->get()
        ]);
    }
}
