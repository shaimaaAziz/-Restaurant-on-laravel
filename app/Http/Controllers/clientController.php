<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Image;
use Illuminate\Http\Request;

class clientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function profile()
    {
        if (Auth::user()->hasAnyRole('admin')) {
            return view('home');
        } else {
            return view('Userhome',['user' => Auth::user()]);

        }
        //profile's client
//        return view('Userhome',['user' => Auth::user()]);
    }

    public function update_avatar(Request $request)
    {
        //
        if($request->hasFile('avatar')) {
            //add the new photo
            $image = $request->file('avatar');
            $fileName = time() . '.' . $image->getClientOriginalExtension();
            $location = public_path('images/' . $fileName);
            Image::make($image)->resize(300, 300)->save($location);
            $user = Auth::user();
            $oldFileName = $user->image;
            //updatw the database
            $user->image = $fileName;
            //delete the old photo
            Storage::delete($oldFileName);
            $user->save();
        }
        return view('Userhome',['user' => Auth::user()]);

    }


}
