@extends('front.master.master')
@section('title')
Success   
@endsection

@section('body')

    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section set-bg" data-setbg="{{ asset('/') }}public/front/img/breadcrumb.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Puritee</h2>
                        <div class="breadcrumb__option">
                            <a href="{{ route('index') }}">Home</a>
                            <span>Success</span>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->
       <!--================Contact Area =================-->
        <section class="product spad">
            <div class="container">
                <div class="row">
                  <div class="col-md-12">
                  <h2>Your OrderId Is <b style="color:#a91515ed">{{ $pinNum->pin }}  </b></h2>
                   </div>    
                </div> <br>
                 <div class="row">
                  <div class="col-md-12">
                     <a href="{{ route('index') }}" class="btn btn-info">Continue Shopping</a>
                   </div>    
                </div>
            </div>
        </section>
        <!--================End Contact Area =================-->
         

@endsection