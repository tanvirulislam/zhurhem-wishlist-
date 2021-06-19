<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use DB;
use App\Category;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
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
        
    if (is_null($this->user) || !$this->user->can('category.view')) {
        abort(403, 'Sorry !! You are Unauthorized to view any category !');
    }
        $category = Category::all();
        return view('admin.category.index', compact('category'));
    }

    public function create()
    {
        if (is_null($this->user) || !$this->user->can('category.create')) {
            abort(403, 'Sorry !! You are Unauthorized to create any category !');
        }

        return view('admin.category.create');
    }

   
    public function store(Request $request)
    {
       $request->validate([

            'name' => 'required',
            'status' => 'required',

        ]);

       $category = new Category();
       $category->name = $request->name;
       $category->status = $request->status;
       $category->category_slug = Str::slug($request->name);

        $category->save();
        Toastr::success('Successully Add 🙂' ,'Success');
        return redirect()->back()->with('message','Registered succesfully');
       
    }

  
    
    public function edit($id)
    {
        if (is_null($this->user) || !$this->user->can('category.edit')) {
            abort(403, 'Sorry !! You are Unauthorized to edit any category !');
        }

        $category = Category::find($id);
        return view('admin.category.edit', compact('category'));
        
    }

   
    public function update(Request $request){

        $category = Category::find($request->id);
        $category->name = $request->name;
        $category->status = $request->status;
        $category->category_slug = Str::slug($request->name);

        $category->save();
        Toastr::success('Successully Updated 🙂' ,'Success');
        return redirect()->route('admin.category');
    }

    
    public function destroy($id)
    {
        if (is_null($this->user) || !$this->user->can('category.delete')) {
            abort(403, 'Sorry !! You are Unauthorized to delete any category !');
        }

        $catagory = Category::find($id);
        $catagory->delete();
        Toastr::warning('Successully Deleted 🙂' ,'Success');
        return redirect()->route('admin.category');
    }
}
