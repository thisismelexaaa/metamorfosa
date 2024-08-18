<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use App\Models\Panel\Customer;
use App\Models\Panel\Konsultasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ScheduleController extends Controller
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

        // check auth
        $data['auth'] = Auth::user();

        $id_role = $data['auth']->role;

        // dd($id_role);

        if ($id_role == 'admin' || $id_role == 4 || $id_role == 5) {
            $data['konsultasi'] = Konsultasi::all();
        } else {
            $data['konsultasi'] = Konsultasi::where('id_support_teacher', Auth::user()->id)->get();
        }


        return view('panel.schedule.index', $data);
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
