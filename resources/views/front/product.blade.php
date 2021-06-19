@extends('front.master.master')


@section('title')
Product Detail
@endsection


@section('css')
<link rel="stylesheet" href="{{asset('/')}}public/front/css/product-category.css" />
<link rel="stylesheet" href="{{asset('/')}}public/front/css/product-details.css" />
@endsection


@section('body')

<!-- product-details for desktop start -->
<!-- product-details for desktop start -->
<!-- product-details for desktop start -->
<!-- product-details for desktop start -->
<!-- product-details for desktop start -->
<!-- product-details for desktop start -->
<section class="desktop" id="product-details">
  <div class="product-details-container">
    <div class="product-details-pics">
      <div class="page-location">
        <p>
          {{$main_cat_name_value}} > {{$main_subcat_name_value}} > {{$product_detail->name}}
        </p>
      </div>

      @foreach($image as $size)
      @if($size->product_id == $product_detail->id)
      <img src="{{asset('/')}}{{$size->image}}" alt="image" />
      @endif
      @endforeach
<!-- 
          <img src="{{asset('/')}}public/front/img/products/cloths/DSCF6869.jpg" alt="" />
          <img src="{{asset('/')}}public/front/img/products/cloths/DSCF6872.jpg" alt="" />
          <img src="{{asset('/')}}public/front/img/products/cloths/DSCF6873.jpg" alt="" />
        -->
      </div>
      <div class="product-details">
        <div class="details-container">
          <h1>{{$product_detail->name}}</h1>
          <div class="price-div">
            <div class="composition"><p>{{$product_detail->cloth_name}}</p></div>
            <div class="price">$ {{$product_detail->price}}</div>
            <div class="availability"><p>
              @if($product_detail->status == 1)
              Available
              @else
              Not available
              @endif
            </p></div>
          </div>
          <p class="details-paragraph">
           {!!$product_detail->desc!!}
         </p>
         <form action="{{ route('cart.store') }}" method="POST">
          {{ csrf_field() }}
          <div class="select-wrapper">
            <select name="size" class="size-select gothic" placeholder="selcet size">
              @foreach($product_size as $size)
              @if($size->product_id == $product_detail->id)
              <option value="{{$size->size}}">{{$size->size}}</option>
              @endif
              @endforeach
            </select>
            <img src="{{asset('/')}}public/front/img/Arrow-up-black.png" alt="" />
          </div>
          <br>
          
          <input type="hidden" value="{{ $product_detail->id }}" id="id" name="id">
          <input type="hidden" value="{{ $product_detail->name }}" id="name" name="name">
          <input type="hidden" value="{{ $product_detail->price }}" id="price" name="price">
          <input type="hidden" value="{{ $product_detail->image }}" id="img" name="img">
          <!-- <input type="hidden" value="{{ $product_detail->size }}" id="size" name="size"> -->
          
          <input type="hidden" id="quantity" name="quantity" class="quantity form-control input-number" value="1" min="1" max="100">

          <button style="border: 1px solid; border-radius: 20px; padding: 6px 125px;" class="btn gothic">Add to Bag</button>
        </form>
        <!-- <a href="#" class=""></a> -->

        <div class="details-dropdown details-dropdown1">
          <div class="details-button">
            <p>details & care</p>
            <img src="{{asset('/')}}public/front/img/Arrow-up-black.png" alt="" />
          </div>
          <div class="dropdown2">
            <ul>
              @foreach($detail_care as $size)
              @if($size->product_id == $product_detail->id)
              <li>{!!$size->detail_and_care!!}</li>
              @endif
              @endforeach
              
            </ul>
          </div>
        </div>
        <div class="details-dropdown details-dropdown2">
          <div class="details-button">
            <p>size & fit</p>
            <img src="{{asset('/')}}public/front/img/Arrow-up-black.png" alt="" />
          </div>
          <div class="dropdown2">
            <ul>
              @foreach($size_fit as $size)
              @if($size->product_id == $product_detail->id)
              <li>{!!$size->size_and_fit!!}</li>
              @endif
              @endforeach
            </ul>
          </div>
        </div>
        <div class="details-dropdown details-dropdown3">
          <div class="details-button">
            <p>features</p>
            <img src="{{asset('/')}}public/front/img/Arrow-up-black.png" alt="" />
          </div>
          <div class="dropdown2">
            
           @foreach($feature as $size)
           @if($size->product_id == $product_detail->id)
           <li>{!!$size->feature!!}</li>
           @endif
           @endforeach

         </div>
       </div>
     </div>
   </div>
 </div>
</section>
<!-- product-details for desktop end -->
<!-- product-details for desktop end -->
<!-- product-details for desktop end -->
<!-- product-details for desktop end -->
<!-- product-details for desktop end -->
<!-- product-details for desktop end -->
<!-- product-details for desktop end -->

