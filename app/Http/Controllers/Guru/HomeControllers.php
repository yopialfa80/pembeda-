<?php

namespace App\Http\Controllers\Guru;
use App\Http\Controllers\GuruControllers as Controller;

use Illuminate\Http\Request;

class HomeControllers extends Controller
{
    public function redirectHome()
    {
        return view('Guru.Pages.dashboard');
    }
}
