<?php

namespace App\Http\Livewire\Actions\Tasks;

use App\Models\Task;

class EditTask extends BaseTask
{
    /**
     * Set the initial task properties.
     *
     * @param  int  $id
     * @return void
     */
    public function mount(int $id)
    {
        $this->updateMode = true;
        $this->task = Task::findOrFail($id);
    }

    /**
     * Update the specified task in storage.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update()
    {
        $this->task->update($this->validate());

        session()->flash('success', trans('message.updated'));

        return redirect()->to('/tasks');
    }
}
