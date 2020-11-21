<?php

namespace App\Http\Livewire\Actions\Hostings;

use App\Models\Hosting;

class EditHosting extends BaseHosting
{
    /**
     * Array of attributes that can be set
     * to `null` in the database.
     *
     * @var array
     */
    private array $nullableAttributes = [
        'server_id',
        'project_id',
    ];

    /**
     * Set the initial hosting properties.
     *
     * @param  int  $id
     * @return void
     */
    public function mount(int $id)
    {
        $this->updateMode = true;

        $this->hosting = Hosting::findOrFail($id);
    }

    /**
     * Runs after any update to the Livewire component's data
     * and check if some attributes need to bet set to `null`.
     *
     * @return Hosting
     */
    public function updated()
    {
        return collect($this->nullableAttributes)->each(function ($attribute) {
            if ($this->hosting->{$attribute} === '') {
                $this->hosting->{$attribute} = null;
            }
        });
    }

    /**
     * Update the specified hosting in storage.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update()
    {
        $this->hosting->update($this->validate());

        session()->flash('success', trans('message.updated'));

        return redirect()->to('/hostings');
    }
}