<section class="mobile product-details-mobile">
  <div class="product-details-slider">
    <div class="glide" id="glide_8">
      <div class="glide__track" data-glide-el="track">
        <ul class="glide__slides">
          @foreach($image as $size)
          @if($size->product_id == $product_detail->id)
          <li class="glide__slide">
            <img src="{{asset('/')}}{{$size->image}}" alt="image" />
          </li>
          @endif
          @endforeach
        </ul>
      </div>
      <div class="glide__bullets" data-glide-el="controls[nav]">
        <button class="glide__bullet" data-glide-dir="=0"></button>
        <button class="glide__bullet" data-glide-dir="=1"></button>
        <button class="glide__bullet" data-glide-dir="=2"></button>
        <button class="glide__bullet" data-glide-dir="=3"></button>
      </div>
    </div>
  </div>
  <div class="details-container-mobile">
    <h1>{{$product_detail->name}}</h1>
    <p>$ {{$product_detail->price}}</p>
    <div class="select-wrapper">
      <select name="size" class="size-select gothic" placeholder="selcet size">
        @foreach($product_size as $size)
        @if($size->product_id == $product_detail->id)
        <option value="{{$size->size}}">{{$size->size}}</option>
        @endif
        @endforeach
      </select>
      <img src="{{asset('/')}}public/front/img/Arrow-up-black.png" alt="" />
    </div>
    
    
   <form class="product-mobile-form" action="{{ route('cart.store') }}" method="POST">
      {{ csrf_field() }}
      <input type="hidden" value="{{ $product_detail->id }}" id="id" name="id">
      <input type="hidden" value="{{ $product_detail->name }}" id="name" name="name">
      <input type="hidden" value="{{ $product_detail->price }}" id="price" name="price">
      <input type="hidden" value="{{ $product_detail->image }}" id="img" name="img">
      
      <input type="hidden" id="quantity" name="quantity" class="quantity form-control input-number" value="1" min="1" max="100">

      <button  class="add-to-bag">Add to Bag</button>
    </form>
    
    
  </div>
  <div class="wish-share">
    <div class="wish-share-left">
      <img src="{{asset('/')}}public/front/img/heart-black.png" alt="" />
      <p class="gothic">add to wishlist</p>
    </div>
    <div class="wish-share-right">
      <img src="{{asset('/')}}public/front/img/share.png" alt="" />
      <p class="gothic">share</p>
    </div>
  </div>
  <div class="product-collage">
    @foreach($image as $size)
    @if($size->product_id == $product_detail->id)
    <div class="collage-img">
      <img src="{{asset('/')}}{{$size->image}}" alt="image" />

    </div>
    @endif
    @endforeach
    
    
  </div>
  <div class="product-details">
    <div class="details-container-mobile">
      <p class="details-paragraph">
        {!!$product_detail->desc!!}
      </p>
      <div class="details-dropdown mobile-details-dropdown1">
        <div class="details-button">
          <p>details & care</p>
          <img src="{{asset('/')}}public/front/img/Arrow-up-black.png" alt="" />
        </div>
        <div class="dropdown2">
          <ul>
            @foreach($detail_care as $size)
            @if($size->product_id == $product_detail->id)
            <li>{!!$size->detail_and_care!!}</li>
            @endif
            @endforeach
          </ul>
        </div>
      </div>
      <div class="details-dropdown mobile-details-dropdown2">
        <div class="details-button">
          <p>size & fit</p>
          <img src="{{asset('/')}}public/front/img/Arrow-up-black.png" alt="" />
        </div>
        <div class="dropdown2">
          <ul>
            @foreach($size_fit as $size)
            @if($size->product_id == $product_detail->id)
            <li>{!!$size->size_and_fit!!}</li>
            @endif
            @endforeach
          </ul>
        </div>
      </div>
      <div class="details-dropdown mobile-details-dropdown3">
        <div class="details-button">
          <p>features</p>
          <img src="{{asset('/')}}public/front/img/Arrow-up-black.png" alt="" />
        </div>
        <div class="dropdown2">
         <ul>
          @foreach($feature as $size)
          @if($size->product_id == $product_detail->id)
          <li>{!!$size->feature!!}</li>
          @endif
          @endforeach
        </ul>
        
      </div>
    </div>
  </div>
</div>
</section>

<div class="hr desktop">
  <div class="hr-line"></div>
</div>

<section id="complete-look" class="desktop">
  <div class="container">
    <div class="complete-look-header">
      <h1>to complete this look</h1>
    </div>
    <div class="complete-look-container">
      <div class="complete-look-divs">
        <img src="{{asset('/')}}public/front/img/products/cloths/DSCF7011.jpg" alt="" />
      </div>
      <div class="complete-look-divs grid-div">
        <div class="complete-look-div">
          <img src="{{asset('/')}}public/front/img/CROSS.png" alt="" />
        </div>
        <div class="complete-look-div">
          <img src="{{asset('/')}}public/front/img/CROSS.png" alt="" />
        </div>
        <div class="complete-look-div">
          <img src="{{asset('/')}}public/front/img/CROSS.png" alt="" />
        </div>
        <div class="complete-look-div">
          <img src="{{asset('/')}}public/front/img/CROSS.png" alt="" />
        </div>
      </div>
    </div>
  </div>
