<?php

use Illuminate\Database\Seeder;
use App\Models\Image;
use App\Models\Post;

class ImageSeeder extends Seeder
{
    public function run()
    {
        // Assume each post needs at least one image
        Post::all()->each(function ($post)
		{
            Image::factory()->create(
					[
						'imageable_id' => $post->id,
		                'imageable_type' => get_class($post),
					]
				);
        });
    }
}


