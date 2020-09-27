<?php

namespace App\Http\Livewire\Auth;

use App\Models\User;

use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use Livewire\Component;

class Register extends Component
{
    /** @var string */
    public string $username = '';

    /** @var string */
    public string $email = '';

    /** @var string */
    public string $password = '';

    /** @var string */
    public string $passwordConfirmation = '';

    /** @var array */
    protected array $rules = [
        'username' => ['required', 'string', 'max:255'],
        'email' => ['required', 'string', 'max:255', 'email', 'unique:users'],
        'password' => ['required', 'min:8', 'string', 'same:passwordConfirmation'],
    ];

    public function register()
    {
        $this->validate();

        $user = User::create([
            'username' => $this->username,
            'email' => $this->email,
            'password' => Hash::make($this->password),
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect()->intended(route('home'));
    }

    public function render()
    {
        return view('livewire.auth.register');
    }
}
