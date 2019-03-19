<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Photo;

class PhotosController extends Controller
{
    public function create($album_id){
     return view('photos.create')->with('album_id', $album_id) ; 
    }
    public function store(Request $request){
        $this->validate($request,[
            'name' => 'required',
            'photo' => 'image'
        ]);
        $filenameWithExt = $request->file('photo')->getClientOriginalName();
        $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
        $extention = $request->file('photo')->getClientOriginalExtension();
        $filenameToStore = $filename.'_'.time().'.'.$extention;
        //upload image
        $path = $request->file('photo')->storeAs('public/photos/'.$request->input('album_id'), $filenameToStore);
 
        //upload photo
        $photo = new Photo;
        $photo-> name = $request->input('name');
        $photo-> photo = $filenameToStore;
        $photo-> album_id = $request->input('album_id');
        $photo->save();
        
        return redirect('/albums/'.$request->input('album_id'))->with('success', 'Album created');
    }
}
