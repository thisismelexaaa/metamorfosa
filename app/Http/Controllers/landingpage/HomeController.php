<?php

namespace App\Http\Controllers\landingpage;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        if (auth()->check()) {
            return redirect()->route('dashboard.index');
        }

        return view('landingpage.home.index');
    }

    public function admin()
    {
        // check User Login
        $user = auth()->user();

        if ($user && $user->role == 'admin') {
            return 'Oke Admin';
        }

        return redirect()->route('login'); // Redirect to login page if not admin
    }
}
