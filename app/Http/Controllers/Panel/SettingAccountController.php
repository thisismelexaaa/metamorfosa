<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;

class SettingAccountController extends Controller
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
        $user = Auth::user();

        $this->DefineId($user);

        $user = [
            'id' => $user->id,
            'name' => $user->name,
            'username' => $user->username,
            'email' => $user->email,
            'role' => $user->role,
            'alamat' => $user->alamat,
            'jenis_kelamin' => $user->jenis_kelamin,
            'bio' => $user->bio,
            'gambar' => $user->gambar
        ];

        return view('panel.setting-account.index', compact('user'));
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
        //
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
    public function update(Request $request, $id)
    {
        try {
            $user = User::findOrFail($id);
            $updateData = [
                'name' => $request['name'],
                'username' => $request['username'],
                'email' => $request['email'],
                'alamat' => $request['alamat'],
                'jenis_kelamin' => $request['jenis_kelamin'],
                'bio' => $request->bio,
                'updated_at' => now(),
            ];

            if ($request->hasFile('gambar')) {
                // Delete the old image if it exists
                if ($user->gambar) {
                    $gambar_lama = public_path('assets/panel/profile_images/' . $user->gambar);
                    if (file_exists($gambar_lama)) {
                        unlink($gambar_lama);
                    }
                }

                // Upload the new image
                $file = $request->file('gambar');
                $nama_file = time() . "_" . $file->getClientOriginalName();
                $file->move(public_path('assets/panel/profile_images'), $nama_file);
                $updateData['gambar'] = $nama_file; // Save the new file name in the data array
            }

            if (!empty($request['password'])) {
                $updateData['password'] = Hash::make($request['password']);
            }

            // dd($updateData);
            $user->update($updateData);

            toast('Data berhasil diubah!', 'success');
            return redirect()->back();
        } catch (\Exception $e) {
            toast('User gagal diubah! Silakan coba lagi.', 'error');
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

    private function DefineId($user)
    {
        $user['jenis_kelamin'] = ($user['jenis_kelamin'] === 1) ? 'Laki - Laki' : 'Perempuan';
    }
}
