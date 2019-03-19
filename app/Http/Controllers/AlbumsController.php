<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Album;

class AlbumsController extends Controller
{
    public function index(){
        $albums = Album::with('Photos')->get();
        return view('albums.index')->with('albums',$albums);
    }
    public function create($user_id){
        return view('albums.create')->with('user_id', $user_id);
    }
    public function store(Request $request){
        $this->validate($request,[
            'name' => 'required',
            'cover_image' => 'image'
        ]);
        $filenameWithExt = $request->file('cover_image')->getClientOriginalName();
        $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
        $extention = $request->file('cover_image')->getClientOriginalExtension();
        $filenameToStore = $filename.'_'.time().'.'.$extention;
        //upload image
        $path = $request->file('cover_image')->storeAs('public/album_covers'.$request->input('user_id'), $filenameToStore);
 
        //create album
        $album = new Album;
        $album-> name = $request->input('name');
        $album-> description = $request->input('description');
        $album-> cover_image = $filenameToStore;
        $album-> user_id = $request->input('user_id');
        $album->save();
        
        return redirect('/albums/'.$request->input('user_id'))->with('success', 'Album created');
    }
        
        public function show($id){
            $album = Album::with('Photos')->find($id);
            return view('albums.show')->with('album', $album);
        }
    
    
}
