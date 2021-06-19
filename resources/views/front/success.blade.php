@extends('front.master.master')
@section('title')
Success 
@endsection

@section('body')
<section id="products" style="background:white;color:black">
	<div   class="product-container" style="display: block; background:white
    height: auto;overflow:hidden">
        <center>
	<div class="success" style="width: 440px;">
	<br>
	<br>
	<h3 style="text-shadow: 0px 2px 3px #e41e25;">
				Congratulations!!! 
			</h3>
			<h4>
			You have successfully ordered your item.
			</h4>
			<h6>
				Your order id {{$pinNum->pin}}
			</h6>
			<br>
			<br>
			<a href="{{route('index')}}" class="btn gothic cart_btn" title="">Continue shopping</a>
			
	</div>
	</center>	
	<br>

		</div>
		
</section>
@endsection