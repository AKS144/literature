<?php

namespace App\Http\Controllers;

use App\Role;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ClientController extends Controller
{

    public function index()
    {
        
    }


    public function create()
    {
        $roles = Role::all()->pluck('title', 'id');
        return view('client.create', compact('roles'));
    }


    public function store(Request $request)
    {
        $client            =   new User();
        $client->name      =   $request->name;
        $client->email     =   $request->email;
        //$client->password  =   $request->password;
        $client->password  =   Hash::make($request->password);
        $client->save();
        $client = Role::select('id')->where('title', 'client')->first();
        $client->roles()->attach($client);
    }


    public function show($id)
    {
        
    }


    public function edit($id)
    {
        
    }


    public function update(Request $request, $id)
    {
        $client            =   User::find($id);
        $client->name      =   $request->name;
        $client->email     =   $request->email;
        //$client->password  =   $request->password;
        $client->password  =   Hash::make($request->password);
        $client->save();
        //$client = Role::select('id')->where('title', 'client')->first();
        //$client->roles()->attach($client);
    }


    public function destroy($id)
    {
        
    }
}
