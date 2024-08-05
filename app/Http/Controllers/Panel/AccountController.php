<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class AccountController extends Controller
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
        $user = User::where('role', '!=', 'admin')->get();

        $title = '';
        $text = "Apakah anda yakin?";
        confirmDelete($title, $text);
        // dd($user);
        return view('panel.account.index', compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('panel.account.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request;
        try {
            $data = $data->validate([
                'name' => 'required',
                'username' => 'required',
                'email' => 'required',
                'role' => 'required',
                'alamat' => 'required',
                'status' => 'required',
                'jenis_kelamin' => 'required',

            ]);

            $password = bcrypt($data['username']);

            $data = [
                'name' => $data['name'],
                'username' => $data['username'],
                'email' => $data['email'],
                'role' => $data['role'],
                'alamat' => $data['alamat'],
                'status' => $data['status'],
                'jenis_kelamin' => $data['jenis_kelamin'],
                'password' => $password,
                'username' => $data['username'],
                'email_verified_at' => now(),
                'updated_at' => now(),
                'created_at' => now(),
            ];

            // dd($data);

            User::create($data);

            toast('Akun berhasil di tambahkan!', 'success');
            return redirect()->route('account.index');
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
        $data = User::find($id);

        $this->DefineId($data);

        return view('panel.account.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request;
        try {
            $data = $data->validate([
                'name' => 'required',
                'email' => 'required',
                'role' => 'required',
                'alamat' => 'required',
                'status' => 'required',
                'jenis_kelamin' => 'required',
            ]);

            $data = [
                'name' => $data['name'],
                'email' => $data['email'],
                'role' => $data['role'],
                'alamat' => $data['alamat'],
                'status' => $data['status'],
                'jenis_kelamin' => $data['jenis_kelamin'],
                'updated_at' => now(),
            ];

            // dd($data);

            User::where('id', $id)->update($data);

            toast('Akun berhasil di ubah!', 'success');
            return redirect()->route('account.index');
        } catch (\Exception $e) {
            toast($e->getMessage(), 'error');
            return redirect()->back()->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        User::where('id', $id)->delete();
        toast('Akun berhasil di hapus!', 'success');
        return redirect()->route('account.index');
    }

    private function DefineId($data)
    {
        // role
        if ($data->role == 1) {
            $data->role = 'Admin';
        } else if ($data->role == 2) {
            $data->role = 'Support Teacher';
        } else if ($data->role == 3) {
            $data->role = 'Staff';
        } else if ($data->role == 4) {
            $data->role = 'Receptionist';
        } else if ($data->role == 5) {
            $data->role = 'Official';
        }

        // status
        if ($data->status == 1) {
            $data->status = 'Sudah Menikah';
        } else if ($data->status == 2) {
            $data->status = 'Belum Menikah';
        }

        // jenis_kelamin
        if ($data->jenis_kelamin == 1) {
            $data->jenis_kelamin = 'Laki - Laki';
        } else {
            $data->jenis_kelamin = 'Perempuan';
        }
    }
}
