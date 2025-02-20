<?php

namespace App\Http\Controllers;

use App\Models\User;

class UserController extends Controller
{
	// Display all users
 	public function index()
    {
        $users = User::all();
        return view('users.index', ['users' => $users]);
    }

    // Display a user and their profile
    public function show($id)
    {
        $user = User::with('profile')->findOrFail($id);
        return view('users.show', ['user' => $user]);
    }
}

