<?php

namespace App\Http\Controllers\Admin;


use App\Category;
use App\Item;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Storage;
use Image;


class ItemController extends Controller
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
        $items=Item::all();
//
        return view('admin.Item.index',compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $Categorios = Category::all();
        return view('admin.Item.create' ,compact('Categorios'));

    }

    /**
     * Store a newly created resource in storage.

     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'name'=>'required',
            'category'=>'required',
            'description'=>'required',
            'price'=>'required',
           'images'=>'image'
        ]);

         $item= new Item();

        if (Item::where('name', '=', Input::get('name'))->exists()) {
            return redirect()->route('item.index')->with('existsMsg','you cannot add this item retry again please');
        }
        else{
            $item->category_id= $request->category;
            $item->name= $request->name;
            $item->description= $request->description;
            $item->price= $request->price;

            if($request->hasFile('featured_image')) {
                //add the new photo
                $image = $request->file('featured_image');
                $fileName = time() . '.' . $image->getClientOriginalExtension();
                $location = public_path('images/' . $fileName);

                Image::make($image)->resize(100, 200)->save($location);
                $item->images=$fileName;
            }

            $item->save();
            return redirect()->route('item.index')->with('successMsg','Item successfully saved');
        }
    }

    /**
     * Display the specified resource.

     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item= Item::find($id);
        $Categorios = Category::all();
        return view('admin.Item.edit',compact('item','Categorios'));
    }

    /**
     * Update the specified resource in storage.

     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'name'=>'required',
            'category'=>'required',
            'description'=>'required',
            'price'=>'required',
            'images'=>'image'
        ]);

        $item = Item::find($id);
            $item->category_id= $request->category;
            $item->name= $request->name;
            $item->description= $request->description;
            $item->price= $request->price;


            if($request->hasFile('featured_image')) {
                //add the new photo
                $image = $request->file('featured_image');
                $fileName = time() . '.' . $image->getClientOriginalExtension();
                $location = public_path('images/' . $fileName);
                Image::make($image)->resize(100, 200)->save($location);

                $oldFileName = $item->images;
                //updatw the database
                $item->images = $fileName;
                //delete the old photo
                Storage::delete($oldFileName);

            }


            $item->save();

            return redirect()->route('item.index')->with('successMsg','Category  updated successfully' );

        }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Item::find($id);
        $item->delete();

        return redirect()->route('item.index')->with('successMsg','item  deleted successfully' );
        $item->save();
    }
}
