<?php

namespace App\Http\Controllers\landingpage;

use Illuminate\Http\Request;
use App\Models\Panel\Layanan;
use App\Models\Panel\SubLayanan;
use App\Http\Controllers\Controller;
use App\Models\News;

class HomeController extends Controller
{
    public function index()
    {
        $layanan = Layanan::where('status', 1)->get();
        $sublayanan = SubLayanan::all();
        $news = News::where('status', 1)->orderBy('id', 'desc')->limit(4)->get();

        return view('landingpage.home.index', compact('layanan', 'sublayanan', 'news'));
    }
}
