<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Post;

class UserController extends Controller
{
	// Display all users
    public function index()
    {
        $users = User::with('posts')->get();  // Eager load posts
        return view('users.index', compact('users'));  // Pass users to the view
    }

    // Display a user and their profile
    public function show($id)
    {
        $user = User::with('profile')->findOrFail($id);
        return view('users.show', ['user' => $user]);

    }
}

