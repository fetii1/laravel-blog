<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    // Display all posts for a specific tag
    public function show(Tag $tag)
    {
        return view('tags.show', compact('tag'));
    }
}


