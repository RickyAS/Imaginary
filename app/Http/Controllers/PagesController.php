<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;
use App\Album;
use App\Photo;
use App\User;
use DB;
use App\Quotation;
use Image;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index(){
        $albums = Album::with('Photos')->get();
        return view('welcome')->with('albums', $albums);
    }

    public function show($id)
    {  
        $lol = DB::table('albums')->where('id', $id)->value('user_id');
        $go = User::find($lol);
        $album =Album::with('Photos')->find($id);
        return view('photopage')->with('album', $album)->with('go', $go);
    }

    public function downloadImage($imageId){
        $book_cover = Photo::where('id', $imageId)->firstOrFail();
        $path = public_path(). '/storage/watermarked/'. $book_cover->album_id.'/'. $book_cover->photo;
        return response()->download($path, $book_cover
                 ->original_filename, ['Content-Type' => $book_cover->mime]);
     }

     public function userindex($name){
        $lol = DB::table('users')->where('name', $name)->value('id');
        $albums = Album::with('Photos')->where('user_id', $lol)->get();
        $go = User::find($lol);
        return view('welcome')->with('albums', $albums)->with('go', $go);;
    }
}


