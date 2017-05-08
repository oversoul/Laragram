<?php

namespace App\Http\Controllers;

use Auth;
use App\Instagram\Instagram;
use Illuminate\Http\Request;

class AdminSettingsController extends Controller
{


    public function index()
    {
    	$instagram = Auth::user()->instagram;
    	return view('admin.settings.index', compact('instagram'));
    }

    public function save(Request $request)
    {
    	$this->validate($request, ['instagram' => 'required']);

        $instagram = new Instagram($request->instagram);

        if ( ! $instagram->isValid() ) {
            return back()->withErrors(['instagram' => 'Username is not valid']);
        }

    	$user = Auth::user();
    	$user->instagram = $request->instagram;
    	$user->save();
    	return back();
    }
}
