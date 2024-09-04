<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NewsController extends Controller
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
        $data['news'] = News::all();

        $data['news']->each(function ($data) {
            $this->DefineId($data);
        });

        // dd($data);
        return view('panel.news.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('panel.news.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'kategori' => 'required|string|max:255',
            'konten' => 'required|string',
        ]);

        // Prepare the data for storing
        $data = [
            'judul' => $validatedData['title'],
            'author' => Auth::user()->name,
            'category' => $validatedData['kategori'],
            'status' => 1,
            'content' => $validatedData['konten'],
            'created_at' => now(),
            'updated_at' => now(),
        ];

        // Check if the request has a file named 'image'
        if ($request->hasFile('image')) {
            // Get the original name of the uploaded file
            $originalFile = $request->file('image');
            $originalFileName = $originalFile->getClientOriginalName();

            // Get the file extension
            $fileExtension = $originalFile->getClientOriginalExtension();

            // Hash the original file name
            $hashedFileName = hash('sha256', $originalFileName);

            // Combine the hashed name with the original file extension
            $fileName = $hashedFileName . '.' . $fileExtension;

            // Optionally, sanitize the file name to avoid issues with special characters
            $fileName = str_replace(' ', '_', $fileName);

            // Move the file to the public folder with the new name
            $originalFile->move(public_path('assets/image/news'), $fileName);

            // Save the file name in the 'image' column
            $data['image'] = $fileName;
        }

        // Dump the validated data and prepared data for debugging
        // dd($request->all(), $data);

        // Store the data in the database
        News::create($data);

        // Redirect back with success message
        toast('Berita berhasil di post!', 'success');
        return redirect()->route('news.index');
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
        $data['news'] = News::findOrFail($id);

        $this->DefineId($data['news']);

        return view('panel.news.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'kategori' => 'required|string|max:255',
            'konten' => 'required|string',
        ]);

        // Find the news item by ID
        $news = News::findOrFail($id);

        // Prepare the data for updating
        $data = [
            'judul' => $validatedData['title'],
            'author' => Auth::user()->name,
            'category' => $validatedData['kategori'],
            'status' => $news->status, // Preserve existing status or modify as needed
            'content' => $validatedData['konten'],
            'updated_at' => now(),
        ];

        // Check if a new image file is uploaded
        if ($request->hasFile('image')) {
            // Delete the old image if it exists
            if ($news->image && file_exists(public_path('assets/image/news/' . $news->image))) {
                unlink(public_path('assets/image/news/' . $news->image));
            }

            // Get the original file name and extension
            $originalFile = $request->file('image');
            $originalFileName = pathinfo($originalFile->getClientOriginalName(), PATHINFO_FILENAME);
            $fileExtension = $originalFile->getClientOriginalExtension();

            // Hash the original file name
            $hashedFileName = hash('sha256', $originalFileName);

            // Combine the hashed name with the original file extension
            $fileName = $hashedFileName . '.' . $fileExtension;

            // Optionally, sanitize the file name to avoid any issues with special characters
            $fileName = str_replace(' ', '_', $fileName);

            // Move the file to the public folder with the new name
            $originalFile->move(public_path('assets/image/news'), $fileName);

            // Save the new file name in the 'image' column
            $data['image'] = $fileName;
        }

        // Update the news item in the database
        $news->update($data);

        // Redirect back with a success message
        toast('Berita berhasil diupdate!', 'success');
        return redirect()->route('news.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $news = News::findOrFail($id);

        // Toggle status between 1 and 2
        $news->status = $news->status == 1 ? 2 : 1;
        $news->save();

        $message = $news->status == 1
            ? 'Postingan berhasil di arsipkan!'
            : 'Data berhasil di posting ulang!';

        toast($message, 'success');

        return back();
    }

    private function DefineId($data)
    {
        // Define role
        switch ($data->category) {
            case 1:
                $data->category = [
                    'category' => 'Berita',
                    'id' => '1',
                ];
                break;
            case 2:
                $data->category = [
                    'category' => 'Acara Mendatang',
                    'id' => '2',
                ];
                break;
        }

        // Define status
        switch ($data->status) {
            case 1:
                $data->status = [
                    'status' => 'Publish',
                    'id' => '1',
                ];
                break;
            case 2:
                $data->status = [
                    'status' => 'Draft',
                    'id' => '2',
                ];
                break;
        }
    }
}
