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
                $data->validate([
                    'layanan' => 'required',
                    'sub_layanan' => 'required',
                    'harga' => 'required',
                ]);

                $data = [
                    'id_layanan' => $data->id_layanan,
                    'layanan' => $data->layanan,
                    'sub_layanan' => $data->sub_layanan,
                    'harga' => $data->harga
                ];

                SubLayanan::create($data);
                toast('Sub Layanan berhasil di tambahkan!', 'success');
            } else { // Layanan
                $data->validate([
                    'layanan' => 'required',
                ]);

                $data = [
                    'layanan' => $data->layanan,
                ];

                Layanan::create($data);
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
    public function update(Request $request, string $id)
    {
        try {
            $data = $request;
            if ($data->has('id_sublayanan')) { // Sub Layanan
                $getData = SubLayanan::find($data->id_sublayanan);

                $data->validate([
                    'layanan' => 'required',
                    'sub_layanan' => 'required',
                    'harga' => 'required',
                ]);

                $data = [
                    'id_layanan' => $getData->id_layanan,
                    'sub_layanan' => $getData->sub_layanan,
                    'harga' => $getData->harga
                ];

                $getData->update($data);
                toast('Sub Layanan berhasil di ubah!', 'success');
            } else { // Layanan
                $data->validate([
                    'layanan' => 'required',
                ]);
                $data = [
                    'layanan' => $data->layanan,
                    'sub_layanan' => $data->sub_layanan,
                ];

                Layanan::find($id)->update($data);
                toast('Layanan berhasil di ubah!', 'success');
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
    public function destroy(string $id)
    {
        //
    }

    // public function getLayanan($id)
    // {
    //     // get data
    //     $data = Layanan::find($id);

    //     return response()->json($data);
    // }
}
