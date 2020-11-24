<?php

namespace App\Http\Livewire\Actions\Users;

use App\Models\User;

class EditUser extends BaseUser
{
    /**
     * Set the initial user properties.
     *
     * @param  int  $id
     * @return void
     */
    public function mount(int $id)
    {
        $this->updateMode = true;

        $this->user = User::findOrFail($id);
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    /**
     * Update the specified user in storage.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update()
    {
        $this->setValidationRules();

        $this->user->update($this->validate());

        session()->flash('success', trans('message.updated'));

        return redirect()->to('/users');
    }

    /**
     * Override specific validation rules from the original $rules array
     * so that we don't get the 'same email/username' error
     * or null password error during update.
     *
     * @return array
     */
    private function setValidationRules()
    {
        $this->rules['user.username'] = ['required', 'string', 'max:255', 'unique:users,username,' . $this->user->id];
        $this->rules['user.email'] = ['required', 'string', 'max:255', 'email:filter', 'unique:users,email,' . $this->user->id];
    }
}
