<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use App\Models\Panel\Konsultasi;
use App\Models\Panel\Customer;
use App\Models\Panel\Layanan;
use App\Models\Panel\SubLayanan;
use Illuminate\Http\Request;

class KonsultasiController extends Controller
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

        $title = '';
        $text = "Apakah anda yakin?";
        confirmDelete($title, $text);

        return view('panel.konsultasi.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $customers = Customer::where('status', 1)->get(); // Mengambil data dari tabel 'customers'
        $layanan = Layanan::all(); // Mengambil data dari tabel 'layanan'
        return view('panel.konsultasi.create', compact('customers', 'layanan'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $rules = [
            'id_customer' => 'required|exists:customers,id',
            'id_layanan' => 'required|exists:layanan,id',
            'id_sub_layanan' => 'required|exists:sub_layanan,id',
            'profesional' => 'required|string',
            'keluhan' => 'required|string',
            'hasil_konsultasi' => 'required|string',
            'tgl_masuk' => 'required|date',
            'tgl_selesai' => 'nullable|date',
            'status_bayar' => 'required|in:1,2',
            'total_harga' => 'required|numeric',
            'status' => 'required|in:pending,selesai,batal',
        ];

        if ($request->input('status_bayar') === '2') {
            $rules['dibayar'] = 'required|numeric';
        }

        $request->validate($rules);

        $totalHarga = $request->input('total_harga');
        $dibayar = $request->input('dibayar', 0);
        $statusBayar = $request->input('status_bayar');
        $sisaBayar = $statusBayar === '1' ? 0 : ($totalHarga - $dibayar);

        try {
            Konsultasi::create(array_merge($request->except('dibayar', 'sisa_bayar'), ['sisa_bayar' => $sisaBayar]));
            toast('Konsultasi berhasil dibuat!', 'success');
        } catch (\Exception $e) {
            toast('Terjadi kesalahan saat menyimpan data: ' . $e->getMessage(), 'error');
        }

        return redirect()->route('panel.konsultasi.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = Konsultasi::find($id);
        return view('panel.konsultasi.show', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Konsultasi $konsultasi)
    {
        $customers = Customer::where('status', 1)->get();
        $layanan = Layanan::all();
        $subLayanan = SubLayanan::where('id_layanan', $konsultasi->id_layanan)->get();
        return view('panel.konsultasi.edit', compact('konsultasi', 'customers', 'layanan', 'subLayanan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Konsultasi $konsultasi)
    {
        $rules = [
            'id_customer' => 'required|exists:customers,id',
            'id_layanan' => 'required|exists:layanan,id',
            'id_sub_layanan' => 'required|exists:sub_layanan,id',
            'profesional' => 'required|string',
            'keluhan' => 'required|string',
            'hasil_konsultasi' => 'required|string',
            'tgl_masuk' => 'required|date',
            'tgl_selesai' => 'nullable|date',
            'status_bayar' => 'required|in:1,2',
            'total_harga' => 'required|numeric',
            'status' => 'required|in:pending,selesai,batal',
        ];

        if ($request->input('status_bayar') === '2') {
            $rules['dibayar'] = 'required|numeric';
        }

        $request->validate($rules);

        $totalHarga = $request->input('total_harga');
        $dibayar = $request->input('dibayar', 0);
        $statusBayar = $request->input('status_bayar');
        $sisaBayar = $statusBayar === '1' ? 0 : ($totalHarga - $dibayar);

        try {
            $konsultasi->update(array_merge($request->except('dibayar', 'sisa_bayar'), ['sisa_bayar' => $sisaBayar]));
            toast('Konsultasi berhasil diperbarui!', 'success');
        } catch (\Exception $e) {
            toast('Terjadi kesalahan saat memperbarui data: ' . $e->getMessage(), 'error');
        }

        return redirect()->route('panel.konsultasi.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Konsultasi $konsultasi)
    {
        try {
            $konsultasi->delete();
            toast('Konsultasi berhasil dihapus!', 'success');
        } catch (\Exception $e) {
            toast('Terjadi kesalahan saat menghapus data: ' . $e->getMessage(), 'error');
        }

        return redirect()->route('panel.konsultasi.index');
    }

    /**
     * Mengambil sub-layanan berdasarkan layanan yang dipilih.
     */
    public function getSubLayanan(Request $request)
    {
        $idLayanan = $request->input('id_layanan');
        $subLayanan = SubLayanan::where('id_layanan', $idLayanan)->get();
        return response()->json($subLayanan);
    }
}
