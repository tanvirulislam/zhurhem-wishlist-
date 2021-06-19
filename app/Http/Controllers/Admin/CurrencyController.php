<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use DB;
use App\Currency;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class CurrencyController extends Controller
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
        
    if (is_null($this->user) || !$this->user->can('currency.view')) {
        abort(403, 'Sorry !! You are Unauthorized to view any currency !');
    }
        $category = Currency::all();
        return view('admin.currency.index', compact('category'));
    }

    public function create()
    {
        if (is_null($this->user) || !$this->user->can('currency.create')) {
            abort(403, 'Sorry !! You are Unauthorized to create any currency !');
        }

        return view('admin.currency.create');
    }

   
    public function store(Request $request)
    {
       $request->validate([

            'currency_code' => 'required',
            'exchange_rate' => 'required',
            'status' => 'required',

        ]);

       $category = new Currency();
       $category->currency_code = $request->currency_code;
       $category->exchange_rate = $request->exchange_rate;
       $category->status = $request->status;
    //    dd($category);
        $category->save();
        Toastr::success('Successully Add 🙂' ,'Success');
        return redirect()->back()->with('message','Registered succesfully');
       
    }

  
    
    public function edit($id)
    {
        if (is_null($this->user) || !$this->user->can('currency.edit')) {
            abort(403, 'Sorry !! You are Unauthorized to edit any currency !');
        }

        $category = Currency::find($id);
        return view('admin.currency.edit', compact('category'));
        
    }

   
    public function update(Request $request){

        $category = Currency::find($request->id);
        $category->name = $request->name;
        $category->status = $request->status;
        $category->category_slug = Str::slug($request->name);

        $category->save();
        Toastr::success('Successully Updated 🙂' ,'Success');
        return redirect()->route('admin.currency');
    }

    
    public function destroy($id)
    {
        if (is_null($this->user) || !$this->user->can('currency.delete')) {
            abort(403, 'Sorry !! You are Unauthorized to delete any currency !');
        }

        $catagory = Currency::find($id);
        $catagory->delete();
        Toastr::warning('Successully Deleted 🙂' ,'Success');
        return redirect()->route('admin.currency');
    }
}
