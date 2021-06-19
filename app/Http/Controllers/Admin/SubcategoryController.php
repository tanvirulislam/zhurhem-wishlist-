<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use DB;
use App\Subcategory;
use Illuminate\Support\Str;
use App\Category;
use Illuminate\Support\Facades\Auth;

class SubcategoryController extends Controller
{

    public $user;

    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $this->user = Auth::guard('admin')->user();
            return $next($request);
        });
    }

    public function index()
    {
        if (is_null($this->user) || !$this->user->can('category.view')) {
        abort(403, 'Sorry !! You are Unauthorized to view any category !');
        }

        $category = Category::all();
        $subcategory = Subcategory::all();
        return view('admin.subcategory.index', compact('category', 'subcategory'));
    }

    public function create(){
        if (is_null($this->user) || !$this->user->can('category.create')) {
            abort(403, 'Sorry !! You are Unauthorized to create any category !');
        }

        $category = Category::all();
        return view('admin.subcategory.create', compact('category'));
    }

    
    public function store(Request $request)
    {
     $request->validate([

        'name' => 'required',
        'status' => 'required',

    ]);

     $subcategory = new Subcategory();
     $subcategory->name = $request->name;
     $subcategory->category_slug = $request->category_slug;
     $subcategory->status = $request->status;
     $subcategory->subcategory_slug = Str::slug($request->name);

    $subcategory->save();
    Toastr::success('Successully Add 🙂' ,'Success');
    return redirect()->back()->with('message','Registered succesfully');
    
    }



    public function edit($id)
    {
        if (is_null($this->user) || !$this->user->can('category.edit')) {
            abort(403, 'Sorry !! You are Unauthorized to edit any category !');
        }

        $category = Category::all();
        $subcategory = Subcategory::find($id);
        return view('admin.subcategory.edit', compact('category', 'subcategory'));
        
    }


    public function update(Request $request){

        $subcategory = Subcategory::find($request->id);
        $subcategory->category_slug = $request->category_slug;
        $subcategory->name = $request->name;
        $subcategory->status = $request->status;
        $subcategory->subcategory_slug = Str::slug($request->name);
        $subcategory->save();

        Toastr::success('Successully Updated 🙂' ,'Success');
        return redirect()->route('admin.subcategory');
    }


    public function destroy($id)
    {
        if (is_null($this->user) || !$this->user->can('category.delete')) {
            abort(403, 'Sorry !! You are Unauthorized to delete any category !');
        }

        $subcategory = Subcategory::find($id);
        $subcategory->delete();
        Toastr::warning('Successully Deleted 🙂' ,'Success');
        return redirect()->route('admin.subcategory');
    }
}
