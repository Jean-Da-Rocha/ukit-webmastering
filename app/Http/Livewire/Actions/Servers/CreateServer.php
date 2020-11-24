<?php

namespace App\Http\Livewire\Actions\Servers;

use App\Models\Server;

class CreateServer extends BaseServer
{
    /**
     * Set the initial server properties.
     *
     * @return void
     */
    public function mount()
    {
        $this->updateMode = false;

        $this->server = new Server();
    }

    /**
     * Store a newly created server in storage.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store()
    {
        $this->server->save($this->validate());

        session()->flash('success', trans('message.created'));

        return redirect()->to('/servers');
    }
}
