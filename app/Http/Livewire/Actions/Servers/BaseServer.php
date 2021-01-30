<?php

namespace App\Http\Livewire\Actions\Servers;

use App\Models\Server;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

use Livewire\Component;

class BaseServer extends Component
{
    use AuthorizesRequests;

    /** @var Server */
    public Server $server;

    /** @var bool */
    public bool $updateMode = false;

    /** @var array */
    protected array $rules = [
        'server.name' => ['required', 'string', 'max:255'],
        'server.information' => ['nullable', 'string', 'max:500'],
    ];

    /**
     * Render the component view.
     *
     * @return \Illuminate\View\View
     */
    public function render()
    {
        $this->authorize('performAdminAction');

        return view('livewire.servers.create_edit_form', [
            'server' => $this->server,
        ]);
    }
}
