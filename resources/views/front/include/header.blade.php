<!-- Desktop Navbar Start -->
    <!-- Desktop Navbar Start -->
    <!-- Desktop Navbar Start -->
    <!-- Desktop Navbar Start -->
    <!-- Desktop Navbar Start -->
    <nav id="nav">
      <div class="container top-section">
        <div class="main-nav">
          <!-- <div class="nav__hamburger">
            <i class="fas fa-bars"></i>
          </div> -->
          <div class="nav-normal">
            <ul class="nav-list nav-left">
              <li><a href="#">atelier</a></li>
              <li><a href="#">customer service</a></li>
              <li class="dropdown">
                <a class="dropdown-button currency" href="#">currency</a
                ><!-- &#709; -->
                <div class="dropdown-content">
                  <a href="#">$ USD</a>
                  <a href="#">&#8364; EURO</a>
                  <a href="#">৳ BDT</a>
                 
                </div>
              </li>
            </ul>
            <div class="logo">
              <a href="{{route('index')}}"><img src="{{asset('/')}}public/front/img/logo-letter.png" alt="" /></a>
            </div>
            <ul class="nav-list nav-right">
              <li>
                @if(Auth::check() && Auth::user()->role_id == 2)
                <a href="{{route('customer_dashoard')}}"><img src="{{asset('/')}}public/front/img/user.png" alt="" /></a>

                @else
                <a href="{{route('customer_dashoard.login')}}"><img src="{{asset('/')}}public/front/img/user.png" alt="" /></a>
                @endif
              </li>
              <li class="cart-img">
                <a href="{{route('wishlist_detail')}}"><img src="{{asset('/')}}public/front/img/heart.png" alt="" /></a>
                &nbsp;<b class="item-counter"><sup>{{ $wishlist}}</sup></b>

              </li>
              <li class="cart-img">
                
                <a style="" href="{{route('cart.index')}}"><img src="{{asset('/')}}public/front/img/shopping-bag.png" alt="" /></a>
                &nbsp;<b class="item-counter"><sup>{{ Cart::getContent()->count()}}</sup></b>
              </li>
              <li class="search-container">
                <input
                  type="text" placeholder="What are you looking for?" name="search" />
                <button type="submit">
                  <img src="{{asset('/')}}public/front/img/searching.png" alt="" />
                </button>
              </li>
            </ul>
          </div>
        </div>
        <div class="nav-normal-bottom">
          <ul class="nav-list nav-bottom">
            @foreach($category as $cat)
            <li><a href="{{route('category', $cat->category_slug)}}">{{$cat->name}}</a></li>
            @endforeach
          </ul>
        </div>
      </div>
    </nav>
    <!-- Desktop Navbar End -->
    <!-- Desktop Navbar End -->
    <!-- Desktop Navbar End -->
    <!-- Desktop Navbar End -->
    <!-- Desktop Navbar End -->

    <!-- Mobile Hamburger Menu Start -->
    <!-- Mobile Hamburger Menu Start -->
    <!-- Mobile Hamburger Menu Start -->
    <!-- Mobile Hamburger Menu Start -->
    <!-- Mobile Hamburger Menu Start -->
    <div class="hamburger-menu">
      <div class="hamburger-top">
        <img
          class="hamburger-nav-icon hamburger-nav-shoppingbag"
          src="{{asset('/')}}public/front/img/BAG-ICON.png"
          alt=""
        />
        <a href="{{route('index')}}"><img class="hamburger-nav-logo" src="{{asset('/')}}public/front/img/logo-letter.png" alt="" /></a>
        <img
          class="hamburger-nav-icon close__toggle"
          src="{{asset('/')}}public/front/img/CROSS.png"
          alt=""
        />
      </div>
      <div class="hamburger-search-container">
        <div class="search-container">
          <input
            type="text"
            placeholder="What are you looking for?"
            name="search"
          />
          <button type="submit">
            <img src="{{asset('/')}}public/front/img/searching.png" alt="" />
          </button>
        </div>
      </div>
      <div class="hamburger-slider">
        <div class="glide" id="glide-6">
          <div class="glide__track" data-glide-el="track">
            <ul class="glide__slides">
            @foreach($category as $cat)
              <li class="glide__slide"><a href="{{route('category', $cat->category_slug)}}">{{$cat->name}}</a></li>
              @endforeach
            </ul>
          </div>
        </div>
      </div>
      <div class="hamburger-category">
        <ul class="hamburger-category-list">
          <a href=""
            ><li id="men-all" class="hamburger-category-list-item">
              all categories
            </li></a
          >
          <a href="#"
            ><li id="suit" class="hamburger-category-list-item">
              {{$subcategory_first->name}} <img src="{{asset('/')}}public/front/img/Arrow-down-grey.png" alt="" /></li
          ></a>
          <div class="category-dropdown category-dropdown-suit">
            @foreach($product as $productone)
            @if($productone->subcategory_slug == $productone->subcategory_slug)
            <a href="{{route('product', $productone->product_slug)}}"><li class="hamburger-category-list-item">{{$productone->name}}</li></a>
            @endif
           @endforeach
          </div>

          <a href="#"><li id="jacket" class="hamburger-category-list-item">
            {{$subcategory_second->name}} <img src="{{asset('/')}}public/front/img/Arrow-down-grey.png" alt="" /></li
          ></a>
          <div class="category-dropdown category-dropdown-jacket">
          @foreach($product as $producttwo)
            @if($producttwo->subcategory_slug == $subcategory_second->subcategory_slug)
            <a href="{{route('product', $producttwo->product_slug)}}"><li class="hamburger-category-list-item">{{$producttwo->name}}</li></a>
            @endif
           @endforeach
          </div>
          <a href="#"
            ><li id="tuxedo" class="hamburger-category-list-item">
            {{$subcategory_third->name}} <img src="{{asset('/')}}public/front/img/Arrow-down-grey.png" alt="" /></li
          ></a>
          <div class="category-dropdown category-dropdown-tuxedo">
          @foreach($product as $products)
            @if($products->subcategory_slug == $products->subcategory_slug)
            <a href="{{route('product', $productone->product_slug)}}"
              ><li class="hamburger-category-list-item">{{$products->name}}</li></a
            >
            @endif
           @endforeach
          </div>
        </ul>
      </div>
      <div class="hamburger-bg-color">
        <div class="hamburger-user">
          <ul class="hamburger-user-list">
            <a href="#"
              ><li class="hamburger-user-list-item">
                <img src="{{asset('/')}}public/front/img/user.png" alt="" /> my account
              </li></a
            >
            <a href="#"
              ><li class="hamburger-user-list-item">
                <img src="{{asset('/')}}public/front/img/heart.png" alt="" />
                <b class="item-counter"><sup>{{ $wishlist}}</sup></b>
                &nbsp;
                wish list
              </li>
              </a
            >
            <a href="#"
              ><li class="hamburger-user-list-item locator-icon">
                <img src="{{asset('/')}}public/front/img/LOCATION-ICON.png" alt="" /> atelier locator 
              </li></a
            >
          </ul>
        </div>
        <div class="hamburger-currency hamburger-search-container">
          <div class="search-container currency-container">
            <input type="text" placeholder="Currency" name="search" />
            <button type="submit">
              <i class="fas fa-chevron-down"></i>
            </button>
          </div>
        </div>
      </div>
    </div>
    <!-- Mobile Hamburger Menu End -->
    <!-- Mobile Hamburger Menu End -->
    <!-- Mobile Hamburger Menu End -->
    <!-- Mobile Hamburger Menu End -->
    <!-- Mobile Hamburger Menu End -->

    <!-- Section Not Needed -->
    <!-- Section Not Needed -->
    <!-- Section Not Needed -->
    <!-- Section Not Needed -->
    <!-- Section Not Needed -->
    <!-- <div class="hamburger-category-menu">
      <div class="hamburger-top">
        <img
          class="hamburger-nav-icon hamburger-nav-shoppingbag"
          src="./img/BAG-ICON.png"
          alt=""
        />
        <img class="hamburger-nav-logo" src="./img/logo-letter.png" alt="" />
        <img
          class="hamburger-nav-icon category-close-toggle"
          src="./img/CROSS.png"
          alt=""
        />
      </div>
      <div class="hamburger-search-container">
        <div class="search-container">
          <input
            type="text"
            placeholder="What are you looking for?"
            name="search"
          />
          <button type="submit">
            <img src="./img/searching.png" alt="" />
          </button>
        </div>
      </div>
      <div class="hamburger-category-all">
        <ul class="hamburger-category-list">
          <a href="#"
            ><li id="men-all" class="hamburger-category-list-item">
              all category
            </li></a
          >
          <a href="#"><li class="hamburger-category-list-item">suit</li></a>
          <a href="#"><li class="hamburger-category-list-item">Jacket</li></a>
          <a href="#"><li class="hamburger-category-list-item">tuxedo</li></a>
          <a href="#"><li class="hamburger-category-list-item">panjabi</li></a>
          <a href="#"><li class="hamburger-category-list-item">kurti</li></a>
          <a href="#"><li class="hamburger-category-list-item">shoes</li></a>
        </ul>
      </div>
    </div> -->
    <!-- Section Not Needed -->
    <!-- Section Not Needed -->
    <!-- Section Not Needed -->
    <!-- Section Not Needed -->
    <!-- Section Not Needed -->
    <!-- Section Not Needed -->

    <!-- Navbar of Mobile Start -->
    <!-- Navbar of Mobile Start -->
    <!-- Navbar of Mobile Start -->
    <!-- Navbar of Mobile Start -->
    <!-- Navbar of Mobile Start -->
    <!-- Navbar of Mobile Start -->
    <div id="nav-mobile">
      <img class="mobile-nav-icon nav__hamburger"
        src="{{asset('/')}}public/front/img/hamburger.png"
        alt="" />
     <a class="mobile-logo-link" href="{{route('index')}}"><img class="mobile-nav-logo" src="{{asset('/')}}public/front/img/logo-letter.png" alt="image" /></a> 

      <a class="cart-image-link mobile-shopping-cart-link" href="{{route('cart.index')}}"><img class="mobile-nav-icon mobile-nav-shoppingbag" 
      src="{{asset('/')}}public/front/img/shopping-bag.png" alt="" />
    
      <sup class="item-counter2">{{ Cart::getContent()->count()}}</sup>
    </a>
      
    
    </div>
    <!-- Navbar of Mobile End -->
    <!-- Navbar of Mobile End -->
    <!-- Navbar of Mobile End -->
    <!-- Navbar of Mobile End -->
    <!-- Navbar of Mobile End -->