<?php

namespace App\Http\Controllers\Admin;

use App\Contact;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Brian2694\Toastr\Facades\Toastr;

class ContactController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth' , 'auth.admin']);
    }

    public function index()
    {

        $contacts =Contact::all();
        return view('admin.Contact.index',compact('contacts'));

    }

    public function show($id)
    {
        $contact=Contact::find($id);
        return view('admin.Contact.show',compact('contact'));

    }

    public function destroy($id)
    {

        $Contact = Contact::find($id);
        $Contact->delete();
         Toastr::success('Contact Message successfully deleted','Success',["positionClass" => "toast-top-right"]);
        return redirect()->back();
    }

}
