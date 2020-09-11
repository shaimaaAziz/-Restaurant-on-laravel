<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class CategroyController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function __construct()
    {
        $this->middleware(['auth' , 'auth.admin']);
    }

    public function index()
    {
        $Categorios = Category::all();
        return view('admin.Category.index',compact('Categorios'));
    }

    /**
     * Show the form for creating a new resource.
     *
     */
    public function create()
    {
        return view('admin.Category.create');
    }

    /**
     * Store a newly created resource in storage.

     */
    public function store(Request $request)
    {
      $this->validate($request,[
           'name'=>'required',
           'description'=>'required'
       ]);


      $Category= new Category();

       if (Category::where('name', '=', Input::get('name'))->exists()) {
            return redirect()->route('Category.index')->with('existsMsg','you cannot add this category retry again please');
        }
        else{
            $Category->name= $request->name;
            $Category->description= $request->description;
            $Category->save();
             return redirect()->route('Category.index')->with('successMsg','Category successfully saved');
    }}

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     */
    public function edit($id)
    {
       $category = Category::find($id);
       return view('admin.Category.edit',compact('category'));
    }

    /**
     * Update the specified resource in storage.

     */
    public function update(Request $request, $id)
    {

        $this->validate($request,[
            'name'=>'required',
            'description'=>'required'
        ]);

        $category = Category::find($id);

        $category->name= $request->name;
        $category->description= $request->description;
        $category->save();
        return redirect()->route('Category.index')->with('successMsg','Category  updated successfully' );




    }

    /**
     * Remove the specified resource from storage.
     *

     */
    public function destroy($id)
    {
        $category = Category::find($id);
        $category->delete();
        return redirect()->route('Category.index')->with('successMsg','Category  deleted successfully' );
        $category->save();
    }
}
