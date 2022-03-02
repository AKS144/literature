<?php

namespace App\Http\Controllers\Admin;

use App\Job;
use App\Role;
use App\Category;
use App\Location;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class JobsController extends Controller
{
    public function index()
    {
        $jobs = Job::all();
        return view('admin.jobs.index', compact('jobs'));
    }

    public function create()
    {
        $locations = Location::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');
        $categories = Category::all()->pluck('name', 'id');
        return view('admin.jobs.create', compact('locations', 'categories'));
    }

    public function store(Request $request)
    {
        $this->validate($request,[           
            'name'          =>  'required|regex:/^[a-zA-ZÑñ\s]+$/|max:120',           
            'start_date'    =>  'required|date',
            'end_date'      =>  'required|date|after:start_date', 
            'job_link'      =>  'max:255',
            'company'       =>  'required|regex:/^[a-zA-ZÑñ\s]+$/|max:120',    
            'address'       =>  'required|max:255',    
            'requirements'  =>  'max:255',
            'description'   =>  'max:255',  
            'salary'        =>  'max:255', 
            'start_date'    =>  'required|date',
            'end_date'      =>  'required|date|after:start_date',          
        ]);

       

        $job                =   new Job();
        $job->name          =   $request->name;
        $job->company       =   $request->company;        
        $job->location_id   =   $request->location_id; 
        $job->start_date    =   $request->start_date;
        $job->end_date      =   $request->end_date;        
        $job->job_link      =   $request->job_link;
        $job->address       =   $request->address;
        $job->description   =   $request->description;
        $job->requirements  =   $request->requirements;
        $job->salary        =   $request->salary;
        $job->save();

        $job->categories()->sync($request->input('categories', []));
       
        return redirect()->route('admin.jobs.index');
    }

    public function edit(Job $job)
    {  
        $locations = Location::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');
        $categories = Category::all()->pluck('name', 'id');
        $job->load('company', 'location', 'categories');
        return view('admin.jobs.edit', compact('locations', 'categories', 'job'));
    }

    public function update(Request $request, $id)
    {
        //$job->update($request->all());
        //$job->categories()->sync($request->input('categories', []));
        $this->validate($request,[           
            'name'          =>  'required|regex:/^[a-zA-ZÑñ\s]+$/|max:120',           
            'start_date'    =>  'required|date',
            'end_date'      =>  'required|date|after:start_date', 
            'job_link'      =>  'max:255',
            'company'       =>  'required|regex:/^[a-zA-ZÑñ\s]+$/|max:120',    
            'address'       =>  'required|max:255',    
            'requirements'  =>  'max:255',
            'description'   =>  'max:255',  
            'salary'        =>  'max:255', 
            'start_date'    =>  'date',
            'end_date'      =>  'date|after:start_date',          
        ]);

        $job                =   Job::find($id);
        $job->name          =   $request->name;
        $job->company       =   $request->company;  
        $job->categories    =   $request->categories; 
        $job->location_id   =   $request->location_id    ; 
        $job->start_date    =   $request->start_date;
        $job->end_date      =   $request->end_date;        
        $job->job_link      =   $request->job_link;
        $job->address       =   $request->address;
        $job->description   =   $request->description;
        $job->requirements  =   $request->requirements;
        $job->salary        =   $request->salary;
        $job->save();
        return redirect()->route('admin.jobs.index');
    }

    public function show(Job $job)
    {
        $job->load('location', 'categories');
        return view('admin.jobs.show', compact('job'));
    }

    public function destroy($id)
    {       
        $job = Job::find($id);
        $job->delete();
        return redirect()->back();
    }
}
