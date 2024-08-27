<?php

namespace App\Http\Controllers\landingpage;

use Illuminate\Http\Request;
use App\Models\Panel\Layanan;
use App\Models\Panel\SubLayanan;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index()
    {
        $layanan = Layanan::all();
        $sublayanan = SubLayanan::all();

        return view('landingpage.home.index', compact('layanan', 'sublayanan'));
    }
}
