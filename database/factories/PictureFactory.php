<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Picture>
 */
class PictureFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'user_id'   => rand(1, 3),
            'title'     => fake()->text(20),
            'slug'      => fake()->slug(3, true),
            'picture'   => 'image (' . rand(1, 30) . ').jpg',
            'dimension' => rand(300, 1000) . 'x' . rand(300, 1000),
            'size' => rand(1, 6),
            'description' => fake()->realText(200, 1),
            'is_published' => true,
        ];
    }
}
