@extends('front.master.master')
@section('title')
Cart
@endsection

@section('css')
<link rel="stylesheet" href="{{asset('/')}}public/front/css/product-category.css" />
<link rel="stylesheet" href="{{asset('/')}}public/front/css/product-details.css" />
<link rel="stylesheet" href="{{asset('/')}}public/front/css/cart.css" />

@endsection


@section('body')

<section id="cart" style="color:black">
      <div class="container">
        <div class="cart-header">
          <h1>My Cart</h1>
          <a href="{{ route('index') }}"
            ><i class="fas fa-long-arrow-alt-left"></i>continue shopping</a
          >
        </div>
		<center>
    <div class="one" style=" width:100%;height:auto; padding-top: 25px;" >
      @if(\Cart::getTotalQuantity()>0)
      <h4 class="text-center" style=""><b>{{ \Cart::getTotalQuantity()}} Item(s) In Your Cart<b></h4><br>
        @else
        <h4>No Item(s) In Your Cart</h4><br>
        <!-- <a href="{{ route('index') }}" class="btn gothic cart_btn">Continue Shopping</a> -->
        <br>
        <br>
        @endif
      </div>
      </center>
        <div class="cart-content">
          <table>
            <thead>
              <td>
                <p>product</p>
              </td>
              <td>
                <p>product details</p>
              </td>
              <td>
                <p>price</p>
              </td>
              <td>
                <p>quantity</p>
              </td>
              <td>
                <p>subtotal</p>
              </td>
              <td>
                <p>action</p>
              </td>
            </thead>
            <tbody>
			@foreach($cartCollection as $item)
              <tr>
                <td class="product-div" style="display: inherit;">
				<img src="{{ $item->attributes->image }}" class="img-thumbnail" alt="image" width="200" height="200">
                </td>
                <td class="details-container">
                  <h1>{{$item->name}}</h1>
                  <div class="price-div">
                    <div class="composition"><p>Size: {{$item->attributes->size}}</p></div>
                  </div>
                  <!-- <p class="details-paragraph">
                    Highlighted by a bold, textured green stripe, this slim
                    tailored polo is crafted from a lightweight linen-cotton
                    blend with a buttonless collar.
                  </p> -->
                </td>
                <td>
                  <p>$ {{$item->price}}</p>
                </td>
                <td>
				<form action="{{ route('cart.update') }}" method="POST" class="form-inline">
                {{ csrf_field() }}
                <div class="form-group">
                  <input type="hidden" value="{{ $item->id}}" id="id" name="id">
                  <!-- <input style="color:black;" type="number" class="form-control form-control-sm" value="{{ $item->quantity }}"
                  id="quantity" name="quantity" style="width:70px;">
				   -->
				  <input style="color:black;" type="text" name="quantity" id="quantity" value="{{ $item->quantity }}">
                </div>
                <button style="margin-top:10px;"  class="btn gothic cart_btn">Update</button>
              </form>
			  
                  <!-- <div class="quantity-selector">
                    <i class="fas fa-minus"></i>
                    <p>5</p>
                    <i class="fas fa-plus"></i>
                  </div> -->

                </td>
                <td>
                  <p >$ {{ \Cart::get($item->id)->getPriceSum() }}</p>
                </td>
                <td>
				<form action="{{ route('cart.remove') }}" method="POST" class="form-inline">
                @csrf
                <input type="hidden" value="{{ $item->id }}" id="id" name="id">
                <button  class="btn gothic cart_btn" style="">Delete</i></button>
              </form>
                </td>
              </tr>
              
			  @endforeach
            </tbody>
          </table>
        </div>
        <div class="cart-checkout">
          <div class="cart-buttons">
		  @if(count($cartCollection)>0)
        <form action="{{ route('cart.clear') }}" method="POST">
          {{ csrf_field() }}
          &nbsp;&nbsp;<button class="btn cart_btn">Clear Cart</button>
        </form>
        @endif
            <div class="checkout-div">
			@if(count($cartCollection)>0)
              <div class="cart-total">
                <h1>Total : <span>$ {{ \Cart::getTotal() }}</span></h1>
              </div>
              <a href="{{ route('index') }}">continue shopping</a>
			  @if(Auth::check() && Auth::user()->role_id == 2 || Session::get('customerId'))

			<a type="button" href="{{route('shipping.index')}}" class="btn gothic">Proceed To Checkout</a>
			@else
			<a type="button" href="{{route('loginPage')}}" class="btn gothic">Proceed To Checkout</a>
			
			@endif
			@endif
             
            </div>
          </div>
        </div>
      </div>
    </section>


@endsection