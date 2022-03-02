<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Profile;

class ProfileController extends Controller
{
    public function index()
    {
        $profiles = Profile::with('name')
            ->paginate(7);

        //$banner = 'Jobs';
        return view('profiles.index', compact(['profiles']));
    }

    public function show(Profile $profiles)
    {      
        return view('profiles.show', compact('profiles'));
    }
}
