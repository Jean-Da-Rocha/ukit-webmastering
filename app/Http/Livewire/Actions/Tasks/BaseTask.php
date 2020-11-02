<?php

namespace App\Http\Livewire\Actions\Tasks;

use App\Models\{Project, Task};

use Livewire\Component;

class BaseTask extends Component
{
    /** @var Task */
    public Task $task;

    /** @var bool */
    public bool $updateMode = false;

    /** @var array */
    protected array $rules = [
        'task.project_id' => ['required', 'integer'],
        'task.quoted' => ['required', 'boolean'],
        'task.quotation_ref' => ['nullable', 'string', 'max:100'],
        'task.billed' => ['required', 'boolean'],
        'task.bill_num' => ['nullable', 'string', 'max:100'],
        'task.duration' => ['required', 'string', 'max:30'],
        'task.starting_date' => ['required', 'date', 'date_format:Y-m-d'],
        'task.name' => ['required', 'string', 'max:255'],
        'task.description' => ['nullable', 'string', 'max:5000'],
    ];

    /**
     * Render the component view.
     *
     * @return \Illuminate\View\View
     */
    public function render()
    {
        return view('livewire.tasks.create_edit_form', [
            'projects' => Project::select('id', 'name')->orderBy('name')->get(),
            'task' => $this->task,
        ]);
    }
}
