<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Cviebrock\EloquentSluggable\Sluggable;
use Cviebrock\EloquentSluggable\SluggableScopeHelpers;
use Illuminate\Database\Eloquent\Casts\Attribute;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, Sluggable, SluggableScopeHelpers;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'password',
        'bio',
        'picture',
        'is_active',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    /**
     * Full Name
     */
    public function getFullNameAttribute()
    {
        return $this->first_name . ' ' . $this->last_name;
    }

    /**
     * Picture
     */
    public function getPictureUrlAttribute()
    {
        return $this->picture ? url('/') . '/storage/' . $this->picture : url('/') . '/assets/images/profile-placeholder.jpg';
    }

    /**
     * Rank
     */
    public function getRankAttribute()
    {
        $popular_uploaders = Picture::orderBy('views', 'desc')->pluck('id')->take(10);
        $top_uploaders = User::withCount('pictures')->get()->sortByDesc('pictures_count')->pluck('id')->take(10);
        $new_uploaders = User::withCount('pictures')->get()->sortBy('pictures_count')->pluck('id')->take(10);
        if ($popular_uploaders->contains($this->id)) {
            return 'Popular';
        } else if ($top_uploaders->contains($this->id)) {
            return 'Top';
        } else if ($new_uploaders->contains($this->id)) {
            return 'New';
        } else {
            return 'Uploader';
        }
    }


    public function pictures()
    {
        return $this->hasMany(Picture::class);
    }


    public function favorites()
    {
        return $this->hasMany(Favorite::class, 'user_id', 'id');
    }


    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => ['first_name', 'last_name']
            ]
        ];
    }
}
