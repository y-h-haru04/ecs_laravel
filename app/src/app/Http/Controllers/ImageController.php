<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Image;
use Illuminate\Support\Facades\Storage;

class ImageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $images = Image::all();
        return view('images', ['images' => $images]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $file = $request->file('image');
        $name = $file->getClientOriginalName();
        $path = \Storage::disk('s3')->putFile('/images', $file, $name);
        $image = new Image();
        $image->file_name = $name;
        $image->file_path = $path;
        $image->save();
        return redirect('/');
    }

    /**
     * Download the specified resource.
     */
    public function show(string $id)
    {
        $image = Image::find($id);
        $path = $image->file_path;
        $name = $image->file_name;

        if (empty($path) || !\Storage::disk('s3')->exists($path)) {
            return redirect('/images')->with('message', 'ファイルがありません');    
        }

        $file = \Storage::disk('s3')->get($path);
        $last_modified = \Storage::disk('s3')->lastModified($path);

        return response($file, 200, [
            'filename'            => $name,
            'Content-Type'        => 'text/plain',
            'Last-Modified'       => gmdate('D, d M Y H:i:s', $last_modified) . ' GMT',
            'Etag'                => md5($last_modified),
            'Content-Disposition' => 'attachment; filename="' . $name . '"',
        ]);
    }
}
