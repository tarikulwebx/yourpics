<?php

namespace App\Http\Controllers;

use App\Models\Picture;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class PictureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = Auth::user();
        $tags = Tag::pluck('name', 'id');
        return view('profile.upload', compact('user', 'tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $slug)
    {
        $user = Auth::user();

        $request->validate([
            'picture' => 'required|image|mimes:png,jpg,gif',
            'title' => 'required|string|max:30',
            'description' => 'nullable|string|max:300'
        ]);

        $selected_tags =  $request->tags;
        $selected_tags_int = array_map('intval', $selected_tags);

        // dd($selected_tags_int);

        if ($request->hasFile('picture')) {
            $picture = $request->picture;

            [$width, $height] = getimagesize($picture);

            $dimension = $width . 'x' . $height;
            $size = round(filesize($picture) / (1024 * 1024), 2); // File size in MB

            $picture_name_with_extension = $picture->getClientOriginalName();
            $original_name = pathinfo($picture_name_with_extension, PATHINFO_FILENAME);
            $extension = pathinfo($picture_name_with_extension, PATHINFO_EXTENSION);

            $picture_name  = time() . '_' . Str::lower(str_replace(' ', '-', $original_name)) . '.' . $extension;

            Storage::putFileAs('', $picture, $picture_name);

            $picture = $user->pictures()->create([
                'title' => $request->title,
                'picture' => $picture_name,
                'dimension' => $dimension,
                'size'  => $size,
                'description' => $request->description,
                'is_published' => true
            ]);

            $picture->tags()->attach($selected_tags_int);

            return redirect()->route('profile.index')->with('success', 'Picture has been uploaded');
        }
    }


    /**
     * Uploaded Images of a Profile
     */
    public function uploads($slug)
    {
        $user = Auth::user();
        return view('profile.uploads');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Picture  $picture
     * @return \Illuminate\Http\Response
     */
    public function show(Picture $picture)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Picture  $picture
     * @return \Illuminate\Http\Response
     */
    public function edit(Picture $picture)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Picture  $picture
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Picture $picture)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Picture  $picture
     * @return \Illuminate\Http\Response
     */
    public function destroy(Picture $picture)
    {
        //
    }
}
