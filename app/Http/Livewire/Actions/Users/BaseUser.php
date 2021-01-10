<?php

namespace App\Http\Livewire\Actions\Users;

use App\Models\{Role, User};

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

use Livewire\Component;

class BaseUser extends Component
{
    use AuthorizesRequests;

    /** @var User */
    public User $user;

    /** @var bool */
    public bool $updateMode = false;

    /** @var array */
    protected array $rules = [
        'user.username' => ['required', 'string', 'max:255', 'unique:users,username'],
        'user.email' => ['required', 'string', 'max:255', 'email:filter', 'unique:users,email'],
        'user.role_id' => ['required', 'integer'],
    ];

    /**
     * Render the component view.
     *
     * @return \Illuminate\View\View
     */
    public function render()
    {
        $this->authorize('haveAccess');

        return view('livewire.users.create_edit_form', [
            'roles' => Role::select('id', 'name')->orderBy('id', 'desc')->get(),
            'user' => $this->user,
        ]);
    }
}
