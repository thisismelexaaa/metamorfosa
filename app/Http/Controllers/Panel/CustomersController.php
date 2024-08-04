<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use App\Models\Panel\Customer;
use App\Models\Panel\Layanan;
use App\Models\Panel\SubLayanan;
use Illuminate\Http\Request;

class CustomersController extends Controller
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
        $data['customer'] = Customer::all();

        $title = '';
        $text = "Apakah anda yakin?";
        confirmDelete($title, $text);

        return view('panel.customers.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $layanan = Layanan::all();
        return view('panel.customers.create', compact('layanan'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $data = $request;

            // dd($data->all());

            $data->validate([
                'name' => 'required',
                'no_tlp' => 'required',
                'jenis_kelamin' => 'required',
                'tgl_lahir' => 'required',
                'alamat' => 'required',
                'nama_ayah' => 'required',
                'pekerjaan_ayah' => 'required',
                'nama_ibu' => 'required',
                'pekerjaan_ibu' => 'required',
            ]);

            // generate no daftar with uuid
            $no_daftar = strtoupper(substr(md5(time()), 0, 6));

            $data = [
                'no_daftar' => $no_daftar,
                'name' => $data->name,
                'no_tlp' => $data->no_tlp,
                'jenis_kelamin' => $data->jenis_kelamin,
                'tgl_lahir' => $data->tgl_lahir,
                'alamat' => $data->alamat,
                'nama_ayah' => $data->nama_ayah,
                'pekerjaan_ayah' => $data->pekerjaan_ayah,
                'nama_ibu' => $data->nama_ibu,
                'pekerjaan_ibu' => $data->pekerjaan_ibu,
                'status' => 1,
            ];

            Customer::create($data);

            toast('Customer berhasil di tambahkan!', 'success');
            return redirect()->route('customers.index');
        } catch (\Exception $e) {
            toast($e->getMessage(), 'error');
            return redirect()->back()->withInput();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = Customer::find($id);
        return view('panel.customers.show', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = Customer::find($id);
        $layanan = Layanan::all();
        $subLayanan = SubLayanan::where('id_layanan', $data->layanan)->get(); // Get sub-layanan based on selected layanan

        return view('panel.customers.edit', compact('data', 'layanan', 'subLayanan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'no_tlp' => 'required|numeric',
            'jenis_kelamin' => 'required|string',
            'tgl_lahir' => 'required|date',
            'alamat' => 'required|string',
            'nama_ayah' => 'required|string|max:255',
            'pekerjaan_ayah' => 'required|string|max:255',
            'nama_ibu' => 'required|string|max:255',
            'pekerjaan_ibu' => 'required|string|max:255',
            'layanan' => 'required|exists:layanan,id',
            'sub_layanan' => 'required|exists:sub_layanan,id',
            'support_teacher' => 'required|string',
            'tgl_masuk' => 'required|date',
            'tgl_selesai' => 'required|date',
            'keluhan' => 'required|string',
            'status' => 'required|in:1,2', // Assuming 1 is Lunas and 2 is Belum Lunas
            'total_biaya' => 'nullable|numeric'
        ]);

        try {
            $data = [
                'name' => $request->name,
                'no_tlp' => $request->no_tlp,
                'jenis_kelamin' => $request->jenis_kelamin,
                'tgl_lahir' => $request->tgl_lahir,
                'alamat' => $request->alamat,
                'nama_ayah' => $request->nama_ayah,
                'pekerjaan_ayah' => $request->pekerjaan_ayah,
                'nama_ibu' => $request->nama_ibu,
                'pekerjaan_ibu' => $request->pekerjaan_ibu,
                'layanan' => $request->layanan,
                'sub_layanan' => $request->sub_layanan,
                'support_teacher' => $request->support_teacher,
                'tgl_masuk' => $request->tgl_masuk,
                'tgl_selesai' => $request->tgl_selesai,
                'keluhan' => $request->keluhan,
                'status' => $request->status,
                'total_biaya' => $request->total_biaya
            ];

            Customer::find($id)->update($data);

            toast('Customer berhasil diubah!', 'success');
            return redirect()->route('customers.index');
        } catch (\Exception $e) {
            toast('Terjadi kesalahan: ' . $e->getMessage(), 'error');
            return redirect()->back()->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $customer = Customer::find($id);

            // check auth
            if ($customer->status == 0) {
                $customer->update(['status' => 1]);
            } else {
                $customer->update(['status' => 0]);
            }

            toast('Customer berhasil di hapus!', 'success');
            return redirect()->back();
        } catch (\Exception $e) {
            toast($e->getMessage(), 'error');
            return redirect()->back();
        }
    }

    // public function getLayananById($id)
    // {
    //     // Ambil semua sub layanan yang terkait dengan layanan yang dipilih
    //     $subLayanan = SubLayanan::where('id_layanan', $id)->get();

    //     // Pastikan data sub layanan diubah menjadi format yang diinginkan
    //     $data = [
    //         'id' => $id,
    //         'sub_layanan' => $subLayanan->map(function ($item) {
    //             return [
    //                 'id' => $item->id,
    //                 'sub_layanan' => $item->sub_layanan // Nama kolom yang sesuai di tabel sub_layanan
    //             ];
    //         })
    //     ];

    //     return response()->json($data);
    // }
}
