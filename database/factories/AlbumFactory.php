<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Artist;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Album>
 */
class AlbumFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'artist_id' => Artist::factory(),
            'title' => $this->faker->sentence(3),
            'genre' => $this->faker->randomElement(['Rock', 'Pop', 'Jazz', 'Hip-Hop']),
            'release_date' => $this->faker->date(),
        ];
    }
}
