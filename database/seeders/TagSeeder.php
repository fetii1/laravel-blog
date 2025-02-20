<?php

use Illuminate\Database\Seeder;
use App\Models\Tag;

class TagSeeder extends Seeder
{
    public function run()
    {
        $tags = ['Laravel', 'PHP', 'JavaScript', 'CSS', 'HTML'];

        foreach ($tags as $tag) {
            Tag::create(['name' => $tag]);
        }
    }
}


