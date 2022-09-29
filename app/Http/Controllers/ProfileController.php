<?php

namespace App\Http\Controllers;

use App\Models\Picture;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use PhpParser\JsonDecoder;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $user = Auth::user();
        $uploaded_pictures = $user->pictures()->latest()->paginate(12, ['*'], 'uploads_page');

        $favIds = $user->favorites()->pluck('picture_id')->all();
        $favorite_pictures = Picture::where(function ($query) use ($favIds) {
            $query->whereIn('id', $favIds);
        })->latest()->paginate(20, ['*'], 'favs_page');


        // Favorite content return
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

                $html .= '<div class="col-sm-6 col-lg-4 grid-item">
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
                                        <small class="d-block text-light fw-normal"><i class="fa-solid fa-award"></i>
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


        // Uploads return
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

                $html .= '<div class="col-sm-6 col-lg-4 grid-item">
                    <div class="img-card">
                        <a href="#" class="image-wrapper-link d-block showUploadsModal"
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
                                <div>
                                    <a href="' . route('profile.uploads.edit', [$user->slug, $picture->slug]) . '" class="btn btn-sm text-light rounded-5 gallery-image-edit-btn"><i
                                            class="fa-solid fa-pen"></i></a>
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

        return view('profile.index', compact('user', 'upload_count', 'favs_count'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $user = Auth::user();
        return view('profile.index', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        $user = Auth::user();
        return view('profile.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $slug)
    {

        $user = $request->user();

        $request->validate([
            'picture' => ['nullable', 'image', 'mimes:png,jpg'],
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'bio' => ['nullable', 'string', 'max:255'],

            'password' => ['required_with:password_confirmation', 'confirmed'],
            'current_password' => ['required_with:password', function ($attribute, $value, $fail) use ($request) {
                $user = $request->user();
                if (!empty($request->password) && !Hash::check($value, $user->password)) {
                    return $fail('Current password does not match');
                }
            }],
        ]);

        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->bio = $request->bio;
        $user->bio = $request->bio;
        if (!empty($request->password)) {
            $user->password = Hash::make($request->password);
        }

        if ($request->hasFile('picture')) {
            $picture = $request->picture;

            $picture_name_with_extension = $picture->getClientOriginalName();
            $original_name = pathinfo($picture_name_with_extension, PATHINFO_FILENAME);
            $extension = pathinfo($picture_name_with_extension, PATHINFO_EXTENSION);

            $name  = time() . '_' . Str::lower(str_replace(' ', '-', $original_name)) . '.' . $extension;


            if (Storage::exists($user->picture)) {
                Storage::delete($user->picture);
            }

            $user->picture = $name;
            Storage::putFileAs('', $picture, $name);
        }

        $user->save();

        return redirect()->back()->with('success', 'Profile updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


    /**
     * Get Picture by Id
     */
    public function getPictureById($id)
    {
        $picture = Picture::findOrFail($id);
        $picture->user;
        $picture->tags;
        $picture['user_rank'] = $picture->user->rank;
        $picture['favorites_count'] = $picture->favorites()->count();

        $data = [
            'picture' => $picture,
        ];
        return response()->json($data);
    }
}
