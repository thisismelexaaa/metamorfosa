<?php

namespace App\Http\Controllers\landingpage;

use Illuminate\Http\Request;
use App\Models\Panel\Layanan;
use App\Models\Panel\SubLayanan;
use App\Http\Controllers\Controller;
use App\Models\News;
use App\Models\Panel\Partners;
use App\Models\User;

class HomeController extends Controller
{
    public function index()
    {
        $data['layanan'] = Layanan::where('status', 1)->get();
        $data['sublayanan'] = SubLayanan::all();
        $data['news'] = News::where('status', 1)->orderBy('id', 'desc')->limit(4)->get();
        $data['partners'] = Partners::where('status', 1)->get();
        $data['users'] = User::where('role', 2)->get();
        $data['users']->each(function ($data) {
            $this->DefineId($data);
        });

        return view('landingpage.home.index', $data);
    }

    public function detailLayanan()
    {
        $data['layanan'] = Layanan::all();
        return view('landingpage.detaillayanan.index', $data);
    }

    private function DefineId($data)
    {
        $roles = [
            1 => 'Admin',
            2 => 'Support Teacher',
            3 => 'Staff',
            4 => 'Receptionist',
            5 => 'Official',
        ];
        $data->role = $roles[$data->role] ?? 'Unknown Role';
    }
}
