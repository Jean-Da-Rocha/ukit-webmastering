<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Auth;

final class LogoutController extends Controller
{
    /**
     * Logout the user and redirect it to the login page.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function __invoke()
    {
        Auth::logout();

        return redirect(route('login'));
    }
}
