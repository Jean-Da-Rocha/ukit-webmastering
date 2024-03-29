<?php

namespace App\Http\Livewire\Auth;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Login extends Component
{
    /**
     * @var string
     */
    public string $email = '';

    /**
     * @var string
     */
    public string $password = '';

    /**
     * @var array
     */
    protected array $rules = [
        'email' => ['required', 'string', 'email', 'max:255'],
        'password' => ['required', 'string', 'max:255'],
    ];

    /**
     * Authenticate the user and redirect him
     * to the intended route.
     *
     * @return mixed
     */
    public function authenticate()
    {
        $credentials = $this->validate();

        if (! Auth::attempt($credentials)) {
            $this->addError('email', trans('auth.failed'));

            return;
        }

        return redirect()->intended();
    }

    /**
     * Render the component view.
     *
     * @return \Illuminate\View\View
     */
    public function render()
    {
        return view('livewire.auth.login');
    }
}
