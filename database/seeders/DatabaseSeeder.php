<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Picture;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            UserTableSeeder::class,
            TagTableSeeder::class,
            PictureTableSeeder::class,
        ]);


        // Attach Picture and Tag relationships
        $tags     = Tag::all();
        $pictures = Picture::all();

        $pictures->each(function ($picture) use ($tags) {
            $picture->tags()->attach(
                $tags->random(rand(1, 15))->pluck('id')->toArray()
            );
        });
    }
}
