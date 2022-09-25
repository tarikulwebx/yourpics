<?php

namespace App\Http\Controllers;

use App\Models\Picture;
use App\Models\Tag;
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
    public function index()
    {
        // $pictures = Picture::with('user')->where('is_published', '=', true)->orderBy('created_at', 'desc')->simplePaginate(2);
        $tags = Tag::all();
        return view('home', compact('tags'));
    }

    public function loadMorePicture(Request $request)
    {
        if ($request->id > 0) {
            info('clicked');
            $pictures = Picture::with('user')
                ->where('id', '<', $request->id)
                ->orderBy('id', 'DESC')
                ->limit(12)
                ->get();
        } else {
            $pictures = Picture::with('user')->limit(12)->orderBy('id', 'DESC')->get();
        }

        $output = '';
        $last_id = '';


        if ($pictures->count() > 0) {
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

                $output .= '
                    <div class="col-sm-6 col-md-4 col-lg-3 grid-item">
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
                                            <h6 class="mb-0 fw-semibold">
                                                <a href="#"
                                                    class="text-decoration-none">' . $picture->user->full_name . '</a>
                                            </h6>
                                            <small class="d-block text-light"><i class="fa-solid fa-award"></i>
                                                popular</small>
                                        </div>
                                    </div>
                                    <a href="' . route('download', $picture->slug) . '" class="btn download-btn">
                                        <i class="fa-solid fa-download"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                ';
                $last_id = $picture->id;
            }

            $output .= '
                <h1 id="dataElement" class="d-none" data-id="' . $last_id . '" data-have="true"></h1>
            ';
        } else {
            $output .= '
                <h1 id="dataElement" class="d-none" data-have="false"></h1>
            ';
        }

        return $output;
    }
}
