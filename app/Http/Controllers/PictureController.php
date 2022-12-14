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
     * Pictures by Tag 
     */
    public function picturesByTag(Request $request, $slug)
    {
        $tag = Tag::findBySlugOrFail($slug);
        $tags = Tag::orderBy('name', 'asc')->get();
        $pictures = $tag->pictures()->where(function ($query) use ($request) {
            if ($request->search) {
                $query->where('title', 'LIKE', '%' . $request->search . '%');
            }
        })->latest()->paginate(20);
        return view('tag', compact('tag', 'pictures', 'tags'));
    }

    /**
     * Single Picture Show
     */
    public function singlePicture($slug)
    {
        $picture = Picture::findBySlugOrFail($slug);
        $picture->update([
            'views' => $picture->views + 1
        ]);

        $related_pictures = $picture->relatedPicturesByTag(8);
        return view('single', compact('picture', 'related_pictures'));
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
            'description' => 'nullable|string|max:300',
            'tags' => 'required|array|min:1'
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

            return redirect()->route('profile.uploads', $user->slug)->with('success', 'Picture has been uploaded');
        }
    }


    /**
     * Uploaded Images of a Profile
     */
    public function uploads(Request $request, $slug)
    {
        $user = Auth::user();
        $pictures = $user->pictures()->where(function ($query) use ($request) {
            if ($request->search) {
                $query->where('title', 'LIKE', '%' . $request->search . '%');
            }
        })->latest()->paginate(12);

        return view('profile.uploads', compact('pictures'));
    }


    /**
     * Upload Single Show
     */
    public function uploadShow($user_slug, $picture_slug)
    {
        dd('working');
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
     * Download
     */
    public function download($slug)
    {
        $picture = Picture::findBySlugOrFail($slug);
        $picture->update([
            'downloads' => $picture->downloads + 1,
        ]);
        return Storage::download($picture->picture);
    }

    /**
     * Get Users Pictures
     */
    public function getPictureById($id)
    {
        $picture = Picture::findOrFail($id);
        $picture->update([
            'views' => $picture->views + 1
        ]);

        $picture->user;
        $picture->tags;
        $related = $picture->relatedPicturesByTag();

        foreach ($related as $related_pic) {
            $related_pic->user['rank'] = $related_pic->user->rank;
        }

        $picture['related'] = $related;
        $picture['favorites_count'] = $picture->favorites()->count();
        $picture['user_rank'] = $picture->user->rank;

        if (Auth::guest()) {
            $picture['favorite'] = false;
        } else {
            if (Auth::user()->favorites()->where('picture_id', '=', $id)->count() > 0) {
                $picture['favorite'] = true;
            }
        }

        // dd($picture);

        // $related_pictures = Picture::whereHas('tags', function ($query) use ($picture) {
        //     $tagIds = $picture->tags()->pluck('tags.id')->all();
        //     $query->whereIn('tags.id', $tagIds);
        // })->where('id', '<>', $picture->id)->get();

        return response()->json($picture);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Picture  $picture
     * @return \Illuminate\Http\Response
     */
    public function edit($user_slug, $picture_slug)
    {
        $picture = Picture::findBySlugOrFail($picture_slug);
        $tags = Tag::pluck('name', 'id');
        $selected_tags = $picture->tags->pluck('id');

        return view('profile.upload-edit', compact('picture', 'tags', 'selected_tags'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Picture  $picture
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $user_slug, $picture_slug)
    {
        $user = Auth::user();
        $picture = Picture::findBySlugOrFail($picture_slug);

        $request->validate([
            'title'       => 'required|string|max:30',
            'description' => 'nullable|string|max:300',
            'tags'        => 'required|array|min:1'
        ]);

        $picture->update([
            'title'       => $request->title,
            'description' => $request->description,
        ]);

        $picture->tags()->sync(request()->tags);
        return redirect()->back()->with('success', 'Picture has been updated successfully');
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


    // Delete Picture By Id
    public function deletePictureById($id)
    {
        $user = Auth::user();
        $picture = Picture::findOrFail($id);

        if ($picture->user_id == $user->id) {
            $picture->tags()->detach();
            if (Storage::exists($picture->picture)) {
                Storage::delete($picture->picture);
            }

            $picture->delete();
            session()->flash('success', 'Picture has been deleted successfully');
            return response()->json();
        }
    }
}
