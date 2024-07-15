<?php

namespace App\Http\Controllers\landingpage;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        // check User Login
        $user = auth()->user();

        if($user->role == 'admin'){
            return 'Oke Admin' ;
        }
    }
}
