<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;

class PostController extends Controller
{
    // Display all blog posts
    public function index()
    {
        $posts = Post::with('user', 'tags')->latest()->paginate();

        return view('posts.index', ['posts' => $posts]);
    }

    // Show a form for creating a new blog post
    public function create()
    {
        return view('posts.create');
    }

    // Store a newly created blog post
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
            'image' => 'nullable|image|max:2048', // 2MB Max
        ]);

		// we already showed how you can create a user post
        $post = auth()->user()->posts()->create($validatedData);

		// now let's add our image to the post we wrote
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('images', 'public');
            $post->images()->create(['path' => $path]);
        }

        return redirect()->route('posts.show', $post);
    }


    // Display a single blog post
    public function show($id)
    {
        $post = Post::with('user', 'tags', 'images')
							->findOrFail($id);

        return view('posts.show', ['post' => $post]);
    }

    // Show a form for editing the specified blog post
    public function edit($id)
    {
        $post = Post::findOrFail($id);
        $tags = Tag::all();
        return view('posts.edit', ['post' => $post, 'tags' => $tags]);
    }

    // Update the specified blog post
    public function update(Request $request, Post $post)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
            // other validation rules...
        ]);

		$tags = $request->validate([
            'tags' => 'required',
        ]);

        $post->update($validatedData);

		// we modify the tags of the post by using the sync() method
        $post->tags()->sync($tags);

        return redirect()->route('posts.show', $post);
    }

    // Remove the specified blog post
    public function destroy(Post $post)
    {
        $post->delete();

        return redirect()->route('posts.index');
    }
}

