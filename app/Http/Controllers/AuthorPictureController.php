<?php

namespace App\Http\Controllers;

use App\Models\Picture;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthorPictureController extends Controller
{
    public function index(Request $request, $slug)
    {
        $author = User::findBySlugOrFail($slug);
        $uploaded_pictures = $author->pictures()->latest()->paginate(4, ['*'], 'uploads_page');

        $favIds = $author->favorites()->pluck('picture_id')->all();
        $favorite_pictures = Picture::where(function ($query) use ($favIds) {
            $query->whereIn('id', $favIds);
        })->latest()->paginate(4, ['*'], 'favs_page');


        if (isset($_GET['fav']) && $request->ajax()) {
            $html = '';

            foreach ($favorite_pictures as $picture) {

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
                                        <h6 class="mb-0 fw-semibold">
                                            <a href="' . route('author.index', $picture->user->slug) . '"
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
                    
                </div>';
            }
            return $html;
        }


        if ($request->ajax()) {
            $html = '';

            foreach ($uploaded_pictures as $picture) {

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
                                        <h6 class="mb-0 fw-semibold">
                                            <a href="' . route('author.index', $picture->user->slug) . '"
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
                    
                </div>';
            }
            return $html;
        }

        $upload_count = $uploaded_pictures->total();
        $favs_count = $favorite_pictures->total();
        return view('author', compact('author', 'upload_count', 'favs_count'));
    }
}
