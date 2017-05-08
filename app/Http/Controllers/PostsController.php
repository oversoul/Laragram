<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    

    public function show($id)
    {
    	$user = User::with('posts')->findOrFail($id);
    	return view('profile', compact('user'));
    }
}
