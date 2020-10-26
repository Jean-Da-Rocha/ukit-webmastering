<?php

namespace App\Http\Livewire\Actions\Project;

use App\Models\Project;

class CreateProject extends BaseProject
{
    /**
     * Set the initial properties.
     *
     * @return void
     */
    public function mount()
    {
        $this->updateMode = false;
        $this->project = new Project();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store()
    {
        $this->validate();

        $this->project->save();

        session()->flash('success', 'Project created successfully.');

        return redirect()->to('/projects');
    }
}
