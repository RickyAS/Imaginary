<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;
use App\Photo;
use Auth;
use Image;
use DB;
use App\Quotation;
use Illuminate\Http\Request;

class PhotosController extends Controller
{
   /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
 
  /**
      * Display a listing of the resource.
      *
      * @return \Illuminate\Http\Response
      */
     public function index()
     {
         
         $data = array(
             'pageid' => 'albums',
             'albums' => Album::where('user_id', Auth::id())->paginate(5));
         
         //$post = Post::all();
         return view('albums.index')->with($data);            
     }
 
     /**
      * Show the form for creating a new resource.
      *
      * @return \Illuminate\Http\Response
      */
     public function create($album_id)
     {

        return view('photos.create')->with('album_id', $album_id);
       /*  $data = array(
             'pageid' => 'albums'->paginate(5));
 
         return view('albums.create')->with($data); */
     }
 
     /**
      * Store a newly created resource in storage.
      *
      * @param  \Illuminate\Http\Request  $request
      * @return \Illuminate\Http\Response
      */
     public function store(Request $request)
     {
         $this->validate($request, [
             'title' => 'required',
             'photo'=>'image|nullable|max:5000'
         ]);
         
         if($request->hasFile('photo')){
             $filenameExtension = $request->file('photo')->getClientOriginalName();
             $filename =pathinfo($filenameExtension, PATHINFO_FILENAME);
             $fileExt= $request->file('photo')->getClientOriginalExtension();
             $namafileSimpan = $filename.'_'.time().'.'.$fileExt;
             $path = $request->file('photo')->storeAs('public/photos/'.$request->input('album_id'), $namafileSimpan);
             $request->file('photo')->storeAs('public/watermarked/'.$request->input('album_id'), $namafileSimpan);
             $thumbnailpath = public_path('storage/watermarked/'.$request->input('album_id').'/'.$namafileSimpan);
             $img = Image::make($thumbnailpath)->insert('assets/img/brand/imagi.png', 'center')->save($thumbnailpath);
           
     
         }else{
             $namafileSimpan='no-image.jpg';
         }
         $photo = new Photo; // Membuat object dari Model Album
         $photo->album_id = $request->input('album_id');
         $photo->title = $request->input('title');
         $photo->size = $request->file('photo')->getClientSize();
         $photo->photo =$namafileSimpan;
         $photo->save();
 
         return redirect('/albums/'.$request->input('album_id'))->with('success', 'Photo Uploaded');  
 
     }
 
     /**
      * Display the specified resource.
      *
      * @param  int  $id
      * @return \Illuminate\Http\Response
      */
     public function show($id)
     {
        $photo = Photo::find($id);
        return view('photos.show')->with('photo',$photo);
     }
 
     /**
      * Show the form for editing the specified resource.
      *
      * @param  int  $id
      * @return \Illuminate\Http\Response
      */
     public function edit($id)
     {
         $data = array(
             'pageid' => 'update',
             'album' => Album::find($id)
         );
         
        return view('albums.update')->with($data);
     }
 
     /**
      * Update the specified resource in storage.
      *
      * @param  \Illuminate\Http\Request  $request
      * @param  int  $id
      * @return \Illuminate\Http\Response
      */
     public function update(Request $request, $id)
     {
         $this->validate($request, [
             'name' => 'required',
             'description' => 'required',
             'cover_image'=>'image|nullable|max:5000'
         ]);
         if($request->hasFile('cover_image')){
             $filenameExtension = $request->file('cover_image')->getClientOriginalName();
             $filename =pathinfo($filenameExtension, PATHINFO_FILENAME);
             $fileExt= $request->file('cover_image')->getClientOriginalExtension();
             $namafileSimpan = $filename.'_'.time().'.'.$fileExt;
             $path = $request->file('cover_image')->storeAs('public/albums_image', $namafileSimpan);
    
 
         }else{
             $namafileSimpan='no-image.jpg';
         }
 
         $album =Album::find($id);
         $album->name = $request->input('name');
         $album->description = $request->input('description');
         $album->cover_image =$namafileSimpan;
         $album->save();
 
         return redirect('/albums')->with('success', 'Guest data has been updated');  
     }
 
     /**
      * Remove the specified resource from storage.
      *
      * @param  int  $id
      * @return \Illuminate\Http\Response
      */
     public function destroy($id)
     {
        $photo = Photo::find($id);
        $lol = DB::table('albums')->where('id', $photo->album_id)->value('id');
        if(Storage::delete('public/photos/'.$photo->album_id.'/'.$photo->photo)){
            $photo->delete();
            return redirect('/albums/'.$lol)->with('error', 'Photo Deleted');
        }
     }
 }
 
