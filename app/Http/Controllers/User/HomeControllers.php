<?php

namespace App\Http\Controllers\User;
use App\Http\Controllers\UserControllers as Controller;

use Illuminate\Http\Request;

class HomeControllers extends Controller
{
    public function redirectHome()
    {
        return view('User.Pages.dashboard');
    }
}
