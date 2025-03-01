<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    
    public static function registerMiddleware(): array
    {
        return [
            'auth', 
        ];
    }

    public function dashboardView()
    {
        $user = Auth::user(); // Get the authenticated user
    
        return view('user.user_pages.dashboard', compact('user'));
    }


}
