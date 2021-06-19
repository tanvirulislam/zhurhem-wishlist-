<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use DB;
use App\Shipping;
use App\Order;
use Illuminate\Support\Facades\Auth;
use PDF;
use Dompdf\Dompdf;
use App\User;
use App\Item;
use App\Mainorder;

class OrderController extends Controller
{
    public function neworder(){

    	$orders =DB::table('main_orders')
                    ->join('users','main_orders.user_id','=','users.id')
                    ->join('shippings','main_orders.shipping_id','=','shippings.id')
                    ->select('main_orders.*','users.name as Username','shippings.name','shippings.address')
                    ->where('main_orders.status','=',0)
                    ->get();

        $status=Order::all();
       return view('admin.order.neworder',['orders'=>$orders,'status'=>$status]);


    }

    public function index(){

    	$orders =DB::table('main_orders')
                    ->join('users','main_orders.user_id','=','users.id')
                    ->join('shippings','main_orders.shipping_id','=','shippings.id')
                    ->select('main_orders.*','users.name as Username','shippings.name','shippings.address')
                    ->where('main_orders.status','=',1)
                    ->get();

        $status=Order::all();
       return view('admin.order.allorder',['orders'=>$orders,'status'=>$status]);


    }

    public function detail($id){

    	$order = DB::table('main_orders')
                    ->join('users','main_orders.user_id','=','users.id')
                    ->join('shippings','main_orders.shipping_id','=','shippings.id')
                    ->select('main_orders.*','users.name as Username','users.phone as Userphone','shippings.name','shippings.address','shippings.email','shippings.phone','shippings.msg')
                    ->where('main_orders.id','=',$id)
                    ->first();
           $details = Order::where('order_id','=',$id)->get();

        return view('admin.order.detail',['order'=>$order,'details'=>$details]);

    }

     public function update(Request $request){
       DB::table('main_orders')->where('id',$request->id)->update(['status'=>$request->status]);
         DB::table('orders')->where('order_id',$request->id)->update(['order_status'=>$request->status]);

        Toastr::success('Successull :)' ,'Success');
        return redirect()->back();
    }

    public function print($id){
           $order = DB::table('main_orders')
                    ->join('users','main_orders.user_id','=','users.id')
                    ->join('shippings','main_orders.shipping_id','=','shippings.id')
                    ->select('main_orders.*','users.name as Username','users.phone as Userphone','shippings.name','shippings.address','shippings.email','shippings.phone')
                    ->where('main_orders.id','=',$id)
                    ->first();
           $details = Order::where('order_id','=',$id)->get();
            $pdf=PDF::loadView('admin.order.print',['order'=>$order,'details'=>$details]);

            return $pdf->stream('Order_Receipt.pdf');
    }

     public function destroy($id)
    {
         Mainorder::find($id)->delete();
         Order::where('order_id',$id)->delete();
         Toastr::warning('Successfully Deleted :)','Success');
         return redirect()->back();
    }

    // user order

    public function user_pending_order(){
      $order_history = Auth::user()->id;
      $orders =DB::table('main_orders')
      ->join('users','main_orders.user_id','=','users.id')
      ->join('shippings','main_orders.shipping_id','=','shippings.id')
      ->select('main_orders.*','users.name as Username','shippings.name','shippings.address')
      ->where('main_orders.status','=',0)
      ->where('main_orders.user_id','=',$order_history)
      ->get();

        $status=Order::all();
       return view('admin.order.user_pending_order',['orders'=>$orders,'status'=>$status]);


    }

    public function order_history(){
      $order_history = Auth::user()->id;

      $orders =DB::table('main_orders')
      ->join('users','main_orders.user_id','=','users.id')
      ->join('shippings','main_orders.shipping_id','=','shippings.id')
      ->select('main_orders.*','users.name as Username','shippings.name','shippings.address')
      ->where('main_orders.status','=',1)
      ->where('main_orders.user_id','=',$order_history)
      ->get();

      $status=Order::all();
       return view('admin.order.user_order_history',['orders'=>$orders,'status'=>$status]);


    }

    public function user_order_detail($id){
      $order_history = Auth::user()->id;

    	$order = DB::table('main_orders')
                    ->join('users','main_orders.user_id','=','users.id')
                    ->join('shippings','main_orders.shipping_id','=','shippings.id')
                    ->select('main_orders.*','users.name as Username','users.phone as Userphone','shippings.name','shippings.address','shippings.email','shippings.phone','shippings.msg')
                    ->where('main_orders.user_id','=',$order_history)
                    ->first();
           $details = Order::where('order_id','=',$id)->get();

        return view('admin.order.user_order_detail',['order'=>$order,'details'=>$details]);

    }
}


