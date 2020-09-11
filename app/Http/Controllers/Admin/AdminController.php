<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Admin;

use App\Role;
use App\User;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware(['auth' , 'auth.admin']);
    }

    public function index()
    {
        //show admin's information

//        $arrOfAdmin=  array();
//
//        $role= Role::where('name','=','admin')->first();
//
//        $arry_admins= DB::table('role_user')->where('role_id' ,'=',$role->id)->get();
//
//        foreach ($arry_admins as $item){
//
//            $admin = User::where('id' ,'=', $item->user_id)->get();
//            array_push($arrOfAdmin,$admin);
//
//
//        } ;
        $arrOfAdmin= User::with('roles')->where('name' ,'=', 'admin')->get();

        if($arrOfAdmin != null) {

        return view('admin.UserProfile.indexAdmin', ['admins' => $arrOfAdmin]);
    }else{
            return('you don not have data in database');
//
        }
     }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $admin = User::find($id);
        return view('admin.UserProfile.editAdminProfile',compact('admin'));
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
        $this->validate($request,[
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:8',
            'image' => 'image',         //:jpeg,jpg,bmp,png
        ]);

        $admin = User::find($id);

        $admin->name = $request->input('name');
        $admin->email = $request->input('email');
        $admin->password = $request->input('password');

        if($request->hasFile('featured_image')){
           //add the new photo
            $image = $request->file('featured_image');
            $fileName = time() . '.' . $image->getClientOriginalExtension();
            $location = public_path('images/' . $fileName);
            Image::make($image)->resize(100,200)->save($location);
            $oldFileName = $admin->image;
            //updatw the database
            $admin->image = $fileName;
            //delete the old photo
            Storage::delete($oldFileName);

        }
        $admin->save();
        return redirect()->route('userProfile.index')->with('successMsg','Admin Successfully Updated');
    }


}
