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

        // dd($user);
        return view('panel.admin.account.index', compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('panel.admin.account.create');
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
                'email' => 'required',
                'role' => 'required',
                'alamat' => 'required',
                'status' => 'required',
                'jenis_kelamin' => 'required',

            ]);

            $email = substr($data['email'], 0, strpos($data['email'], '@'));
            $password = bcrypt($email);

            $data = [
                'name' => $data['name'],
                'email' => $data['email'],
                'role' => $data['role'],
                'alamat' => $data['alamat'],
                'status' => $data['status'],
                'jenis_kelamin' => $data['jenis_kelamin'],
                'password' => $password,
                'username' => $email,
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
        //
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
}