</section>

<section class="mobile mobile-complete-look">
  <div class="complete-look-header">
    <h1>to complete this look</h1>
  </div>
  <div class="mobile-complete-look-container">
    <div class="mobile-complete-look-div">
      <a href="#"
      ><img src="{{asset('/')}}public/front/img/products/cloths/DSCF7011.jpg" alt=""
      /></a>
    </div>
    <div class="mobile-complete-look-div">
      <a href="#"
      ><img src="{{asset('/')}}public/front/img/products/cloths/DSCF7011.jpg" alt=""
      /></a>
    </div>
  </div>
</section>

<section class="mobile mobile-complete-look">
  <div class="complete-look-header">
    <h1>you may also like</h1>
  </div>
  <div class="mobile-complete-look-container">
    @foreach($random_product as $random)
    <div class="mobile-complete-look-div">
      <a href="{{route('product', $random->product_slug)}}"
        ><img src="{{asset('/')}}{{$random->image}}" alt=""
        /></a>
      </div>
      @endforeach
      
    </div>
  </section>

  <section class="mobile mobile-complete-look">
    <div class="complete-look-header">
      <h1>recently viewed</h1>
    </div>
    <div class="mobile-complete-look-container">
      <div class="mobile-complete-look-div">
        <a href="#"
        ><img src="{{asset('/')}}public/front/img/products/cloths/DSCF7011.jpg" alt=""
        /></a>
      </div>
      <div class="mobile-complete-look-div">
        <a href="#"
        ><img src="{{asset('/')}}public/front/img/products/cloths/DSCF7011.jpg" alt=""
        /></a>
      </div>
    </div>
  </section>

  <div class="hr desktop">
    <div class="hr-line"></div>
  </div>

    <!-- <section id="wish-section">
      <div class="complete-look-header">
        <h1>you may also like</h1>
      </div>
      <div class="complete-look-container">
        <div class="complete-look-divs also-like-div">
          <img src="./img/products/cloths/DSCF7011.jpg" alt="" />
          <div class="wish-section-button">
            <a href="#">Add to Bag</a>
          </div>
          <img class="heart-img" src="./img/heart-black.png" alt="" />
        </div>
        <div class="complete-look-divs also-like-div">
          <img src="./img/products/cloths/DSCF7011.jpg" alt="" />
          <div class="wish-section-button">
            <a href="#">Add to Bag</a>
          </div>
          <img class="heart-img" src="./img/heart-black.png" alt="" />
        </div>
      </div>
    </section> -->

    <section id="products" class="desktop">
      <div class="complete-look-header">
        <h1>you may also like</h1>
      </div>
      <div class="product-container">
        @foreach($random_product as $random)
        <div class="product-div">
          <div class="product-img">
            <a class="img-link" href="{{route('product', $random->product_slug)}}">
              <img src="{{asset('/')}}{{$random->image}}" alt="image" /></a>
              <!-- <a class="add-to-bag" href="product-details.html">add to bag</a> -->

              <form class="category-form" action="{{ route('cart.store') }}" method="POST">
                {{ csrf_field() }}
                <input type="hidden" value="{{ $random->id }}" id="id" name="id">
                <input type="hidden" value="{{ $random->name }}" id="name" name="name">
                <input type="hidden" value="{{ $random->price }}" id="price" name="price">
                <input type="hidden" value="{{ $random->image }}" id="img" name="img">
                
                <input type="hidden" id="quantity" name="quantity" class="quantity form-control input-number" value="1" min="1" max="100">

                <button class="add-to-bag respos_btn">Add to Bag</button>
              </form>

<a class="wish-link" href=""> <img class="heart-black" src="{{asset('/')}}public/front/img/heart-black.png" alt="" /></a>
              

            </div>
            <div class="product-div-bottom">
              <p>{{$random->name}}</p>
              <p>$ {{$random->price}}</p>
            </div>
          </div>
          @endforeach
          
        </div>
      </section>

      <div class="hr desktop">
        <div class="hr-line"></div>
      </div>

      <section id="recently-viewed" class="desktop">
        <div class="container">
          <div class="complete-look-header">
            <h1>recently viewed</h1>
          </div>
          <div class="complete-look-container">
            <div class="complete-look-divs">
              <img src="{{asset('/')}}public/front/img/products/cloths/DSCF7011.jpg" alt="" />
            </div>
            <div class="complete-look-divs grid-div">
              <div class="complete-look-div">
                <img src="{{asset('/')}}public/front/img/CROSS.png" alt="" />
              </div>
              <div class="complete-look-div">
                <img src="{{asset('/')}}public/front/img/CROSS.png" alt="" />
              </div>
              <div class="complete-look-div">
                <img src="{{asset('/')}}public/front/img/CROSS.png" alt="" />
              </div>
              <div class="complete-look-div">
                <img src="{{asset('/')}}public/front/img/CROSS.png" alt="" />
              </div>
            </div>
          </div>
        </div>
      </section>
      @endsection