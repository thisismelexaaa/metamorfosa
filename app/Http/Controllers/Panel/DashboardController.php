<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use App\Models\Panel\Customer;
use App\Models\Panel\Konsultasi;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        // date now
        $data['now'] = date('Y-m');
        $data['year'] = date('Y');
        $data['pelanggan'] = Customer::all();
        $data['total_harga'] = Konsultasi::where('total_harga', '>', 0)
            ->where('created_at', 'like', '%' . $data['now'] . '%')
            ->get()
            ->sum('total_harga');
        $data['total_harga_year'] = Konsultasi::where('total_harga', '>', 0)
            ->where('created_at', 'like', '%' . $data['year'] . '%')
            ->get()
            ->sum('total_harga');
        $data['total_harga_full'] = Konsultasi::where('total_harga', '>', 0)
            ->get()
            ->sum('total_harga');

        return view('panel.dashboard.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
