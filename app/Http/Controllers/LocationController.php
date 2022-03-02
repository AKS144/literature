<?php

namespace App\Http\Controllers;

use App\Job;
use App\Profile;
use App\Location;

class LocationController extends Controller
{
    public function show(Location $location)
    {
        $jobs = Job::with('company')
            ->whereHas('location', function($query) use($location) {
                $query->whereId($location->id);
            })
            ->paginate(7);

        $banner = 'Location: '.$location->name;
    
        return view('jobs.index', compact(['jobs', 'banner']));
    }


    public function showprof(Location $location)
    {
        $jobs = Profile::with('company')
            ->whereHas('location', function($query) use($location) {
                $query->whereId($location->id);
            })
            ->paginate(7);
    
        return view('jobs.index', compact(['jobs']));
    }
}
