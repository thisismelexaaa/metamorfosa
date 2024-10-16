<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use App\Models\Panel\Customer;
use App\Models\Panel\HasilKonsultasi;
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

        if ($id_role == 'admin' || $id_role == 4 || $id_role == 5) {
            $data['konsultasi'] = Konsultasi::all();
        } else {
            $data['konsultasi'] = Konsultasi::where('id_support_teacher', Auth::user()->id)->get();
        }

        $data['hasil_konsultasi'] = HasilKonsultasi::all();

        // dd($data);

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
        // Validate the request inputs
        $request->validate([
            'id_konsultasi' => 'required',
            'id_sub_layanan' => 'required',
            'id_layanan' => 'required',
            'id_user' => 'required',
            'id_customer' => 'required',
        ]);

        // Prepare the data array
        $data = [
            'id_konsultasi' => $request->id_konsultasi,
            'id_sub_layanan' => $request->id_sub_layanan,
            'id_layanan' => $request->id_layanan,
            'id_user' => $request->id_user,
            'id_customer' => $request->id_customer,
            'hasil' => $request->hasil_konsultasi[0] ?? 'Tidak Ada Hasil Konsultasi',
            'created_at' => now(),
            'updated_at' => now(),
        ];

        // dd($data);

        // Check if a previous consultation result exists for this consultation
        $cek = HasilKonsultasi::where('id_konsultasi', $data['id_konsultasi'])
            ->latest()
            ->first();

        // Increment 'hari' if a previous result exists, otherwise set to 1
        $data['hari'] = optional($cek)->hari + 1 ?? 1;

        // Create a new consultation result
        HasilKonsultasi::create($data);

        // Notify success and redirect back
        toast('Hasil Konsultasi berhasil diperbarui!', 'success');
        return redirect()->back();
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
