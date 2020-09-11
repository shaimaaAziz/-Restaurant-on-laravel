<?php

namespace App\Http\Controllers\admin;

use App\Role;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Image;
class UserController extends Controller
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
//        $alluser = User::all();
//        $users = null;
//        foreach ($alluser->roles as $role) {
//            if( $role->pivot->role_id ==2 );
//            $users = array($alluser);
//        }

         $users = User::all();
//
//        if($users->hasAnyRole('user')) {
//
//            $users = User::all();
//

        $users = User::with('roles')->where('name' ,'!=', 'admin')->get();

        return view('admin.user.index', ['users' => $users]);
//          return view('admin.user.index',compact('users'));

    }
    // }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::all();
        $roles = Role::all();
        return view('admin.user.create' ,compact('users','roles'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'name'=>'required',
            'email'=>'required|email',
            'password'=>['required', 'string', 'min:5'],
            'phone' =>['required','integer', 'min:0'],
            'address' => ['required', 'string'],
            'image'=>'image',
        ]);

        $user= new User();


        $user->name= $request->name;
        $user->email =$request->email;
        $user->password =bcrypt($request->password);
        $user->phone =$request->phone;
        $user->address =$request->address;

        if($request->hasFile('featured_image')) {
            //add the new photo
            $image = $request->file('featured_image');
            $fileName = time() . '.' . $image->getClientOriginalExtension();
            $location = public_path('images/' . $fileName);

            Image::make($image)->resize(100, 200)->save($location);
            $user->image = $fileName;

        }
        $user->save();
        //to add to the role_user table
        $user->roles()->attach($request->role);


//        $roles = Role::where('name','=',$request->role)->first();
//        $role_id = $roles->id;
//        return $roles;
//        $role_id = array();
//        foreach ($roles as $item){
//            $role_id =  $item->id;
//        }

        $Role = array();
        if ($request->role ==  'admin') {
            $Role = Role::where('name', 'admin')->first();
        }else if($request->role ==  'user'){
            $Role =  Role::where('name' , 'user')->first();

        }
        $current_user =User::find($user->id);
        $current_user->roles()->attach($Role);
//        DB::table('role_user')->insert(['role_id' => '2',
//            'user_id' => $user->id]);

        return redirect()->route('user.index')->with('successMsg','User successfully saved');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user =User::find($id);
        $roles = Role::all();

        return view('admin.user.edit',compact('user','roles'));
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

//     DB::table('role_user')->where('user_id','=', $id)->update(['role_id' => '1']);
        $Role = array();
        if ($request->role ==  'admin') {
            $Role = Role::where('name', 'admin')->first();
        }else if($request->role ==  'user'){
            $Role =  Role::where('name' , 'user')->first();

        }


        $current_user =User::find($id);
        $current_user->roles()->sync($Role);
//             DB::table('role_user')->where('user_id','=', $id)->update(['role_id' => $Role->id]);

        return redirect()->route('user.index')->with('successMsg','User successfully saved');

    }

    /*
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();

        return redirect()->route('user.index')->with('successMsg','user  deleted successfully' );
        $user->save();
    }
}
