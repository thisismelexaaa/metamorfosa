<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use App\Models\NewsImage;
use App\Models\Panel\News;
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
        // dd($request->all());
        try {
            // Validate the incoming request data
            $validatedData = $request->validate([
                'title' => 'required|string|max:255',
                'image' => 'required|image|max:2048',
                // 'images' => 'required|array',
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

            // Process the main image
            if ($request->hasFile('image')) {
                $data['image'] = $this->processImage($request->file('image'));
            }

            // Store the main news data
            $news = News::create($data);

            // Process additional images
            if ($request->hasFile('images')) {
                foreach ($request->file('images') as $image) {
                    $fileName = $this->processImage($image);
                    $news->images()->create([
                        'image' => $fileName,
                        'alt_text' => $image->getClientOriginalName(),
                    ]);
                }
            }

            // Redirect with success message
            toast('Berita berhasil di post!', 'success');
            return redirect()->route('news.index');
        } catch (\Exception $e) {
            // Handle exceptions and redirect back with error message
            toast('Terjadi kesalahan saat memposting berita!, ' . $e, 'error');
            dd($e);
            return redirect()->back()->withInput();
        }
    }

    // Helper function to process image
    private function processImage($image)
    {
        $originalFileName = $image->getClientOriginalName();
        $fileExtension = $image->getClientOriginalExtension();
        $hashedFileName = hash('sha256', $originalFileName);
        $fileName = str_replace(' ', '_', $hashedFileName . '.' . $fileExtension);
        $image->move(public_path('assets/image/news'), $fileName);
        return $fileName;
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

        $data['imgaes'] = NewsImage::where('news_id', $id)->get();
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

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                // Get the original name of the uploaded file
                $originalFileName = $image->getClientOriginalName();

                // Get the file extension
                $fileExtension = $image->getClientOriginalExtension();

                // Hash the original file name
                $hashedFileName = hash('sha256', $originalFileName);

                // Combine the hashed name with the original file extension
                $fileName = $hashedFileName . '.' . $fileExtension;

                // Optionally, sanitize the file name to avoid issues with special characters
                $fileName = str_replace(' ', '_', $fileName);

                // Move the file to the public folder with the new name
                $image->move(public_path('assets/image/news'), $fileName);

                // delete all image first except in $request->image_id
                $imageIds = array_filter($request->image_id, function ($value) {
                    return !is_null($value);
                });

                $unlink = NewsImage::where('news_id', $id)->whereNotIn('id', $imageIds)->get();
                foreach ($unlink as $key => $value) {
                    unlink(public_path('assets/image/news/' . $value->image));
                }

                // delete all image first except in $request->image_id
                NewsImage::where('news_id', $id)->whereNotIn('id', $imageIds)->delete();

                // Save the file name in the 'image' column
                $news->images()->create([
                    'image' => $fileName,
                    'alt_text' => $originalFileName,
                ]);
            }
        }


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
        $news->status = 2;
        $news->delete();

        toast('Berita berhasil di hapus!', 'success');

        return back();
    }

    public function trashed()
    {

        $data['news'] = News::onlyTrashed()->get();
        $data['news']->each(function ($data) {
            $this->DefineId($data);
        });
        return view('panel.news.trashed', $data);
    }

    public function restore(string $id)
    {
        $news = News::withTrashed()->findOrFail($id);
        $news->status = 1;
        $news->restore();

        toast('Berita berhasil di restore!', 'success');

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
