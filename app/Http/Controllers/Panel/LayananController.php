<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use App\Models\Panel\Layanan;
use App\Models\Panel\SubLayanan;
use Illuminate\Http\Request;

class LayananController extends Controller
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
        $layanan = Layanan::all();
        $sublayanan = SubLayanan::all();

        return view('panel.layanan.index', compact('layanan', 'sublayanan'));
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
        try {
            $data = $request;

            if ($data->has('id_layanan')) { // Sub Layanan

                $validatedData = $data->validate([
                    'layanan' => 'required',
                    'sub_layanan' => 'required',
                    'harga' => 'required',
                ]);

                // Extract numeric value from 'harga'
                $validatedData['harga'] = preg_replace('/[^\d]/', '', $validatedData['harga']);
                $validatedData['id_layanan'] = $data->id_layanan;

                SubLayanan::create($validatedData);
                toast('Sub Layanan berhasil di tambahkan!', 'success');
            } else { // Layanan

                $validatedData = $data->validate([
                    'layanan' => 'required',
                ]);

                Layanan::create($validatedData);
                toast('Layanan berhasil di tambahkan!', 'success');
            }

            return redirect()->back();
        } catch (\Exception $e) {
            toast($e->getMessage(), 'error');
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
        // get data
        $data = Layanan::find($id);
        return response()->json($data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        try {
            $data = $request;

            if ($data->has('id_sublayanan')) { // Sub Layanan
                $subLayanan = SubLayanan::findOrFail($data->id_sublayanan);

                $validatedData = $data->validate([
                    'layanan' => 'required',
                    'sub_layanan' => 'required',
                    'harga' => 'required',
                ]);

                // Extract numeric value from 'harga'
                $validatedData['harga'] = preg_replace('/[^\d]/', '', $validatedData['harga']);
                $validatedData['id_layanan'] = $subLayanan->id_layanan;
                $validatedData['sub_layanan'] = $subLayanan->sub_layanan;

                $subLayanan->update($validatedData);
                toast('Sub Layanan berhasil diubah!', 'success');
            } else { // Layanan
                $layanan = Layanan::findOrFail($data->id); // Pastikan $id didapat dari $data

                $validatedData = $data->validate([
                    'layanan' => 'required',
                ]);

                $layanan->update($validatedData);
                toast('Layanan berhasil diubah!', 'success');
            }

            return redirect()->back();
        } catch (\Exception $e) {
            toast($e->getMessage(), 'error');
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id, Request $request)
    {
        try {
            if ($request->has('sub_layanan')) {
                $subLayanan = SubLayanan::findOrFail($id);
                $subLayanan->status = $subLayanan->status == 1 ? 2 : 1;
                $subLayanan->save();
                // $subLayanan->delete();
                $message = $subLayanan->status == 1 ? 'Data berhasil dikembalikan!' : 'Data berhasil dihapus!';
            } else {
                $konsultasi = Layanan::findOrFail($id);
                $konsultasi->status = $konsultasi->status == 1 ? 2 : 1;
                $konsultasi->save();
                // $konsultasi->delete();
                $message = $konsultasi->status == 1 ? 'Data berhasil dikembalikan!' : 'Data berhasil dihapus!';
            }

            toast($message, 'success');
            return redirect()->back();
        } catch (\Exception $e) {
            toast($e->getMessage(), 'error');
            return redirect()->back();
        }
    }

    // public function getLayanan($id)
    // {
    //     // get data
    //     $data = Layanan::find($id);

    //     return response()->json($data);
    // }
}
