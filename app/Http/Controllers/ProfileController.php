<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Image;
use App\User;
use DB;
use App\Quotation;

class ProfileController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $lol = DB::table('users')->where('id', Auth::id())->value('id');
        $users = User::find($lol);
        $albums = DB::table('albums')->where('user_id', Auth::id())->count();
        $photos = DB::table('albums')->join('photos', 'albums.id', '=', 'photos.album_id')
        ->join('users', 'albums.user_id', '=', 'users.id')->where('albums.user_id', Auth::id())->count('photos.id');
        return view('auth.profile')->with('users', $users)->with('albums', $albums)->with('photos', $photos);
    }

    public function edit(User $user)
    { 
        
    }

    public function update(Request $request, $id)
    { 
        $this->validate($request, [
            'name' => 'required',
            'photo'=>'image|nullable|max:5000'
        ]);

        if($request->hasFile('photo')){
            $filenameExtension = $request->file('photo')->getClientOriginalName();
            $filename =pathinfo($filenameExtension, PATHINFO_FILENAME);
            $fileExt= $request->file('photo')->getClientOriginalExtension();
            $namafileSimpan = $filename.'_'.time().'.'.$fileExt;
            $path = $request->file('photo')->storeAs('public/profile/', $namafileSimpan);
            $thumbnailpath = public_path('storage/profile/'.$namafileSimpan);
            $img = Image::make($thumbnailpath)->crop(1000, 1000)->save($thumbnailpath);
            
        }else{
            $namafileSimpan='no-profile.jpg';
        }

        $user = User::findOrFail($id);
        $user->profile_image = $namafileSimpan;
        $user->name = request('name');
        $user->email = request('email');
        $user->password = bcrypt(request('password'));

        $user->save();

        return back()->with('success', 'Profile Uploaded');
    }
}