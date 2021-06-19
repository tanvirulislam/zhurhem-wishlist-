<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use DB;
use App\Size;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class SizeController extends Controller
{
    public $user;

    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $this->user = Auth::guard('admin')->user();
            return $next($request);
        });
    }


    public function index(){   
        
    if (is_null($this->user) || !$this->user->can('size.view')) {
        abort(403, 'Sorry !! You are Unauthorized to view any size !');
    }
        $category = Size::all();
        return view('admin.size.index', compact('category'));
    }

    public function create()
    {
        if (is_null($this->user) || !$this->user->can('size.create')) {
            abort(403, 'Sorry !! You are Unauthorized to create any size !');
        }

        return view('admin.size.create');
    }

   
    public function store(Request $request)
    {
       $request->validate([

            'size' => 'required',

        ]);

       $category = new Size();
       $category->size = $request->size;

        $category->save();
        Toastr::success('Successully Add 🙂' ,'Success');
        return redirect()->back()->with('message','Registered succesfully');
       
    }

  
    
    public function edit($id)
    {
        if (is_null($this->user) || !$this->user->can('size.edit')) {
            abort(403, 'Sorry !! You are Unauthorized to edit any size !');
        }

        $category = Size::find($id);
        return view('admin.size.edit', compact('category'));
        
    }

   
    public function update(Request $request){

        $category = Size::find($request->id);
        $category->size = $request->size;

        $category->save();
        Toastr::success('Successully Updated 🙂' ,'Success');
        return redirect()->route('admin.size');
    }

    
    public function destroy($id)
    {
        if (is_null($this->user) || !$this->user->can('size.delete')) {
            abort(403, 'Sorry !! You are Unauthorized to delete any size !');
        }

        $catagory = Size::find($id);
        $catagory->delete();
        Toastr::warning('Successully Deleted 🙂' ,'Success');
        return redirect()->route('admin.size');
    }
}
