<?php

namespace App\Http\Controllers;

use App\Photo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PhotosController extends Controller
{
    public function create($album_id){
    	return view('photos.create')->with('album_id', $album_id); 
    }

    public function store(Request $request){
    	/*$this->validate($request, [
    		'title' => 'required',
    		'photo' => 'image:max:2999',
    	]);

    	$fullFilename = $request->file('photo')->getClientOriginalName();
    	$filename = pathinfo($fullFilename, PATHINFO_FILENAME);
    	$extension = $request->file('photo')->getClientOriginalExtension();
    	$filenameToStore = $filename . "_" . time() . "." . $extension;
    	$path = $request->file('photo')->storeAs('public/photos/'.$request->input('album_id'), $filenameToStore);

	
    	$photo = new Photo;
    	$photo->album_id = $request->input('album_id');
    	$photo->title = $request->input('title');
    	$photo->description = $request->input('description');
    	$photo->photo = $filenameToStore;
		$photo->size  =  File::size($filenameToStore);
    	//$photo->size = $request->file('photo')->getClientSize();
		/*if($request->hasfile('photo'))
		{
		    $image_file = $request->file('photo');
			$image_filename = $image_file->getClientOriginalName();
			$image_resize = Image::make($image_file->getRealPath());
			$image_resize->resize(400, 300);
			//$image_path = 'profile_img/';
			$image_resize->save('public/profile_img/'.$image_filename);
			$photo->photo = $image_filename;
		}

		/*	$image_file     = $request->file('profile_img');
			$image_filename = $image_file->getClientOriginalName();
			$image_resize   = Image::make($image_file->getRealPath());
			$image_resize->resize(400, 300);
			$image_resize   = 'profile_img/'.$image_filename;
			Storage::disk('s3')->put($image_resize, file_get_contents($image_file));
			$profile->profile_img = $image_filename;
		}
    	$photo->save();	

    	return redirect('/albums/'.$request->input('album_id'))->with('success', 'Photo Added!');*/

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
    	return view('photos.show')->with('photo', $photo);

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
