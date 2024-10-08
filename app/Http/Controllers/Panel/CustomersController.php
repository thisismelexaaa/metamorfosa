<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use App\Models\CustomerExport;
use App\Models\Panel\Customer;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Laravel\Ui\Presets\React;
use Maatwebsite\Excel\Excel;

class CustomersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $data['customer'] = Customer::all();

        return view('panel.customers.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('panel.customers.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $data = $request->validate([
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
            $data['no_daftar'] = strtoupper(substr(md5(time()), 0, 6));
            $data['status'] = 1;

            Customer::create($data);

            toast('Customer berhasil ditambahkan!', 'success');
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
        return view('panel.customers.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
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
                'status' => 1,
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
            $customer = Customer::findOrFail($id);

            $customer->status = 2;
            $customer->delete();

            toast('Data berhasil di hapus!', 'success');

            return back();
        } catch (\Exception $e) {
            toast($e->getMessage(), 'error');
            return back();
        }
    }

    public function trashed()
    {
        $data['customer'] = Customer::onlyTrashed()->get();

        return view('panel.customers.trashed', $data);
    }

    public function restore(string $id)
    {
        try {
            $customer = Customer::onlyTrashed()->where('id', $id)->first();

            $customer->status = 1;
            $customer->restore();

            toast('Data berhasil di kembalikan!', 'success');

            return back();
        } catch (\Exception $e) {
            toast($e->getMessage(), 'error');
            return back();
        }
    }
}
