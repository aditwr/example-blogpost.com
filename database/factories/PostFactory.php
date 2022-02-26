<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'title' => $this->faker->sentence(mt_rand(2, 5)),
            'slug' => $this->faker->unique()->slug(mt_rand(3, 5)),
            'excerpt' => $this->faker->paragraph(2),
            'body' => collect($this->faker->paragraphs(mt_rand(10, 20)))
                ->map(function ($item) {
                    return "<p>$item</p>";
                })->implode(''),
        ];
    }
}
