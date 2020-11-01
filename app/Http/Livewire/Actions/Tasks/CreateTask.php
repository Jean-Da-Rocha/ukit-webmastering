<?php

namespace App\Http\Livewire\Actions\Tasks;

use App\Models\{Project, Task};

class CreateTask extends BaseTask
{
    /**
     * Set the initial task properties.
     *
     * @return void
     */
    public function mount()
    {
        $this->updateMode = false;

        $this->task = new Task();
        $this->task->quoted = false;
        $this->task->billed = false;
        $this->task->project_id = Project::orderBy('name')->first()->id;
    }

    /**
     * Store a newly created tasks in storage.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store()
    {
        $this->validate();

        $this->task->user_id = auth()->id();
        $this->task->save();

        session()->flash('success', trans('message.created'));

        return redirect()->to('/tasks');
    }
}
