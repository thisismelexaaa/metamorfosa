<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use App\Models\Panel\Layanan;
use App\Models\Panel\Partners;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PartnersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['partners'] = Partners::all();
        $data['partners']->each(function ($data) {
            $this->DefineId($data);
        });
        return view('panel.partners.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('panel.partners.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'name' => 'required|string|max:255',
            'tipe' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048', // Validasi gambar
        ]);

        try {
            // Handle upload gambar
            if ($request->hasFile('image')) {
                $imageName = time() . '.' . $request->image->extension();
                $request->image->move(public_path('assets/panel/partners/'), $imageName); // Simpan di folder 'uploads' di public
            }

            $data = [
                'name' => $request->input('name'),
                'description' => $request->input('description') ?? null,
                'tipe' => $request->input('tipe'),
                'image' => $imageName ?? null, // Simpan nama gambar jika ada
                'url' => $request->input('url') ?? null,
                'status' => 1,
            ];

            // dd($data);
            // Simpan data ke database
            Partners::create($data);

            toast('Data berhasil ditambahkan!', 'success');
            return redirect()->route('partners.index');
        } catch (Exception $e) {
            // Rollback transaksi jika terjadi error
            DB::rollBack();

            toast('Data gagal ditambahkan!' . $e->getMessage(), 'error');
            // Jika terjadi error, tangkap pesan errornya dan kembalikan ke halaman sebelumnya
            return redirect()->back();
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
        $data['partner'] = Partners::find($id);
        return view('panel.partners.edit');
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

    private function DefineId($data)
    {
        // dd($data);
        if ($data['tipe'] == 1) {
            $data['tipe'] = 'Sekolah';
        } elseif ($data['tipe'] == 2) {
            $data['tipe'] = 'Komunitas & Organisasi';
        } elseif ($data['tipe'] == 3) {
            $data['tipe'] = 'Instansi / Perusahaan';
        } elseif ($data['tipe'] == 4) {
            $data['tipe'] = 'Brand';
        } elseif ($data['tipe'] == 5) {
            $data['tipe'] = 'Yang lain';
        }
        return $data->id;
    }
}
