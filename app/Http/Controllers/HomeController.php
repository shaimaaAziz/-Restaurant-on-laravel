<?php

namespace App\Http\Controllers;

use App\Category;
use App\Item;
use App\Slides;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
//    public function __construct()
//    {
//        $this->middleware('auth');
//    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

//    public function __construct()
//    {
//        $this->middleware(['auth' , 'auth.admin']);
//    }

    public function index()
    {

        $categories = Category::all();
        $items = Item::all();
        $sliders = Slides::all();

        return view('welcome', compact('categories', 'items', 'sliders'));
    }

//    public function index2()
//    {
//        if (Auth::user()->hasAnyRole('admin')) {
//            return view('home');
//        } else {
//            return view('Userhome');
//
//        }
//    }

}
