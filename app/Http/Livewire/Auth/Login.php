<?php

namespace App\Http\Livewire\Auth;

use Illuminate\Support\Facades\Auth;

use Livewire\Component;

class Login extends Component
{
    /** @var string */
    public string $email = '';

    /** @var string */
    public string $password = '';

    /** @var array */
    protected array $rules =  [
        'email' => ['required', 'email'],
        'password' => ['required'],
    ];

    public function authenticate()
    {
        $credentials = $this->validate();

        if (! Auth::attempt($credentials)) {
            $this->addError('email', trans('auth.failed'));

            return;
        }

        return redirect()->intended(route('home'));
    }

    public function render()
    {
        return view('livewire.auth.login');
    }
}
