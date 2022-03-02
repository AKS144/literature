<?php

namespace App\Http\Controllers;

use App\Job;
use App\Profile;
use App\Category;

class CategoryController extends Controller
{
    public function show(Category $category)
    {
        $jobs = Job::with('company')
            ->whereHas('categories', function($query) use($category) {
                $query->whereId($category->id);
            })
            ->paginate(7);

        $banner = 'Category: '.$category->name;
    
        return view('jobs.index', compact(['jobs', 'banner']));
    }

    public function showprof(Category $category)
    {
        $jobs = Profile::with('name')
            ->whereHas('categories', function($query) use($category) {
                $query->whereId($category->id);
            })
            ->paginate(7);
      
    
        return view('jobs.index', compact(['jobs']));
    }
}
