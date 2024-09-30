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

        // Process each user to define role, status, and gender
        $users->each(function ($user) {
            $this->DefineId($user);
        });

        // Return the view with the users
        return view('panel.account.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        $data['isFounder'] = User::where('isFounder', 1)->first();
        $data['isCoFounder'] = User::where('isCoFounder', 1)->first();

        return view('panel.account.create', $data);
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $data = $request->validate([
                'name' => 'required',
                'username' => 'required|unique:users,username',
                'email' => 'required|email|unique:users,email',
                'role' => 'required',
                'alamat' => 'required',
                'status' => 'required',
                'jenis_kelamin' => 'required',
                'no_hp' => 'required',
            ]);

            // Handle file upload
            if ($request->hasFile('gambar')) {
                $file = $request->file('gambar');
                $nama_file = time() . "_" . $file->getClientOriginalName();
                $file->move(public_path('assets/panel/profile_images'), $nama_file);
                $data['gambar'] = $nama_file; // Save the file name in the data array
            }

            if ($request->jenis_kelamin == 'Laki-laki') {
                $data['jenis_kelamin'] = 1;
            } else {
                $data['jenis_kelamin'] = 2;
            }

            $data['password'] = bcrypt('metamorfosa');
            $data['created_at'] = now();
            $data['updated_at'] = now();

            if ($request->isFounder == 'on') {
                $data['isFounder'] = 1;
                $data['isCoFounder'] = null;
            }

            if ($request->isCoFounder == 'on') {
                $data['isFounder'] = null;
                $data['isCoFounder'] = 1;
            }

            // dd($data);
            User::create($data); // Store the validated data including 'gambar' field

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
        // This method is intentionally left empty for now.
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
        try {
            $data = $request->validate([
                'name' => 'required',
                'email' => 'required|email|unique:users,email,' . $id,
                'role' => 'required',
                'alamat' => 'required',
                'status' => 'required',
                'jenis_kelamin' => 'required',
                'no_hp' => 'required',
            ]);

            $user = User::find($id);

            // Handle file upload
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
                $data['gambar'] = $nama_file; // Save the new file name in the data array
            }

            $data['updated_at'] = now();
            $user->update($data); // Update the user with the new data including 'gambar'

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
        $user = User::find($id);

        if ($user) {
            // Delete the user's profile image if it exists
            if ($user->gambar) {
                $gambar_path = public_path('assets/panel/profile_images/' . $user->gambar);
                if (file_exists($gambar_path)) {
                    unlink($gambar_path);
                }
            }

            $user->delete();
            toast('Akun berhasil di hapus!', 'success');
        } else {
            toast('Akun tidak ditemukan!', 'error');
        }

        return redirect()->route('account.index');
    }

    public function trashed()
    {
        $users = User::onlyTrashed()->get();
        $users->each(function ($user) {
            $this->DefineId($user);
        });
        return view('panel.account.trashed', compact('users'));
    }

    public function restore(string $id)
    {
        $user = User::onlyTrashed()->find($id);
        $user->restore();
        toast('Akun berhasil di restore!', 'success');
        return redirect()->route('account.index');
    }

    /**
     * Define role, marital status, and gender for display purposes.
     */
    private function DefineId($user)
    {
        // Define role
        $roles = [
            1 => 'Admin',
            2 => 'Support Teacher',
            3 => 'Staff',
            4 => 'Receptionist',
            5 => 'Official',
        ];
        $user->role = $roles[$user->role] ?? 'Unknown Role';

        // Define marital status
        $statuses = [
            1 => 'Sudah Menikah',
            2 => 'Belum Menikah',
        ];
        $user->status = $statuses[$user->status] ?? 'Unknown Status';

        // Define gender
        $jenis_kelamin = [
            1 => 'Laki - Laki',
            2 => 'Perempuan',
        ];

        $user->jenis_kelamin = $jenis_kelamin[$user->jenis_kelamin] ?? 'Computer';
    }
}
