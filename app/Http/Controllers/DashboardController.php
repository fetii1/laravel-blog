<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tag;


class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard', ['tags' => Tag::all()]);
    }
}
