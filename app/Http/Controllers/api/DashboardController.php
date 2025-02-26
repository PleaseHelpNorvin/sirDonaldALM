<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //
    public function dashboardView()
    {
        return view('user.user_pages.dashboard');
    }
}
