<?php

namespace App\Http\Livewire\Actions\Users;

use Livewire\Component;

use App\Models\{Role, User};

use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class EditSelfProfile extends Component
{
    use AuthorizesRequests;

    /** @var User */
    public User $user;

    /** @var string */
    public string $oldPassword;

    /** @var array */
    protected array $rules = [
        'user.username' => ['required', 'string', 'max:255', 'unique:users,username'],
        'user.email' => ['required', 'string', 'max:255', 'email:filter', 'unique:users,email'],
        'user.password' => ['nullable', 'min:8', 'string'],
    ];

    /**
     * Set the initial user properties.
     *
     * @return void
     */
    public function mount()
    {
        $this->user = User::findOrFail(auth()->id());
        $this->oldPassword = $this->user->password;
    }

    /**
     * Update authenticated user self profile.
     *
     * @return void
     */
    public function updateSelfProfile()
    {
        $this->setValidationRules();

        if (array_key_exists('password', $this->validate()['user'])) {
            $this->user->password = Hash::make($this->validate()['user']['password']);
        } else {
            $this->user->password = $this->oldPassword;
        }

        $this->user->update($this->validate());

        session()->flash('success', 'Profile saved successfully');
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

    /**
     * Render the component view.
     *
     * @return \Illuminate\View\View
     */
    public function render()
    {
        return view('livewire.users.edit_self_profile', [
            'user' => $this->user,
        ]);
    }
}
