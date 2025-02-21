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
        $allPosts = Post::all();

        return view('posts.index', ['posts' => $posts, 'allPosts' => $allPosts]);
    }

    // Show a form for creating a new blog post
    public function create()
    {
        return view('posts.create');
    }

    // Store a newly created blog post
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        if ($request->hasFile('image')) {
            // Store the image and get the path relative to the storage/app/public directory
            $imagePath = $request->file('image')->store('posts', 'public');
            // Now $imagePath will be something like: "posts/filename.jpg"
            $validated['image'] = $imagePath;
        }

        $post = auth()->user()->posts()->create($validated);

        return redirect()->route('posts.show', $post);
    }


    // Display a single blog post
    public function show($id)
    {
        if (!auth()-user()->can('view posts')) {
            return redirect()->route('posts.index');
        }
        $post = Post::with('user', 'tags', 'images')
							->findOrFail($id);

        return view('posts.show', ['post' => $post]);
    }

    // Show a form for editing the specified blog post
    public function edit($id)
    {
        if(!auth(-user()->hasRole(['admin', 'author']))) {
            return redirect()->route('posts.show', $post);
        }

        $post = Post::findOrFail($id);
        $tags = Tag::all();
        return view('posts.edit', ['post' => $post, 'tags' => $tags]);
    }

    // Update the specified blog post
    public function update(Request $request, Post $post)
    {

        if (!auth()->user()->can('edit posts')) {
            return redirect()->route('posts.show', $post);
        }

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

        if (!auth()->user()->hasRole('admin')) {
            return redirect()->route('posts.show', $post);
        }

        $post->delete();

        return redirect()->route('posts.index');
    }
}

