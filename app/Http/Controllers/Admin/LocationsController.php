<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyLocationRequest;
use App\Http\Requests\StoreLocationRequest;
use App\Http\Requests\UpdateLocationRequest;
use App\Location;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class LocationsController extends Controller
{
    public function index()
    {       
        $locations = Location::all();
        return view('admin.locations.index', compact('locations'));
    }

    public function create()
    {      
        return view('admin.locations.create');
    }

    public function store(StoreLocationRequest $request)
    {      
        $location = new Location();
        $location->name =  $request->name;
        $location->save();
        return redirect()->route('admin.locations.index');
    }

    public function edit(Location $location)
    {       
        return view('admin.locations.edit', compact('location'));
    }

    public function update(Request $request,$id)
    {        
        $location = Location::find($id);
        $location->name = $request->name;
        $location->save();
        return redirect()->route('admin.locations.index');
    }

    public function show(Location $location)
    {        
        return view('admin.locations.show', compact('location'));
    }

    public function destroy($id)
    {        
        $location = new Location($id);       
        $location->delete();
        return back();
    }

    // public function massDestroy(MassDestroyLocationRequest $request)
    // {
    //     Location::whereIn('id', request('ids'))->delete();

    //     return response(null, Response::HTTP_NO_CONTENT);
    // }
}
