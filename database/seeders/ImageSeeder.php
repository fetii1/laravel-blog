<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Post;
use App\Models\Image;


class ImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run() : void
    {
        $posts = Post::all();

        $posts->each(function ($post) {
            Image::factory()->count(rand(1, 3))->create([
                'imageable_id' => $post->id,
                'imageable_type' => Post::class,
            ]);
        });
    }

}
