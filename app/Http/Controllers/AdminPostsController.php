<?php

namespace App\Http\Controllers;

use Auth;
use App\Post;
use App\Instagram\Instagram;
use Illuminate\Http\Request;

class AdminPostsController extends Controller
{
    
    public function index()
    {
    	$user = Auth::user();
    	$posts = Post::withPending()->where('user_id', $user->id)->orderBy('id', 'DESC')->get();
    	return view('admin.posts.index', compact('posts'));
    }

    public function edit($id)
    {
    	$post = Post::withPending()->findOrFail($id);
        return view('admin.posts.edit', compact('post'));
    }

    public function reload()
    {
    	$user = Auth::user()->instagram;
    	$instagram = new Instagram($user);
    	if ( ! $instagram->isValid() ) {
    		throw new \Exception("Instagram username is not valid");
    	}

    	$data = json_decode($instagram->getMedia());

    	if ( empty($data) ) {
    		return back();
    	}

    	$posts = [];
		foreach ($data->items as $item) {
		    $post['instagram_id'] = $item->id;
		    $post['thumb'] = $item->images->thumbnail->url;
		    $post['picture'] = $item->images->standard_resolution->url;
		    $post['caption'] = $item->caption->text;
		    $post['user_id'] = Auth::user()->id;
		    $posts[] = $post;
		}

		sort($posts);

		Post::insert($posts);
        return back();
    }

    public function approve($id)
    {
        $post = Post::withPending()->findOrFail($id);
        $post->approve($post->id);
        return back();
    }

    public function reject($id)
    {
        $post = Post::findOrFail($id);
        $post->markPending($post->id);
        return back();
    }
}
