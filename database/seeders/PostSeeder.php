<?php

use Illuminate\Database\Seeder;
use App\Models\Post;
use App\Models\Tag;

class PostSeeder extends Seeder
{
    public function run()
    {
        // Create 1000 posts
        $posts = Post::factory()->count(1000)->create();

        // Get all tags
        $tags = Tag::all();

        // Attach random tags to each post
        $posts->each(function ($post) use ($tags) {
            $randomTags = $tags->random(rand(1, 3)); // Random number of tags between 1 and 3 per post
            $post->tags()->attach($randomTags->pluck('id'));
        });
    }
}
