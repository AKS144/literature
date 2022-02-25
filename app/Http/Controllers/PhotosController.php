<?php

namespace App\Http\Controllers;



use App\Models\Photo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PhotosController extends Controller
{
    public function create($album_id){
    	return view('artist.photos.create')->with('album_id', $album_id); 
    }

    public function store(Request $request)
	{    	
		$this->validate($request,[
            'photo'=>'image|max:3999',
            'title'=>'required'
        ]);

        
        $filenamewithext=$request->file('photo')->getClientOriginalName();       
        $filename=pathinfo($filenamewithext,PATHINFO_FILENAME);      
        $ext=$request->file('photo')->getClientOriginalExtension();      
        $filenametostore=$filename.'-'.time().'.'.$ext;     
        $path=$request->file('photo')->storeAs('public/photos/'.$request->input('album_id'),$filenametostore);

     
        $photo=new Photo;       
        $photo->title=$request->input('title');
        $photo->description=$request->input('description');
        //$photo->size=$request->file('photo')->getClientSize();
        $photo->album_id=$request->input('album_id');
        $photo->photo=$filenametostore;        
        $photo->save();      
        return redirect('/albums/'.$request->input('album_id'))
            ->with('success','photo Saved ');
    }

    public function show($id){
    	$photo = Photo::find($id);
    	return view('artist.photos.show')->with('photo', $photo);

    }

    public function destroy($id){
    	$photo = Photo::find($id);
    	$album_id = $photo->album_id;
    	if(Storage::delete('public/photos/'.$photo->album_id.'/'.$photo->photo)){
    		$photo->delete();
    	}

    	return redirect('/albums/'.$album_id)->with('success', 'Photo Deleted!');
    }
}
