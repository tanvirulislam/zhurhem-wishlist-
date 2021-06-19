@extends('front.master.master')


@section('title')
Category
@endsection


@section('css')
<link rel="stylesheet" href="{{asset('/')}}public/front/css/product-category.css" />
<style type="text/css">

</style>
@endsection


@section('body')

<?php use App\Product; ?>

<section id="filter">
      <div class="container">
        <div class="filter-div">
          <div class="all-filters filter">
            <!-- <p>all filters</p> -->
            <p>filters</p>
          </div>
          <div class="filter">
            <p>size</p>
          </div>
          @foreach($subcategory_list as $subcat)
          <div class="filter">
            <!-- <p>fit</p> -->
            <a style="color:black" href="{{route('subcategory', $subcat->subcategory_slug)}}">{{$subcat->name}}</a>
          </div>
          @endforeach
          
          <div class="filter sort-by">
            <p>sort by</p>
            <img src="{{asset('/')}}public/front/img/Arrow-down-grey.png" alt="" />
          </div>
        </div>
      </div>
    </section>

    <section id="products">
      <div class="product-container">
        @foreach($product_list as $productnew)
        <div class="product-div">
          <div class="product-img">
           
            <a class="img-link" href="{{route('product', $productnew->product_slug)}}"><img src="{{asset('/')}}{{$productnew->image}}" alt="image" /></a>
           
            <!-- <a class="add-to-bag" href="product-details.html">add to bag</a> -->
            <form class="category-form" action="{{ route('cart.store') }}" method="POST">
												{{ csrf_field() }}

                       
												<input type="hidden" value="s" id="size" name="size">


												<input type="hidden" value="{{ $productnew->id }}" id="id" name="id">
												<input type="hidden" value="{{ $productnew->name }}" id="name" name="name">
												<input type="hidden" value="{{ $productnew->price }}" id="price" name="price">
												<input type="hidden" value="{{ $productnew->image }}" id="img" name="img">
												
												<input type="hidden" id="quantity" name="quantity" class="quantity form-control input-number" value="1" min="1" max="100">

												<button class="add-to-bag respos_btn">Add to Bag</button>
							</form>

          <a class="wish-link" href="{{route('wishlist', $productnew->product_slug)}}"><img class="heart-black" src="{{asset('/')}}public/front/img/heart-black.png" alt="" /></a>
            
          </div>
          <div class="product-div-bottom">
            <?php $getCurrencyRates = Product::getCurrencyRates($productnew->price); ?>

            <p>BDT {{$productnew->price}}</p>
            <p>USD {{$getCurrencyRates['USD_Rate']}}</p>
            <p>EURO {{$getCurrencyRates['EURO_Rate']}}</p>

          </div>
        </div>
        @endforeach
       
      </div>

    </section>

@endsection


@section('script')
Category
@endsection