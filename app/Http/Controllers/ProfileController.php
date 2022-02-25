<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Profile;

class ProfileController extends Controller
{
    public function index()
    {
        $jobs = Profile::with('name')
            ->paginate(7);

        $banner = 'Jobs';
        return view('jobs.index', compact(['jobs', 'banner']));
    }

    public function show(Profile $job)
    {
        $job->load('company');
        return view('jobs.show', compact('job'));
    }
}
