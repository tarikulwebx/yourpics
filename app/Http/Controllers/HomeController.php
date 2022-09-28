<?php

namespace App\Http\Controllers;

use App\Models\Picture;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
    public function index(Request $request)
    {
        $pictures = Picture::with('user')->latest()->paginate(20);
        $tags = Tag::orderBy('name', 'asc')->get();

        if ($request->ajax()) {
            $html = '';

            foreach ($pictures as $picture) {

                $fav_btn_content = '';
                if (Auth::guest()) {
                    $fav_btn_content .= '<button class="btn fav-btn" data-id="' . $picture->id . '">
                                        <i class="fa-regular fa-heart"></i>
                                    </button>';
                } else {
                    if (Auth::user()->favorites()->where('picture_id', '=', $picture['id'])->count() > 0) {
                        $fav_btn_content .= '<button class="btn fav-btn text-white" data-id="' . $picture->id . '">
                                        <i class="fa-solid fa-heart "></i>
                                    </button>';
                    } else {
                        $fav_btn_content .= '<button class="btn fav-btn" data-id="' . $picture->id . '">
                                        <i class="fa-regular fa-heart"></i>
                                    </button>';
                    }
                }

                $html .= '<div class="col-sm-6 col-md-4 col-lg-3 grid-item">
                        <div class="img-card">
                            <a href="#" class="image-wrapper-link d-block showModalBtn"
                                data-id="' . $picture->id . '">
                                <img class="img-fluid" src="' . $picture->picture_url . '"
                                    alt="' . $picture->title . '" />
                            </a>
                            <div class="card-hover-content p-2 d-flex flex-column text-white">
                                <div
                                    class="card-hover-content__header d-flex align-items-center justify-content-between">
                                    <div class="caption fw-semibold">
                                        ' . $picture->title . '
                                    </div>
                                    ' . $fav_btn_content . '
                                </div>
                                <div
                                    class="card-hover-content__footer d-flex align-items-center justify-content-between">
                                    <div class="author d-flex align-items-center gap-2">
                                        <img src="' . $picture->user->picture_url . '" class="rounded-circle d-block"
                                            alt=".." />
                                        <div>
                                            <h6 class="mb-0 fw-semibold ">
                                                <a href="' . route('author.index', $picture->user->slug) . '"
                                                    class="text-decoration-none">' . $picture->user->full_name . '</a>
                                            </h6>
                                            <small class="d-block fw-normal text-light"><i class="fa-solid fa-award"></i>
                                                ' . $picture->user->rank . '</small>
                                        </div>
                                    </div>
                                    <a href="' . route('download', $picture->slug) . '" class="btn download-btn">
                                        <i class="fa-solid fa-download"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        
                    </div>';
            }


            return $html;
        }


        $popular_tags = Tag::withCount('pictures')->get()->sortByDesc('pictures_count')->take(5);
        return view('home', compact('tags', 'popular_tags'));
    }
}
