<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Product;
use Brian2694\Toastr\Facades\Toastr;
use DB;
use App\Category;
use Image;
use App\Subcategory;

use App\Photo;
use App\ProductSize;
use App\DetailAndCare;
use App\SizeAndFit;
use App\Feature;

use App\Http\Resources\Product\ProductResource;
use App\Http\Resources\Product\FeatureProductResource;
use App\Http\Resources\Product\CatProductResource;
use App\Http\Resources\Product\SubCatProductResource;
class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       return ProductResource::collection(Product::latest()->paginate(10));
    }
    
    
    public function feature_product()
    {
       return FeatureProductResource::collection(Product::where('status',2)->latest()->limit(6)->get());
    }
    
    
    
    public function pmenunew($slug)
    {
       return CatProductResource::collection(Product::where('category_slug',$slug)->latest()->paginate(10));
    }
    
    
    public function pmenusub($slug)
    {
       return SubCatProductResource::collection(Product::where('subcategory_slug',$slug)->latest()->paginate(10));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return 'dd';
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Item $product)
    {
        return new ProductResource($product);
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }
    
    public function searchMember(Request $request)
{
    $data = $request->get('data');
    $member_info = Item::where('cat_id', 'like', "%{$data}%")->orWhere('item_name', 'like', "%{$data}%")
             ->get();

    return Response()->json([
        'status' => 'success',
        'data' => $member_info
    ], 200);
}

public function pmenu($slug){
    
    $cat_pro_info = Item::where('cat_slug',$slug)->latest()->get();

    return Response()->json([
        'status' => 'success',
        'slug' => $cat_pro_info
    ], 200);
    
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    
     public function cart()  {
        $cartCollection = \Cart::getContent();
        
 return Response()->json([
        'status' => 'success',
        'card' => $cartCollection
    ], 200);
    }

     public function add(Request$request){
       \Cart::add(array(
            'id' => $request->id,
            'name' => $request->name,
            'price' => $request->price,
            'quantity' => $request->quantity,
            'attributes' => array(
                'image' => $request->img,
                'slug' => $request->slug
            )
        ));
      
        return Response()->json([
        'status' => 'success'
        
    ], 200);
    }


     public function remove1(Request $request){
        \Cart::remove($request->id);
        return redirect()->route('cart.index')->with('success_msg', 'Item is removed!');
    }

    public function update1(Request $request){
        \Cart::update($request->id,
            array(
                'quantity' => array(
                    'relative' => false,
                    'value' => $request->quantity
                ),
        ));
        return redirect()->route('cart.index')->with('success_msg', 'Cart is Updated!');
    }

    public function clear1(){
        \Cart::clear();
        return redirect()->route('cart.index')->with('success_msg', 'Car is cleared!');
    }
    
        public function add2(Request $request)
{
    
    
    
        $customer = new Shippinfo();
        $customer->name = $request->name;
        $customer->payment_transection = $request->payment_transection;
        $customer->payment_number = $request->payment_number;
        $customer->bpayment_tran = $request->bpayment_tran;
        $customer->bpayment_number = $request->bpayment_number;
        $customer->payment_type = $request->payment_type;
        $customer->phone = $request->phone;
        $customer->address = $request->address;
        $customer->msg = $request->msg;
        $customer->p_id = implode(',',(array)$request->p_id);
        $customer->quantity = implode(',',(array)$request->quantity);
        $customer->price = implode(',',(array)$request->price);
        $customer->total_price = $request->total_price;
        $customer->save();
       return Response()->json([
        'status' => 'success',
        'order_detail' => $customer
    ], 200);

}

public function product_detail($slug){
    
        $product_detail = Product::where('id', $slug)->first();
        $product_size = ProductSize::where('product_id', $slug)->get();
        $detail_care = DetailAndCare::where('product_id', $slug)->get();
        $size_fit = SizeAndFit::where('product_id', $slug)->get();
        $feature = Feature::where('product_id', $slug)->get();
        $image = Photo::where('product_id', $slug)->get();

        $cat = Category::first();

        $cat_name_value = Product::where('id', $slug)->value('category_slug');
        $main_cat_name_value = Category::where('category_slug', $cat_name_value)->value('name');

        $sub_cat_name_value = Product::where('id', $slug)->value('subcategory_slug');
        $main_subcat_name_value = Subcategory::where('subcategory_slug', $sub_cat_name_value)->value('name');

        $random_product = Product::where('subcategory_slug', $sub_cat_name_value)->inRandomOrder()->limit(3)->get();
        
        return response()->json([
            'STATUS'=>'SUCCESS',
            'product' => $product_detail,
            'size' => $product_size,
            'detailscare' => $detail_care,
            'size_and_fit' => $size_fit,
            'features' => $feature,
            'images' => $image,
            'category' => $cat,
            'category_name' => $cat_name_value,
            'subcategory_name' => $main_subcat_name_value,
            'random_products' => $random_product
            
            ],200);
    
}

}
