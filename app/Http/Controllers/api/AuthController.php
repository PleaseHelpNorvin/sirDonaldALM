<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    //
    public function landingView()
    {
        return view('landing_pages.landing');
    }
    public function registerView()
    {
        return view('landing_pages.register');
    }

    public function loginView()
    {
        return view('landing_pages.login');
    }
}
