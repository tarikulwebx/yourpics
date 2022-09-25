<?php

namespace App\Http\Controllers;

use App\Models\Picture;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FavoriteController extends Controller
{
    /**
     * Add to Favorite Image
     */
    public function addToFavorite(Request $request)
    {
        $picture = Picture::findOrFail($request->id);

        if (Auth::guest()) {
            return response()->json(['message' => 'Login required to access favorites'], 201,);
        } else {
            $user = Auth::user();

            if ($picture->favorites()->where('user_id', '=', $user['id'])->count() > 0) {
                $picture->favorites()->where('user_id', '=', $user['id'])->delete();
                return response()->json(['message' => 'Removed from favorite list'], 201,);
            }

            $picture->favorites()->updateOrCreate(['user_id' => $user['id']]);
            return response()->json(['message' => 'Added to favorite list'], 200,);
        }
    }
}
