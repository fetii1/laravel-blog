<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    // Display all posts for a specific tag
    public function show(Tag $tag)
    {
        $posts = $tag->posts()->paginate(10); // Show 10 posts per page
        return view('tags.show', compact('tag', 'posts'));
    }
}


