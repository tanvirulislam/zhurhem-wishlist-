@extends('admin.master.master')
@section('title')
Product
@endsection

@section('body')
<section class="content">
<div class="row">
    <div class="col-md-4">
      <div class="card">
        <div class="card-header">
          Name
        </div>
        <div class="card-body">
            {{$product->name}}  
        </div>
      </div>
    </div>

    <div class="col-md-4">
      <div class="card">
        <div class="card-header">
          Category
        </div>
        <div class="card-body">
            {{$product->category_slug}}  

        </div>
      </div>
    </div>

    <div class="col-md-4">
      <div class="card">
        <div class="card-header">
          Subcategory
        </div>
        <div class="card-body">
            {{$product->subcategory_slug}}  

        </div>
      </div>
    </div>
  </div>
  
  <div class="row">
    <div class="col-md-3">
      <div class="card">
        <div class="card-header">
          Stock&nbsp;&nbsp; <a href="{{route('admin.product.stock_edit', $id)}}"><button type="button" class="btn btn-primary">Edit</button></a>
        </div>
        <div class="card-body">
        @foreach($stock as $size)
            {{ $size->stock }}
            @endforeach
        </div>
      </div>
    </div>

    <div class="col-md-3">
      <div class="card">
        <div class="card-header">
          Price
        </div>
        <div class="card-body">
            {{$product->price}}  

        </div>
      </div>
    </div>

    <div class="col-md-3">
      <div class="card">
        <div class="card-header">
          Cloth name
        </div>
        <div class="card-body">
            {{$product->cloth_name}}  

        </div>
      </div>
    </div>

    <div class="col-md-3">
      <div class="card">
        <div class="card-header">
          Size &nbsp;&nbsp; <a href="{{route('admin.product.size_edit', $id)}}"><button type="button" class="btn btn-primary">Edit</button></a>
        </div>
        <div class="card-body">
            @foreach($product_size as $size)
            {{ $size->size }}
            @endforeach
       
        </div>
      </div>
    </div>

  </div>

  <div class="row">
    <div class="col-md-6">
      <div class="card">
        <div class="card-header">
          Description
        </div>
        <div class="card-body">
           
           
            {!! $product->desc !!}
            
            
        </div>
      </div>
    </div>
    <div class="col-md-6">
      <div class="card">
        <div class="card-header">
          Detail and Care&nbsp;&nbsp; <a href="{{route('admin.product.detail_care_edit', $id)}}"><button type="button" class="btn btn-primary">Edit</button></a>
        </div>
        <div class="card-body">
           
            @foreach($detail_care as $size)
            <li>{{ $size->detail_and_care }}</li>
            @endforeach
            
        </div>
      </div>
    </div>
  </div>

  <div class="row">
    <div class="col-md-6">
      <div class="card">
        <div class="card-header">
          Size and Fit&nbsp;&nbsp; <a href="{{route('admin.product.size_fit_edit', $id)}}"><button type="button" class="btn btn-primary">Edit</button></a>
        </div>
        <div class="card-body">
           
           
            @foreach($size_fit as $size)
            <li>{{ $size->size_and_fit }}</li>
            @endforeach
            
            
        </div>
      </div>
    </div>
    <div class="col-md-6">
      <div class="card">
        <div class="card-header">
        Feature&nbsp;&nbsp; <a href="{{route('admin.product.feature_edit', $id)}}"><button type="button" class="btn btn-primary">Edit</button></a>
        </div>
        <div class="card-body">
           
            @foreach($feature as $size)
            {!! $size->feature !!}
            @endforeach
            
        </div>
      </div>
    </div>
  </div>

  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
         Photo&nbsp;&nbsp; <a href="{{route('admin.product.image_edit', $id)}}"><button type="button" class="btn btn-primary">Edit</button></a>
       </div>
       <div class="card-body">
         
        <div class="row">
          @foreach($image as $size)
          <div class="col-md-3">
            <img src="{{asset('/')}}{{ $size->image }}" width="170px" height="170px">
          </div>
          @endforeach
        </div>
      </div>
      
    </div>
  </div>
</div>


</section>
@endsection
