<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Picture extends Model
{
    use HasFactory, HasSlug;


    protected $fillable = [
        'title',
        'slug',
        'picture',
        'dimension',
        'description',
        'views',
        'downloads',
        'is_published',
    ];


    /**
     * Get the options for generating the slug.
     */
    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom(['first_name', 'last_name'])
            ->saveSlugsTo('slug')
            ->doNotGenerateSlugsOnUpdate();
    }


    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
