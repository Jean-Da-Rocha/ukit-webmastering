<?php

namespace App\Http\Livewire\Actions\Projects;

use App\Models\Project;

class EditProject extends BaseProject
{
    /**
     * Set the initial project properties.
     *
     * @param  int  $id
     * @return void
     */
    public function mount(int $id)
    {
        $this->updateMode = true;

        $this->project = Project::findOrFail($id);
    }

    /**
     * Update the specified project in storage.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update()
    {
        $this->project->update($this->validate());

        session()->flash('success', trans('message.updated'));

        return redirect()->to('/projects');
    }
}