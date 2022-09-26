<?php

namespace App\Http\Controllers;

use App\Models\Picture;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GalleryController extends Controller
{
    public function index(Request $request)
    {
        $pictures = Picture::with('user')->where(function ($query) use ($request) {
            if ($request->search) {
                $query->where('title', 'LIKE', "%{$request->search}%");
            }
        })->latest()->paginate(20);

        return view('gallery', compact('pictures'));
    }
}
