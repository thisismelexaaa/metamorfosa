<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use App\Models\Panel\Customer;
use App\Models\Panel\HasilKonsultasi;
use App\Models\Panel\Konsultasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ScheduleController extends Controller
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

        // check auth
        $data['auth'] = Auth::user();

        $id_role = $data['auth']->role;

        if ($id_role == 'admin' || $id_role == 4 || $id_role == 5) {
            $data['konsultasi'] = Konsultasi::all();
        } else {
            $data['konsultasi'] = Konsultasi::where('id_support_teacher', Auth::user()->id)->get();
        }

        $data['hasil_konsultasi'] = HasilKonsultasi::all();

        // dd($data['konsultasi'][0]->hasilKonsultasi);

        return view('panel.schedule.index', $data);
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
        // Validate the request inputs
        $request->validate([
            'id_konsultasi' => 'required',
            'id_sub_layanan' => 'required',
            'id_layanan' => 'required',
            'id_user' => 'required',
            'id_customer' => 'required',
            'fotoNotes' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
        ]);

        // insert image
        $image = $request->file('fotoNotes');

        // get username but replace space with underscore and lowercase
        $username = str_replace(' ', '_', strtolower(Auth::user()->name));

        // if there is no folder in public/absen-konsultasi/username create new folder
        if (!file_exists(public_path('assets/absen-konsultasi/' . $username))) {
            mkdir(public_path('assets/absen-konsultasi/' . $username), 0777, true);
        }

        $new_name = $username . '_' . $request->hari . '_' . rand() . '.' . $image->getClientOriginalExtension();

        $image->move(public_path('assets/absen-konsultasi/' . $username), $new_name);

        // Prepare the data array
        $data = [
            'id_konsultasi' => $request->id_konsultasi,
            'id_sub_layanan' => $request->id_sub_layanan,
            'id_layanan' => $request->id_layanan,
            'id_user' => $request->id_user,
            'id_customer' => $request->id_customer,
            'hasil' => $request->hasil_konsultasi ?? 'Tidak Ada Hasil Konsultasi',
            'foto_notes' => $new_name,
            'created_at' => now(),
            'updated_at' => now(),
            'hari' => $request->hari,
            // 'hari' => 4, //delete in prod
        ];


        // check hasil konsultasi
        // get the biggest hari in hasil konsultasi
        $hasil_kons = HasilKonsultasi::where('id_konsultasi', $request->id_konsultasi)->orderBy('hari', 'desc')->first();
        // dd($hasil_kons);

        if (!$hasil_kons) {
            $loop = 0;
        } else {
            $loop = $hasil_kons->hari;
        }

        if ($request->hari > $loop) {
            // buatkan hasil konsultasi baru di hari sebelum $request->hari dengan foto null dan hasil tidak hadir
            for ($i = $loop + 1; $i < $request->hari; $i++) {
                HasilKonsultasi::create([
                    'id_konsultasi' => $request->id_konsultasi,
                    'id_sub_layanan' => $request->id_sub_layanan,
                    'id_layanan' => $request->id_layanan,
                    'id_user' => $request->id_user,
                    'id_customer' => $request->id_customer,
                    'hasil' => 'Tidak Hadir',
                    'foto_notes' => null,
                    'created_at' => now(),
                    'updated_at' => now(),
                    'hari' => $i,
                ]);
            }
        }

        // dd($data);

        // Check if a previous consultation result exists for this consultation
        // $cek = HasilKonsultasi::where('id_konsultasi', $data['id_konsultasi'])
        //     ->latest()
        //     ->first();

        // Increment 'hari' if a previous result exists, otherwise set to 1
        // $data['hari'] = optional($cek)->hari + 1 ?? 1;

        // dd($data);
        // Create a new consultation result
        HasilKonsultasi::create($data);

        // Notify success and redirect back
        toast('Hasil Konsultasi berhasil diperbarui!', 'success');
        return redirect()->back();
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
