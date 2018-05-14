<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

class AuthController extends Controller
{
    public function getLogin()
    {
        return view('pages.auth.login');
    }

    public function getLogout()
    {
        return redirect()->route('login')->withCookies([Cookie::forget('token-auth'),Cookie::forget('token')]);
    }
}
