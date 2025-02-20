<?php

namespace App\Http\Controllers;

use App\Models\Tag;

class TagController extends Controller
{
    // Display all posts for a specific tag
    public function show($id)
    {
        $tag = Tag::with('posts')->findOrFail($id);

        return view('tags.show', ['tag' => $tag, 'posts' => $tag->posts]);
    }
}


