<?php

namespace App\Http\Controllers;

use App\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WishlistController extends Controller
{

    // public function __construct() {
    //     $this->middleware(['auth']);
    // }

   
    public function index()
    {
        $user = Auth::user();
        $wishlists = Wishlist::where("user_id", "=", $user->id)->orderby('id', 'desc')->paginate(10);
        return view('wishlist', compact('user', 'wishlists'));
    }

   
    public function create()
    {
        //
    }

    
    public function store(Request $request)
    {
        $this->validate($request, array(
            'user_id'=>'required',
            'profile_id' =>'required',
        ));
               
        $status=Wishlist::where('user_id',Auth::user()->id)
            ->where('profile_id',$request->profile_id)
            ->first();
               
            if(isset($status->user_id) and isset($request->profile_id))
            {
                return redirect()->back()->with('flash_messaged', 'This item is already in your
                    wishlist!');
            }
            else
            {
                $wishlist = new Wishlist;               
                $wishlist->user_id = $request->user_id;
                $wishlist->profile_id = $request->profile_id;
                $wishlist->save();
               
                return redirect()->back()->with('flash_message',
                                    'Item, '. $wishlist->profile->title.' Added to your wishlist.');
            }
    }

    
    public function show(Wishlist $wishlist)
    {
        //
    }

   
    public function edit(Wishlist $wishlist)
    {
        //
    }

   
    public function update(Request $request, Wishlist $wishlist)
    {
        //
    }

   
    public function destroy($id)
    {
        $wishlist = Wishlist::findOrFail($id);
        $wishlist->delete();
  
        return redirect()->route('wishlist.index')
            ->with('flash_message',
             'Item successfully deleted');
    }
}
