<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use App\Models\Panel\Konsultasi;
use App\Models\Panel\Customer;
use App\Models\Panel\Layanan;
use App\Models\Panel\SubLayanan;
use App\Models\User;
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
        return view('panel.konsultasi.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['customers'] = Customer::where('status', 1)->get(); // Mengambil data dari tabel 'customers'
        $data['layanan'] = Layanan::where('status', 1)->get(); // Mengambil data dari tabel 'layanan'
        $data['support_teacher'] = User::where('role', 2)->where('status', 1)->get();

        return view('panel.konsultasi.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Konsultasi $konsultasi)
    {
        // Validate the incoming request data
        $data = $request->validate([
            'id_customer' => 'required',
            'id_layanan' => 'required',
            'id_sub_layanan' => 'required',
            'id_support_teacher' => 'required',
            'tgl_masuk' => 'required',
            'tgl_selesai' => 'nullable',
            'keluhan' => 'required',
            'total_harga' => 'required',
            'status_bayar' => 'required',
        ]);

        // kode konsultas
        $data['kode_konsultasi'] = 'ID-' . strtoupper(substr(md5(time()), 0, 6));

        // Extract and clean 'dibayar' field to get numeric value
        $dibayar = preg_replace('/[^\d]/', '', $request->input('dibayar', 0));
        $dibayar = (int) $dibayar;

        // Calculate 'sisa_bayar' based on 'status_bayar'
        $totalHarga = preg_replace('/[^\d]/', '', $request->input('total_harga', 0));
        $statusBayar = $request->input('status_bayar');
        $sisaBayar = $statusBayar == 1 ? 0 : ($totalHarga - $dibayar);

        if ($statusBayar == 1) {
            $dibayar = $totalHarga;
        }

        // Prepare data for insertion
        $data = array_merge($data, [
            'total_harga' => $totalHarga,
            'dibayar' => $dibayar,
            'sisa_bayar' => $sisaBayar,
            'status' => 1
        ]);

        if ($sisaBayar < 0) {
            toast('Terjadi kesalahan saat menyimpan data: ', 'error');
            return redirect()->back();
        }

        if ($sisaBayar == 0) {
            $data['status_bayar'] = 1;
        }

        try {
            $konsultasi->create($data);
            toast('Konsultasi berhasil dibuat!', 'success');
        } catch (\Exception $e) {
            toast('Terjadi kesalahan saat menyimpan data: ' . $e->getMessage(), 'error');
            dd($e);
        }

        return redirect()->route('konsultasi.index');
    }


    /**
     * Display the specified resource.
     */
    public function show(String $id)
    {
        $data['konsultasi'] = Konsultasi::find($id);
        return view('panel.konsultasi.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $data['konsultasi'] = Konsultasi::find($id);
        $data['customers'] = Customer::where('status', 1)->get(); // Mengambil data dari tabel 'customers'
        $data['layanan'] = Layanan::where('status', 1)->get(); // Mengambil data dari tabel 'layanan'
        $data['support_teacher'] = User::where('role', 2)->get();
        $data['id'] = $id;
        return view('panel.konsultasi.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        if ($request->has('isKonsul')) {
            // find id
            $konsultasi = Konsultasi::find($id);
            $data = [
                'hasil_konsultasi' => $request->hasil_konsultasi,
            ];

            // dd($request->all(), $id, $data);
            $konsultasi->update([
                'hasil_konsultasi' => $data['hasil_konsultasi'],
            ]);
        }

        // Validate the incoming request data
        $data = $request->validate([
            'id_customer' => 'required',
            'id_layanan' => 'required',
            'id_sub_layanan' => 'required',
            'id_support_teacher' => 'required',
            'tgl_masuk' => 'required',
            'tgl_selesai' => 'nullable',
            'keluhan' => 'required',
            'total_harga' => 'required',
            'status_bayar' => 'required',
        ]);

        // Extract and clean 'dibayar' field to get numeric value
        $dibayar = preg_replace('/[^\d]/', '', $request->input('dibayar', 0));
        $dibayar = (int) $dibayar;

        // Calculate 'sisa_bayar' based on 'status_bayar'
        $totalHarga = preg_replace('/[^\d]/', '', $request->input('total_harga', 0));
        $statusBayar = $request->input('status_bayar');
        $sisaBayar = $statusBayar == 1 ? 0 : ($totalHarga - $dibayar);

        // Prepare data for updating
        $data = array_merge($data, [
            'total_harga' => $totalHarga,
            'dibayar' => $dibayar,
            'sisa_bayar' => $sisaBayar,
        ]);

        try {
            // Update the Konsultasi record
            Konsultasi::find($id)->update($data);
            toast('Konsultasi berhasil diperbarui!', 'success');
        } catch (\Exception $e) {
            toast('Terjadi kesalahan saat memperbarui data: ' . $e->getMessage(), 'error');
            return redirect()->back()->withInput();
        }

        return redirect()->route('konsultasi.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            $konsultasi = Konsultasi::find($id);

            // Toggle status between 0 and 1
            $konsultasi->status = $konsultasi->status == 1 ? 2 : 1;
            $konsultasi->save();

            if ($konsultasi->status == 1) {
                toast('Data berhasil dikembalikan!', 'success');
            } else {
                toast('Data berhasil dihapus!', 'success');
            }
            return redirect()->back();
        } catch (\Exception $e) {
            toast($e->getMessage(), 'error');
            return redirect()->back();
        }
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
