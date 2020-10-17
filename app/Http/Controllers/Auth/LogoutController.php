<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Auth;

final class LogoutController extends Controller
{
    public function __invoke()
    {
        Auth::logout();

        return redirect(route('login'));
    }
}
