@extends('front.master.master')
@section('title')
Shipping Information
@endsection

@section('body')
<section id="products" style="background:white;color:black">
	<div   class="product-container" style="display: block; background:white
    height: auto;overflow:hidden">
    
    <div class="shipping_title">
        <center><h3 style="padding-top:12px;color:red;" class="">Add Delivery Address</h3></center>

    </div>
    <br>
    <center>
    <div class="shipping" style="width: 440px;">
        <form method="POST" action="{{ route('shipping.store') }}">
        @csrf
                    
        <div class="from_group">
        <label style="color:black;" for="email" class="shipping_label">Name</label>

        <div class="name">
            <input id="email" type="text" class="form_control" name="name" value="" required autocomplete="email">
        </div>
        </div>

        <div class="from_group">
        <label style="color:black;" for="email" class="shipping_label">Phone</label>

        <div class="name">
            <input id="email" type="text" class="form_control" name="phone" value="" required autocomplete="email">
        </div>
        </div>
        <div class="from_group">
        <label style="color:black;" for="email" class="shipping_label">Email</label>

        <div class="name">
            <input id="email" type="text" class="form_control" name="email" value="" required autocomplete="email">
        </div>
        </div>

        <div class="from_group">
        <label style="color:black;" for="email" class="shipping_label">Address</label>

        <div class="name">
            <input id="email" type="text" class="form_control" name="address" value="" required autocomplete="email">
        </div>
        </div>

        <div class="from_group">
        <label style="color:black;" for="email" class="shipping_label">Any message</label>

        <div class="name">

        <textarea class="form_control" name="msg" placeholder="Type Here If You Have Any Message" required></textarea>

        </div>

        </div>

        <div class="from_group">
        <button type="submit" class="btn gothic cart_btn">Submit</button>

        </div>

        </form>
    </div>
    </center>

    </div>
</section>








@endsection