<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Slides;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use Image;

class SliderController extends Controller
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
        $sliders = Slides::all();
        return view('admin.slider.index',compact('sliders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.slider.create');

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
            'title' => 'required',
            'sub_title' => 'required',
            'image' => 'image| mimes:jpeg,jpg,bmp,png',
        ]);

        $slider = new Slides();
        $slider->title = $request->title;
        $slider->sub_title = $request->sub_title;

        if($request->hasFile('featured_image')) {
            //add the new photo
            $image = $request->file('featured_image');
            $fileName = time() . '.' . $image->getClientOriginalExtension();
            $location = public_path('images/' . $fileName);

            Image::make($image)->resize(100, 200)->save($location);
            $slider->image = $fileName;

        }


        $slider->save();
        return redirect()->route('slider.index')->with('successMsg','Slider Successfully Saved');
    }

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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $slider = Slides::find($id);
        return view('admin.slider.edit',compact('slider'));
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
            'title' => 'required',
            'sub_title' => 'required',
            'image' => 'image | mimes:jpeg,jpg,bmp,png',
        ]);
        $slider = Slides::find($id);

        $slider->title = $request->title;
        $slider->sub_title = $request->sub_title;


        if($request->hasFile('featured_image')){
            //add the new photo
            $image = $request->file('featured_image');
            $fileName = time() . '.' . $image->getClientOriginalExtension();
            $location = public_path('images/' . $fileName);
            Image::make($image)->save($location);
            $oldFileName = $slider->image;
            //updatw the database
            $slider->image = $fileName;
            //delete the old photo
            Storage::delete($oldFileName);

        }
        $slider->save();
        return redirect()->route('slider.index')->with('successMsg','Slider Successfully Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $slider = Slides::find($id);

        $slider->delete();
        return redirect()->back()->with('successMsg','Slider Successfully Deleted');
        $slider->save();

    }
}
