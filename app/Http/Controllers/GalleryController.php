<?php

namespace App\Http\Controllers;

use App\Models\Picture;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GalleryController extends Controller
{
    public function index(Request $request)
    {
        // dd($request->tag);
        $pictures = Picture::with('user')->where(function ($query) use ($request) {
            if ($request->search) {
                $query->where('title', 'LIKE', "%{$request->search}%");
            }
        })->latest()->paginate(10);

        $tags = Tag::orderBy('name', 'asc')->get();

        return view('gallery', compact('pictures', 'tags'));
    }
}
