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
        // Retrieve all users except those with the 'admin' role
        $users = User::where('role', '!=', 'admin')->get();

        // Define variables for the delete confirmation prompt
        $title = 'Delete Confirmation';
        $text = "Apakah anda yakin ingin menghapus pengguna ini?";

        // Call the confirmDelete function (assuming it's defined elsewhere)
        confirmDelete($title, $text);

        // Process each user to define role, status, and gender
        $users->each(function ($user) {
            $this->DefineId($user);
        });

        // Debugging output
        // dd($users);

        // Return the view with the users
        return view('panel.account.index', compact('users'));
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

            $password = bcrypt('metamorfosa');

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
                'updated_at' => now(),
                'created_at' => now(),
            ];

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
        // Retrieve the user by ID
        $data = User::find($id);

        // Check if the user exists
        if (!$data) {
            // Handle the case where the user is not found (optional)
            abort(404, 'User not found');
        }

        // Apply the DefineId function to the retrieved user
        $this->DefineId($data);

        // Return the edit view with the user data
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
        // User::where('id', $id)->delete();

        $user = User::find($id);
        // delete
        $user->delete();

        toast('Akun berhasil di hapus!', 'success');
        return redirect()->route('account.index');
    }

    private function DefineId($user)
    {
        // Define role
        switch ($user->role) {
            case 1:
                $user->role = 'Admin';
                break;
            case 2:
                $user->role = 'Support Teacher';
                break;
            case 3:
                $user->role = 'Staff';
                break;
            case 4:
                $user->role = 'Receptionist';
                break;
            case 5:
                $user->role = 'Official';
                break;
        }

        // Define marital status
        switch ($user->status) {
            case 1:
                $user->status = 'Sudah Menikah';
                break;
            case 2:
                $user->status = 'Belum Menikah';
                break;
        }

        // Define gender
        $user->jenis_kelamin = ($user->jenis_kelamin == 1) ? 'Laki - Laki' : 'Perempuan';
    }
}
