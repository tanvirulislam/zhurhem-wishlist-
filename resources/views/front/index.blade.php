@extends('front.master.master')


@section('title')
Zurhem
@endsection

@section('body')

@include('front.include.banner')

<!-- Category Section Start  -->
    <!-- Category Section Start  -->
    <!-- Category Section Start  -->
    <!-- Category Section Start  -->
    <!-- Category Section Start  -->
    <section id="category-section">
      <div class="category-container">
        <div class="category-card">
          <img
            src="{{asset('/')}}public/front/img/efb92103972aff2a1ce663eccbc89f0a--beauty-studio-fashion-men.jpg"
            alt=""
          />
          <div class="category-bottom">
            <h1>Men</h1>
            <a href="{{route('category', 'men')}}" class="btn">view collection</a>
          </div>
        </div>
        <div class="category-card">
          <img src="{{asset('/')}}public/front/img/Artboard 33.png" alt="" />
          <div class="category-bottom">
            <h1>women</h1>
            <a href="{{route('category', 'women')}}" class="btn">view collection</a>
          </div>
        </div>
        <div class="category-card">
          <img
            src="{{asset('/')}}public/front/img/the-creative-exchange-k502bjvxqHI-unsplash.png"
            alt=""
          />
          <div class="category-bottom">
            <h1>gifts</h1>
            <a href="{{route('category', 'gifts')}}" class="btn">view collection</a>
          </div>
        </div>
      </div>
      <!-- Category Section Mobile -->
      <!-- Category Section Mobile -->
      <!-- Category Section Mobile -->
      <!-- Category Section Mobile -->
      <!-- Category Section Mobile -->
      <div class="slider-wrapper">
        <div class="glide" id="glide_3">
          <div class="glide__track" data-glide-el="track">
            <ul class="glide__slides">
              <li class="glide__slide slider-li">
                <div class="category-container-slider">
                  <div class="category-card">
                    <img
                      src="{{asset('/')}}public/front/img/efb92103972aff2a1ce663eccbc89f0a--beauty-studio-fashion-men.jpg"
                      alt=""
                    />
                    <div class="category-bottom">
                      <h1>Men</h1>
                      <a href="{{route('category', 'men')}}" class="btn">view collection</a>
                    </div>
                  </div>
                </div>
              </li>
              <li class="glide__slide">
                <div class="category-container-slider">
                  <div class="category-card">
                    <img src="{{asset('/')}}public/front/img/Artboard 33.png" alt="" />
                    <div class="category-bottom">
                      <h1>women</h1>
                      <a href="{{route('category', 'women')}}" class="btn">view collection</a>
                    </div>
                  </div>
                </div>
              </li>
              <li class="glide__slide">
                <div class="category-container-slider">
                  <div class="category-card">
                    <img
                      src="{{asset('/')}}public/front/img/the-creative-exchange-k502bjvxqHI-unsplash.png"
                      alt=""
                    />
                    <div class="category-bottom">
                      <h1>gifts</h1>
                      <a href="{{route('category', 'gifts')}}" class="btn">view collection</a>
                    </div>
                  </div>
                </div>
              </li>
            </ul>
          </div>
          <div class="glide__arrows" data-glide-el="controls">
            <button class="glide__arrow glide__arrow--left" data-glide-dir="<">
              <div class="arrow-background">
                <img src="{{asset('/')}}public/front/img/Arrow-left.png" alt="" />
              </div>
            </button>
            <button class="glide__arrow glide__arrow--right" data-glide-dir=">">
              <div class="arrow-background">
                <img src="{{asset('/')}}public/front/img/Arrow-right.png" alt="" />
              </div>
            </button>
          </div>
        </div>
      </div>
      <!-- Category Section Mobile -->
      <!-- Category Section Mobile -->
      <!-- Category Section Mobile -->
      <!-- Category Section Mobile -->
      <!-- Category Section Mobile -->
    </section>
    <!-- Category Section End -->
    <!-- Category Section End -->
    <!-- Category Section End -->
    <!-- Category Section End -->
    <!-- Category Section End -->

    <!-- Bespoke Section Start -->
    <!-- Bespoke Section Start -->
    <!-- Bespoke Section Start -->
    <!-- Bespoke Section Start -->
    <!-- Bespoke Section Start -->
    <section id="bospoke">
      <img id="bospoke-img-1" src="{{asset('/')}}public/front/img/featured-canali_807.jpg" alt="" />
      <img
        id="bospoke-img-2"
        src="{{asset('/')}}public/front/img/149229024_3608199142629042_7489442026463058739_n.png"
        alt=""
      />
      <div class="bospoke-div">
        <h1>Zurhem bespoke</h1>
        <p>customise your look</p>
        <a href="#" class="btn">Design now</a>
      </div>
    </section>
    <!-- Bespoke Section End -->
    <!-- Bespoke Section End -->
    <!-- Bespoke Section End -->
    <!-- Bespoke Section End -->
    <!-- Bespoke Section End -->

    <!-- Featured Products Section with Slider Start -->
    <!-- Featured Products Section with Slider Start -->
    <!-- Featured Products Section with Slider Start -->
    <!-- Featured Products Section with Slider Start -->
    <!-- Featured Products Section with Slider Start -->
    <!-- Featured Products Section with Slider Start -->
    <section class="section latest__products" id="latest">
      <div class="title__container">
        <div class="section__title active" data-id="Latest Products">
          <!-- <span class="dot"></span> -->
          <h1 class="primary__title">Featured products</h1>
          <!-- <p>12 Items</p> -->
        </div>
      </div>
      <!-- <div class="container"> -->
      <!--  -->
      <div class="glide" id="glide_2">
        <div class="glide__track" data-glide-el="track">
           <ul class="glide__slides latest-center">
           @foreach($feature_product as $feature_product)
            <li class="glide__slide">
              <div class="product">
                <div class="product__header">
                  <img src="{{asset('/')}}{{$feature_product->image}}" alt="" />
                </div>
                <div class="product__footer">
                  <h3>{{$feature_product->name}}</h3>
                 
                  <div class="product__price">
                    <h4>{{$feature_product->price}}</h4>
                    
                  </div>
                  
                </div>
              </div>
            </li>
            @endforeach
          </ul>
          
        </div>

        <div class="glide__arrows" data-glide-el="controls">
          <button class="glide__arrow glide__arrow--left" data-glide-dir="<">
            <div class="arrow-background">
              <img src="{{asset('/')}}public/front/img/Arrow-left.png" alt="" />
            </div>
          </button>
          <button class="glide__arrow glide__arrow--right" data-glide-dir=">">
            <div class="arrow-background">
              <img src="{{asset('/')}}public/front/img/Arrow-right.png" alt="" />
            </div>
          </button>
        </div>
      </div>
      <!-- </div> -->
    </section>
    <!-- Featured Products Section with Slider End -->
    <!-- Featured Products Section with Slider End -->
    <!-- Featured Products Section with Slider End -->
    <!-- Featured Products Section with Slider End -->
    <!-- Featured Products Section with Slider End -->
    <!-- Featured Products Section with Slider End -->
@endsection