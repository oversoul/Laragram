<?php

namespace App\Http\Controllers;

use Auth;
use App\Post;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    

    public function index()
    {
    	$id = Auth::user()->id;
    	$posts = Post::withAnyStatus()->where('user_id', $id)->count();
    	$approved = Post::approved()->where('user_id', $id)->count();;
    	$postponed = Post::pending()->where('user_id', $id)->count();;
    	return view('admin.dashboard', compact('posts', 'approved', 'postponed'));
    }
}
