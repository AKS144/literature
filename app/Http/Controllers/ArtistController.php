<?php

namespace App\Http\Controllers;

use App\Role;
use App\User;
use App\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ArtistController extends Controller
{

    public function index()
    {
        //
    }


    public function create()
    {
        return view('artistuser.create');
    }


    public function store(Request $request)
    {
        $user            =   new User();
        $user->name      =   $request->name;
        $user->email     =   $request->email;       
        $user->password  =   Hash::make($request->password);
        $user->save();

        $user = Role::select('id')->where('title', 'user')->first();
        $user->roles()->attach($user);

        $profile           =   new Profile();
        $profile->name     =   $user->name;
        $profile->email    =   $user->email;
        $profile->password =   $user->passsword;
        $profile->user_id  =   $user->id;
        $profile->save();
    }


    public function show($id)
    {
        
    }


    public function edit($id)
    {
        return view('artistuser.edit');
    }


    public function update(Request $request, $id)
    {
      /*  $client            =   User::find($id);
        $client->name      =   $request->name;
        $client->email     =   $request->email;       
        $client->password  =   Hash::make($request->password);
        $client->save();

        $client = Role::select('id')->where('title', 'user')->first();
        $client->roles()->attach($client);*/
        
        
    }


    public function destroy($id)
    {
        
    }
}
