<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use App\Models\Panel\Master\Customer;
use App\Models\Panel\Settings\Layanan;
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

        $title = 'Delete User!';
        $text = "Are you sure you want to delete?";
        confirmDelete($title, $text);

        return view('panel.admin.customers.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $layanan = Layanan::all();
        return view('panel.admin.customers.create', compact('layanan'));
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
                'layanan' => 'required',
                'sub_layanan' => 'required',
                'support_teacher' => 'required',
                'tgl_masuk' => 'required',
                'tgl_selesai' => 'required',
                'keluhan' => 'required',
                'status' => 'required',
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
                'layanan' => $data->layanan,
                'sub_layanan' => $data->sub_layanan,
                'support_teacher' => $data->support_teacher,
                'tgl_masuk' => $data->tgl_masuk,
                'tgl_selesai' => $data->tgl_selesai,
                'keluhan' => $data->keluhan,
                'status' => $data->status,
                // 'hasil_konsul' => $data->konsul,
                // 'total_biaya' => $data->total_biaya
            ];

            // dd($data);

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

    public function getLayananById($id)
    {
        // Fetch the Layanan record by its ID
        $layanan = Layanan::findOrFail($id);

        $layanan->sub_layanan = explode(',', $layanan->sub_layanan);

        $data = [
            'id' => $layanan->id,
            'layanan' => $layanan->layanan,
            'sub_layanan' => $layanan->sub_layanan
        ];
        return response()->json($data);
    }
}
