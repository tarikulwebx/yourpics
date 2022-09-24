<?php

namespace App\Http\Controllers;

use App\Models\Picture;
use App\Models\Tag;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $pictures = Picture::with('user')->where('is_published', '=', true)->get();
        $tags = Tag::all();
        return view('home', compact('pictures', 'tags'));
    }
}
