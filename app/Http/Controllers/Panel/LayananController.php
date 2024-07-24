<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use App\Models\Panel\Settings\Layanan;
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
        $layanan = Layanan::all()->toArray();

        foreach ($layanan as $key => $value) {
            $sub_layanan = $value['sub_layanan'];

            // convert to array
            // $sub_layanan = json_encode($sub_layanan);
            // explode
            $sub_layanan = explode(',', $sub_layanan);
            $layanan[$key]['sub_layanan'] = $sub_layanan;
            // dd($sub_layanan);
        }


        return view('panel.admin.layanan.index', compact('layanan'));
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

            $data->validate([
                'layanan' => 'required',
            ]);

            $data = [
                'layanan' => $data->layanan,
                'sub_layanan' => $data->sub_layanan,
            ];

            Layanan::create($data);

            toast('Layanan berhasil di tambahkan!', 'success');
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

            $data->validate([
                'layanan' => 'required',
            ]);
            $data = [
                'layanan' => $data->layanan,
                'sub_layanan' => $data->sub_layanan,
            ];

            Layanan::find($id)->update($data);

            toast('Layanan berhasil di ubah!', 'success');
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

    public function getLayanan()
    {
        // get data
        $data = Layanan::all();
        return response()->json($data);
    }
}
