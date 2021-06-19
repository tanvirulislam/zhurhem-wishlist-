<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use DB;
use App\Category;
use App\Subcategory;
use App\Product;
use App\Size;
use App\Feature;
use App\ProductSize;
use App\DetailAndCare;
use App\SizeAndFit;
use App\Photo;
use App\Stock;
use Session;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
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
        if (is_null($this->user) || !$this->user->can('product.view')) {
            abort(403, 'Sorry !! You are Unauthorized to view any product !');
        }

        $category = Category::all();
        $subcategory = Subcategory::all();
        $product = Product::all();
        return view('admin.product.index', compact('category', 'subcategory', 'product'));
    }

    public function findProductName(Request $request){
        $data = Subcategory::select('name','subcategory_slug')->where('category_slug',$request->id)->get();
        return response()->json($data);
    }

    public function create()
    {
        if (is_null($this->user) || !$this->user->can('product.create')) {
            abort(403, 'Sorry !! You are Unauthorized to create any product !');
        }

        $category = Category::all();
        $size = Size::all();
        return view('admin.product.create', compact('category', 'size'));
    }
   
    public function store(Request $request)
    {
       $request->validate([
            'name' => 'required',
            'category_slug' => 'required',
            'subcategory_slug' => 'required',
            'price' => 'required',
            'desc' => 'required',
            'cloth_name' => 'required',
            'size' => 'required',
            'status' => 'required',
            'image' => 'required',

        ]);

       $product = new Product();
       $product->name = $request->name;
       $product->product_slug = Str::slug($request->name);
       $product->category_slug = $request->category_slug;
       $product->subcategory_slug = $request->subcategory_slug;
       $product->desc = $request->desc;
       $product->cloth_name = $request->cloth_name;
       $product->price = $request->price;
       $product->status = $request->status;
       $product->product_code = mt_rand(1000000000, 9999999999);

       if($request->hasfile('image')){
        $file = $request->file('image');
        $extension = $file->getClientOriginalExtension();
        $filename=time().'.'.$extension;
        $file->move('public/upload/',$filename);
        $product->image ='public/upload/'. $filename;
        }

       $product->save();

        //data store into  session
        $productId = $product->id;
        Session::put('productId', $productId);

        $stock = new Stock();
        $stock->product_id = $productId;
        $stock->stock = $request->stock;
        $stock->save();
       
       
       // for multiple data/array insert
       $input = $request->all();
       $condition = $input['size'];
       foreach($condition as $key => $condition){
            $condition = new ProductSize();
            $condition->size = $input['size'][$key];
            $condition->product_id = $productId;
            $condition->save();
       }
      
        Toastr::success('Successully Add 🙂(' ,'Success');
        return redirect()->route('admin.product.feature');
       
    }
    public function feature(){
        return view('admin.product.feature');
    }
    public function feature_store(Request $request){
        $request->validate([
            'feature' => 'required',
        ]);

        $product = new Feature();
        $product->product_id = $request->product_id;
        $product->feature = $request->feature;
        $product->save();
        Toastr::success('Successully Add 🙂(' ,'Success');
        return redirect()->route('admin.product.detail');
    }

    public function detail(){
        return view('admin.product.detail_and_care');
    }
    public function detail_store(Request $request){
        $request->validate([
            'detail_and_care' => 'required',
        ]);

        $input = $request->all();
        $condition = $input['detail_and_care'];
        foreach($condition as $key => $condition){
            $condition = new DetailAndCare();
            $condition->detail_and_care = $input['detail_and_care'][$key];
            $condition->product_id = $request->product_id;
            $condition->save();
       }
        // dd($condition);
        Toastr::success('Successully Add 🙂(' ,'Success');
        return redirect()->route('admin.product.size_fit');
    }

    public function size_fit(){
        return view('admin.product.size_and_fit');
    }
    public function size_fit_store(Request $request){
        $request->validate([
            'size_and_fit' => 'required',
        ]);

        $input = $request->all();
        $condition = $input['size_and_fit'];
        // dd($condition);

        foreach($condition as $key => $condition){
            $condition = new SizeAndFit();
            $condition->size_and_fit = $input['size_and_fit'][$key];
            $condition->product_id = $request->product_id;
            $condition->save();
       }
       Toastr::success('Successully Add 🙂(' ,'Success');
        return redirect()->route('admin.product.image');
    }

    public function image(){
        return view('admin.product.image');
    }

    public function image_store(Request $request){
        $request->validate([
            'image' => 'required',
        ]);


            $input = $request->all();
            $condition = $input['image'];
            // $condition_1 =implode(array_slice($condition, 0, 1));
            // dd($condition_1);
            // $first_image = array_values($condition)[0];
            // $image = Product::where('id', $request->product_id)->update(['image'=>$first_image]);

            // dd($first_image);
            foreach($condition as $key => $condition){
                $form= new Photo();
                $file=$input['image'][$key];
                $name=$file->getClientOriginalName();
                $file->move('public/upload/', $name);  
                $form->image='public/upload/'.$name;
                $form->product_id = $request->product_id;
                $form->save();
           }
           
        Toastr::success('Successully Add 🙂(' ,'Success');
        return redirect()->route('admin.product');
    }
    
    public function product_details($id){

        $product = Product::where('id', $id)->first();
        $product_size = ProductSize::where('product_id', $id)->get();
        $feature = Feature::where('product_id', $id)->get();
        $detail_care = DetailAndCare::where('product_id', $id)->get();
        $size_fit = SizeAndFit::where('product_id', $id)->get();
        $image = Photo::where('product_id', $id)->get();
        $stock = Stock::where('product_id', $id)->get();

        return view('admin.product.product_details', 
        ['product' => $product,
         'product_size' => $product_size,
         'feature' => $feature,
         'detail_care' => $detail_care,
         'size_fit' => $size_fit,
         'image' => $image,
         'stock' => $stock,
         'id' => $id,

         ]);
    }
  
    
    public function edit($id)
    {
        if (is_null($this->user) || !$this->user->can('product.edit')) {
            abort(403, 'Sorry !! You are Unauthorized to edit any product !');
        }

        $category = Category::all();
        $subcategory = Subcategory::all();
        $product = Product::where('id', $id)->first();
        return view('admin.product.edit', compact('category', 'subcategory', 'product'));
        
    }

    public function size_edit($id){

        $product = ProductSize::where('product_id', $id)->get();
        $size = Size::all();
        return view('admin.product.size_edit', compact('size', 'product', 'id'));

    }

    public function size_update(Request $request){

        $product_size = ProductSize::where('product_id', $request->id)->delete();

        $input = $request->all();
        $condition = $input['size'];

        foreach($condition as $key => $condition){
            $condition = new ProductSize();
            $condition->size = $input['size'][$key];
            $condition->product_id = $request->id;
            $condition->save();
       }
        return redirect()->route('admin.product');
    }

    public function feature_edit($id){

        $feature = Feature::where('product_id', $id)->first();
        return view('admin.product.feature_edit', compact('feature','id'));

    }

    public function feature_update(Request $request){

        $feature = Feature::find($request->id);
        $feature->product_id = $request-> product_id;
        $feature->feature = $request-> feature;
        $feature->save();
        // dd($feature);

        return redirect()->route('admin.product');
    }    

    public function stock_edit($id){

        $feature = Stock::where('product_id', $id)->first();
        return view('admin.product.stock_edit', compact('feature','id'));

    }

    public function stock_update(Request $request){

        $feature = Stock::find($request->id);
        $feature->product_id = $request-> product_id;
        $feature->stock = $request-> stock;
        $feature->save();
        // dd($feature);

        return redirect()->route('admin.product');
    }  

    
    public function size_fit_edit($id){

        $size_fit = SizeAndFit::where('product_id', $id)->get();
       
        return view('admin.product.size_fit_edit', compact('size_fit','id'));

    }

    public function size_fit_update(Request $request){
        $product_size = SizeAndFit::where('product_id', $request->id)->delete();
       
        $input = $request->all();
        $condition = $input['size_and_fit'];

        foreach($condition as $key => $condition){
            $condition = new SizeAndFit();
            $condition->size_and_fit = $input['size_and_fit'][$key];
            $condition->product_id = $request->id;
            $condition->save();
       }

        return redirect()->route('admin.product');
    } 

    public function detail_care_edit($id){

        $size_fit = DetailAndCare::where('product_id', $id)->get();
       
        return view('admin.product.detail_care_edit', compact('size_fit','id'));

    }

    public function detail_care_update(Request $request){
        $product_size = DetailAndCare::where('product_id', $request->id)->delete();
       
        $input = $request->all();
        $condition = $input['detail_and_care'];

        foreach($condition as $key => $condition){
            $condition = new DetailAndCare();
            $condition->detail_and_care = $input['detail_and_care'][$key];
            $condition->product_id = $request->id;
            $condition->save();
       }

        return redirect()->route('admin.product');
    } 

    
    public function image_edit($id){

        $size_fit = Photo::where('product_id', $id)->get();
       
        return view('admin.product.image_edit', compact('size_fit','id'));

    }

    public function image_update(Request $request){
        $product_size = Photo::where('product_id', $request->id)->delete();
       
        $input = $request->all();
        $condition = $input['image'];

        // $first_image = array_values($condition)[0];

        foreach($condition as $key => $condition){
         

            $form= new Photo();
            $file=$input['image'][$key];
            $name=$file->getClientOriginalName();
            $file->move('public/upload/', $name);  
            $form->image='public/upload/'.$name;
            $form->product_id = $request->id;
            $form->save();
       }

    //    $image = Product::where('id', $request->id)->update(['image'=>$first_image]);
        return redirect()->route('admin.product');
    } 

   
    public function update(Request $request){

        $product = Product::find($request->id);
        $product->name = $request->name;
        $product->product_slug = Str::slug($request->name);
        $product->category_slug = $request->category_slug;
        $product->subcategory_slug = $request->subcategory_slug;
        $product->desc = $request->desc;
        $product->cloth_name = $request->cloth_name;
        $product->price = $request->price;
        $product->status = $request->status;

            if($request->hasfile('image')){
                $file = $request->file('image');
                $extension = $file->getClientOriginalExtension();
                $filename=time().'.'.$extension;
                $file->move('public/upload/',$filename);
                $product->image ='public/upload/'. $filename;
            }

        // dd($product);
        $product->save();
        Toastr::success('Successully Updated 🙂' ,'Success');
        return redirect()->route('admin.product');
    }

    

    
    public function destroy($id)
    {
        if (is_null($this->user) || !$this->user->can('product.delete')) {
            abort(403, 'Sorry !! You are Unauthorized to delete any product !');
        }

        $product = Product::find($id);
        $product->delete();
        $product_size = ProductSize::where('product_id', $id)->delete();
        $feature = Feature::where('product_id', $id)->delete();
        $detail_care = DetailAndCare::where('product_id', $id)->delete();
        $size_fit = SizeAndFit::where('product_id', $id)->delete();
        $image = Photo::where('product_id', $id)->delete();

        Toastr::warning('Successully Deleted 🙂' ,'Success');
        return redirect()->route('admin.product');
    }

   
  
   
    
}
