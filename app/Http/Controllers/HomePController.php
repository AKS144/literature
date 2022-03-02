<?php

namespace App\Http\Controllers;

use App\Profile;
use Illuminate\Http\Request;

class HomePController extends Controller
{
    public function index()
    {
        // $searchLocations = Location::pluck('name', 'id');
        // $searchCategories = Category::pluck('name', 'id');
        // $searchByCategory = Category::withCount('jobs')
        //     ->orderBy('jobs_count', 'desc')
        //     ->take(5)
        //     ->pluck('name', 'id');
        $profiles = Profile::orderBy('id', 'desc')          
                            ->take(7)
                            ->get();

        return view('artistsearch', compact(['profiles']));
    }

    public function search(Request $request)
    {
        $profiles = Profile::searchResults()->paginate(7);  
        return view('profiles.index', compact(['profiles']));
    }
}
