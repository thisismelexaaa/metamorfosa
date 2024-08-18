<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use App\Models\Panel\Konsultasi;
use Illuminate\Http\Request;

class FinanceController extends Controller
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
        $data['konsultasi'] = Konsultasi::all();
        // get total harga
        $data['total'] = Konsultasi::where('dibayar', '>', 0)->get()->sum('dibayar');

        // dd($data);
        return view('panel.finance.index', $data);
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
        $konsultasi = Konsultasi::find($id);

        if ($konsultasi->status_bayar == 2) {
            $sisa_bayar = $konsultasi->sisa_bayar;
            $total_harga = $konsultasi->total_harga;
            $dibayar = $konsultasi->dibayar;

            $dibayar = $dibayar + $sisa_bayar;
            $sisa_bayar = $dibayar - $total_harga;

            $data = [
                'dibayar' => $dibayar,
                'total_harga' => $total_harga,
                'sisa_bayar' => $sisa_bayar,
                'status_bayar' => 1,
                'updated_at' => date('Y-m-d H:i:s')
            ];

            $konsultasi->update($data);

            toast('Konsultasi lunas', 'success');
            return redirect()->back();
        } else {
            toast('Konsultasi sudah lunas', 'error');
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
