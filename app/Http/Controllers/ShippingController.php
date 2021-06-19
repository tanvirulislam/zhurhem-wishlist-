<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use App\User;
use Illuminate\Support\Facades\Hash;
use Session;
use App\Shipping;
use App\Order;
use App\Mainorder;
use App\Subcategory;
use App\Product;
use App\Category;
use App\Wishlist;
use App\Photo;
use Illuminate\Support\Facades\Auth;

class ShippingController extends Controller
{
    public function index(){
        $category = Category::all();
        $subcategory_first = Subcategory::latest()->limit(1)->first();
        $subcategory_second = Subcategory::latest()->skip(1)->take(1)->first();
        $subcategory_third = Subcategory::latest()->skip(2)->take(1)->first();
        $product = Product::latest()->limit(6)->get();
		$image = Photo::all();
        
        return view('front.login', compact('category', 'subcategory_first', 'product', 'subcategory_second',
        'subcategory_third', 'image'));
    }

    public function customer_dashoard(){
        $category = Category::all();
        $subcategory_first = Subcategory::latest()->limit(1)->first();
        $subcategory_second = Subcategory::latest()->skip(1)->take(1)->first();
        $subcategory_third = Subcategory::latest()->skip(2)->take(1)->first();
        $product = Product::latest()->limit(6)->get();
		$image = Photo::all();
        $wishlist = Wishlist::count();
        
        return view('front.customer.dashoard_login', compact('category', 'subcategory_first', 'product', 'subcategory_second',
        'subcategory_third', 'image', 'wishlist'));
    }

    public function c_dashoard(){
        $category = Category::all();
        $subcategory_first = Subcategory::latest()->limit(1)->first();
        $subcategory_second = Subcategory::latest()->skip(1)->take(1)->first();
        $subcategory_third = Subcategory::latest()->skip(2)->take(1)->first();
        $product = Product::latest()->limit(6)->get();
		$image = Photo::all();
        
        return view('front.customer.dashboard', compact('category', 'subcategory_first', 'product', 'subcategory_second',
        'subcategory_third', 'image'));
    }
        
            public function shippinindex(){
                $category = Category::all();
                $subcategory_first = Subcategory::latest()->limit(1)->first();
                $subcategory_second = Subcategory::latest()->skip(1)->take(1)->first();
                $subcategory_third = Subcategory::latest()->skip(2)->take(1)->first();
                $product = Product::latest()->limit(6)->get();
                $image = Photo::all();

                $cartCollection = \Cart::getContent();
               
                return view('user.shipping', compact('cartCollection','category', 'subcategory_first', 'product', 'subcategory_second',
                'subcategory_third', 'image', 'cartCollection'));
            }
        
        
            public function register(Request $request){
                $customer = new User();
                $customer->name = $request->name;
                $customer->email = $request->email;
                $customer->phone = $request->phone;
                $customer->password = Hash::make($request->password);
                $customer->save();
        
                $customerId = $customer->id;
                Session::put('customerId',$customerId);
                Session::put('customerName',$customer->name);
        
               return redirect('/shipping');
            }
        
            public function login(Request $request){
                $customer = User::where('email',$request->email)->first();
                if(password_verify($request->password,$customer->password)){
        
                    Session::put('customerId',$customer->id);
                    Session::put('customerName',$customer->name);
        
                    return redirect('/shipping');
                } else {
                    return redirect('/customer')->with('message','Incorrect Password');
                }
            }
        
            public function add(Request $request){
        
                $user= Session::get('customerId');
        if(Auth::check() && Auth::user()->role_id == 2){
                $customer = new Shipping();
                $customer->name = $request->name;
                $customer->email = $request->email;
                $customer->user_id = Auth::user()->id;
                $customer->phone = $request->phone;
                $customer->address = $request->address;
                $customer->msg = $request->msg;
                $customer->save();
        }else{
        
            $customer = new Shipping();
                $customer->name = $request->name;
                $customer->email = $request->email;
                $customer->user_id = $user;
                $customer->phone = $request->phone;
                $customer->address = $request->address;
                $customer->msg = $request->msg;
                $customer->save();
        
        }
                $shippingId = $customer->id;
                $userId = $customer->user_id;
                  if(Auth::check() && Auth::user()->role_id == 2){
        
                    $mainOrder = new Mainorder();
                    $mainOrder->user_id = Auth::user()->id;
                    $mainOrder->shipping_id =  $shippingId;
                    $mainOrder->pin ='ZURHEM-'.rand('10000000','99999999');
                    $mainOrder->order_total=\Cart::getTotal();
                    $mainOrder->save();
        
                    $orderId=$mainOrder->id;
        
                    $cartCollection = \Cart::getContent();
                    // dd($cartCollection);
                    foreach ($cartCollection as $cartProduct){
                     
                     $order= new Order();
                     $order->user_id = Auth::user()->id;
                     $order->shipping_id =  $shippingId;
                     $order->product_id = $cartProduct->id;
                     $order->order_id = $orderId;
                     $order->product_name = $cartProduct->name;
                     $order->size = $cartProduct->attributes->size;
                     $order->product_price = $cartProduct->price;
                     $order->product_quantity =$cartProduct->quantity;
                     $order->order_total = \Cart::get($cartProduct->id)->getPriceSum();
                     
                     $order->save();
        
        
                 }
        
                  }else{
        
                      $mainOrder = new Mainorder();
                      $mainOrder->user_id = $userId;;
                    $mainOrder->shipping_id =  $shippingId;
                    $mainOrder->pin ='ZURHEM-'.rand('10000000','99999999');
                    $mainOrder->order_total=\Cart::getTotal();
                    $mainOrder->save();
        
                    $orderId=$mainOrder->id;
        
                       $cartCollection = \Cart::getContent();
                    // dd($cartCollection);

                 foreach ($cartCollection as $cartProduct){
                     
                     $order= new Order();
                     $order->user_id = $userId;
                     $order->shipping_id =  $shippingId;
                     $order->product_id = $cartProduct->id;
                     $order->order_id = $orderId;
                     $order->product_name = $cartProduct->name;
                     $order->size = $cartProduct->attributes->size;
                     $order->product_price = $cartProduct->price;
                     $order->product_quantity =$cartProduct->quantity;
                     $order->order_total = \Cart::get($cartProduct->id)->getPriceSum();
                     
                     $order->save();
        
                 }
        
                  }
               
        
                \Cart::clear();
                // dd('ok');
                $pinNumber =   $mainOrder->pin;
                $user = User::where('id', 1)->get();
                // Notification::send($user, new EmailNotify($pinNumber));
                $pinNum = Mainorder::where('id',$orderId)->first();
                //$users=User::all();
                // $menus = Category::orderBy('id','desc')->get();
                $category = Category::all();
                $subcategory_first = Subcategory::latest()->limit(1)->first();
                $subcategory_second = Subcategory::latest()->skip(1)->take(1)->first();
                $subcategory_third = Subcategory::latest()->skip(2)->take(1)->first();
                $product = Product::latest()->limit(6)->get();
                $image = Photo::all();
                return view('front.success', compact('pinNum','category', 'subcategory_first', 'product', 'subcategory_second',
                'subcategory_third', 'image', 'cartCollection'));
        
            }
        
        
            // public function success(){
            //     return view('front.success');
                
            // }
}
