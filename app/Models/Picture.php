<?php

namespace App\Models;

use Carbon\Carbon;
use Cviebrock\EloquentSluggable\Sluggable;
use Cviebrock\EloquentSluggable\SluggableScopeHelpers;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Picture extends Model
{
    use HasFactory, Sluggable, SluggableScopeHelpers;


    protected $fillable = [
        'title',
        'slug',
        'picture',
        'dimension',
        'size',
        'description',
        'views',
        'downloads',
        'is_published',
    ];


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function favorites()
    {
        return $this->hasMany(Favorite::class, 'picture_id', 'id');
    }


    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    public function getPictureUrlAttribute()
    {
        return $this->picture ? url('/') . '/storage/' . $this->picture : '';
    }

    public function getCreatedAtAttribute($value)
    {
        return Carbon::parse($value)->diffForHumans();
    }

    // Related Picture by Tags
    public function relatedPostsByTag()
    {
        return Picture::with('user')->whereHas('tags', function ($query) {
            $tagIds = $this->tags()->pluck('tags.id')->all();
            $query->whereIn('tags.id', $tagIds);
        })->where('id', '<>', $this->id)->take(4)->get();
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
                'source' => 'title'
            ]
        ];
    }
}
