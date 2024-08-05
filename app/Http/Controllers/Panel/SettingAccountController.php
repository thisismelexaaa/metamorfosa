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
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        // dd($user);
        $this->DefineId($user);
        $user = [
            'id' => $user->id,
            'name' => $user->name,
            'username' => $user->username,
            'email' => $user->email,
            'role' => $user->role,
            'alamat' => $user->alamat,
            'jenis_kelamin' => $user->jenis_kelamin,
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
    public function update(Request $request, string $id)
    {
        try {
            $user = User::findOrFail($id);

            $validatedData = $request->validate([
                'name' => 'required|string|max:255',
                'username' => 'required|string|max:255',
                'email' => 'required|email|max:255|unique:users,email,' . $id,
                'alamat' => 'required|string|max:255',
                'jenis_kelamin' => 'required|string|max:255',
                'password' => 'nullable|string|min:8|confirmed',
            ]);

            $updateData = [
                'name' => $validatedData['name'],
                'username' => $validatedData['username'],
                'email' => $validatedData['email'],
                'alamat' => $validatedData['alamat'],
                'jenis_kelamin' => $validatedData['jenis_kelamin'],
                'updated_at' => now(),
            ];

            if (!empty($validatedData['password'])) {
                $updateData['password'] = Hash::make($validatedData['password']);
            }

            $user->update($updateData);

            toast('User berhasil diubah!', 'success');
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
        // dd($user);
        // jenis_kelamin
        if ($user['jenis_kelamin'] == 1) {
            $user['jenis_kelamin'] = 'Laki - Laki';
        } else {
            $user['jenis_kelamin'] = 'Perempuan';
        }
    }
}
