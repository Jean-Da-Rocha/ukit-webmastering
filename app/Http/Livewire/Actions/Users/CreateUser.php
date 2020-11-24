<?php

namespace App\Http\Livewire\Actions\Users;

use App\Models\User;

use Illuminate\Support\Facades\Hash;

class CreateUser extends BaseUser
{
    /**
     * Set the initial user properties.
     *
     * @return void
     */
    public function mount()
    {
        $this->updateMode = false;

        $this->user = new User();
        $this->user->role_id = config('role.developer');
    }

    /**
     * Store a newly created user in storage.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store()
    {
        $this->validate();

        if (! empty($this->user->password)) {
            $this->user->password = Hash::make($this->user->password);
        }

        $this->user->save();

        session()->flash('success', trans('message.created'));

        return redirect()->to('/users');
    }
}
