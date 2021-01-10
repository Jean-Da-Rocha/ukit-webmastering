<?php

namespace App\Http\Livewire\Actions\Projects;

use App\Models\{Category, Customer, Project};

class CreateProject extends BaseProject
{
    /**
     * Set the initial project properties.
     *
     * @return void
     */
    public function mount()
    {
        $this->authorize('performWebmasterAction');

        $this->updateMode = false;

        $this->project = new Project();
        $this->project->category_id = Category::orderBy('type')->first()->id;
        $this->project->customer_id = Customer::orderBy('designation')->first()->id;
    }

    /**
     * Store a newly created project in storage.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store()
    {
        $this->validate();

        $this->project->user_id = auth()->id();
        $this->project->save();

        session()->flash('success', trans('message.created'));

        return redirect()->to('/projects');
    }
}
