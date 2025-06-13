<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Artist;
use App\Models\Album;
use App\Models\Review;
use App\Models\Rating;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()
            ->count(5)
            ->has(
                Artist::factory()
                    ->hasAlbums(3)
            )
            ->create();

        User::factory()
            ->count(10)
            ->create()
            ->each(function ($user) {
                $albums = Album::inRandomOrder()->take(3)->get();
                foreach ($albums as $album) {
                    Review::factory()->create([
                        'user_id' => $user->id,
                        'album_id' => $album->id,
                    ]);
                    Rating::factory()->create([
                        'user_id' => $user->id,
                        'album_id' => $album->id,
                    ]);
                }
            });
    }
}
