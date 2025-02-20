<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Post;
use App\Models\Tag;


class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $posts = Post::factory()->count(1000)->create();

        $tags = Tag::all();


        $posts->each(function ($post) use ($tags) {
            $randomTags = $tags->random(rand(1, 3));
            $post->tags()->attach($randomTags->pluck('id'));
        });
    }
}
