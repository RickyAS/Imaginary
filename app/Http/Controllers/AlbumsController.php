<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Album;
use Auth;
class AlbumsController extends Controller
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
        $albums = Album::with('Photos')->where('user_id', Auth::id())->get();
        return view('albums.index')->with('albums', $albums);
        /*
        $data = array(
            'pageid' => 'albums',
            'albums' => Album::where('user_id', Auth::id())->paginate(5));
        
        //$post = Post::all();
        return view('albums.index')->with($data); */            
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
        $album = new Album; // Membuat object dari Model Album
        $album->name = $request->input('name');
        $album->description = $request->input('description');
        $album->cover_image =$namafileSimpan;
        $album->user_id =auth()->user()->id;
        $album->save();

        return redirect('/albums')->with('success', 'Album Created');  

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $album =Album::with('Photos')->find($id);
        return view('albums.show')->with('album', $album);
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
            'albums' => Album::find($id)
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

        return redirect('/albums')->with('success', 'Album Updated');  
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $album = Album::find($id);
        if(Storage::delete('public/albums_image/'.$album->cover_image)){
            $album->delete();
            return redirect('/albums')->with('error', 'Album Deleted');
        }

    }
}
