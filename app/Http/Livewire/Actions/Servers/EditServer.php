<?php

namespace App\Http\Livewire\Actions\Servers;

use App\Models\Server;

class EditServer extends BaseServer
{
    /**
     * Set the initial server properties.
     *
     * @param  int  $id
     * @return void
     */
    public function mount(int $id)
    {
        $this->updateMode = true;

        $this->server = Server::findOrFail($id);
    }

    /**
     * Update the specified server in storage.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update()
    {
        $this->server->update($this->validate());

        session()->flash('success', trans('message.updated'));

        return redirect()->to('/servers');
    }
}
