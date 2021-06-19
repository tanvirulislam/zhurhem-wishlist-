@extends('admin.master.master')
@section('title')
Edit Product
@endsection
@section('body')
<section class="content">
    <div class="container-fluid">
        <div class="row clearfix mt-5">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="card">
                    <div class="header">
                        <h2>Edit Product</h2>
                        
                    </div>
                    <div class="body">
                     <form action="{{ route('admin.product.update') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <input type="hidden" value="{{$product->id}}" class="form-control" id="name" name="id" placeholder="Enter Name">

                        <div class="row">
                            <div class="form-group col-md-6 col-sm-12">
                                <label for="exampleFormControlSelect1"><b>Catagory name</b></label>
                                <select name="category_slug" id="prod_cat_id" class="form-control" id="exampleFormControlSelect1" >
                                    @foreach($category as $catagories)
                                    <option value="{{$catagories->category_slug}}" {{$catagories->category_slug == $product->category_slug ? 'selected' : '' }}>
                                        {{$catagories->name}}
                                    </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-md-6 col-sm-12" id="subcategory">
                                <div class="form-group ">
                                    <label for="name"><b>Subcategory</b></label>
                                    <select class="form-control productname" name="subcategory_slug">
                                        @foreach($subcategory as $subcategories)
                                        <option value="{{ $subcategories->subcategory_slug }}" {{ $subcategories->subcategory_slug == $product->subcategory_slug ? 'selected' : '' }}>
                                            {{ $subcategories->name }}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-4 col-sm-12">
                                <label for="name"><b>Name</b></label>
                                <input type="text" name="name" value="{{$product->name}}" class="form-control" id="exampleFormControlInput1" placeholder="Fish name">
                            </div>

                            <div class="form-group col-md-4 col-sm-12">
                                <label for="exampleFormControlInput1"><b>Price</b></label>
                                <input type="text" name="price" value="{{$product->price}}" class="form-control" id="exampleFormControlInput1" placeholder="Fish name">
                            </div>

                            <div class="form-group col-md-4 col-sm-12">
                                <label for="exampleFormControlInput1"><b>Cloth name</b></label>
                                <input type="text" name="cloth_name" value="{{$product->cloth_name}}" class="form-control" id="exampleFormControlInput1" placeholder="Fish name">
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-12 col-sm-12">
                                <label for="name"><b>Description</b></label>
                                <textarea id="ckeditor" name="desc">
                                    {!!$product->desc !!}
                                </textarea>
                            </div>
                        </div>

                        <div class="form-row">

                        <div class="form-group col-md-6 col-sm-12">
                                <label for="exampleFormControlSelect1"><b>Title image</b></label>
                                <input type="file" name="image" class="form-control" id="exampleFormControlInput1" placeholder="fish Image">
                                <img src="{{asset('/')}}{{$product->image}}" width="70px" height="70px">
                            </div>

                            <div class="form-group col-md-6 col-sm-12">
                                <label for="exampleFormControlSelect1"><b>Status</b></label>
                                <select name="status" class="form-control" id="exampleFormControlSelect1">
                                    <option value="2" {{$product->status == 2 ? 'selected' : ''}} >Feature product</option>
                                    <option value="1" {{$product->status == 1 ? 'selected' : ''}} >Active</option>
                                    <option value="0" {{$product->status == 0 ? 'selected' : ''}} >Inactive</option>
                                </select>
                            </div>
                        </div>
                        
                        <button type="submit" class="btn btn-primary mt-4 pr-4 pl-4">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</section>
@endsection
@section('scripts')
<script>
    $('#prod_cat_id').on('change',function(){
            //console.log("hmm its change");
            var cat_id=$(this).val();
             //console.log(cat_id);
             var div=$(this).parent();
             var op=`<label for="exampleFormControlSelect1"><b>Subcategory  Name</b></label>
             <select class="form-control productname" name="subcategory_slug">`;
             $.ajax({
              type:'get',
              url:'{!!URL::to('admin/findProductName')!!}',
              data:{'id':cat_id},
              success:function(data){
                  //console.log('success');
                    //console.log(data);
                    //console.log(data.length);
                   // op+='<option value="0" selected disabled>choose sub-category</option>';
                   for(var i=0;i<data.length;i++){
                    op+='<option value="'+data[i].subcategory_slug+'">'+data[i].name+'</option>';
                }
                  // console.log(op)
                  op+= `</select>`
                  $('#subcategory').html(op);
                  // div.find('#subcategory').append(op);
              },
              error:function(){
               
              }
          });
         });    
     </script>

     @endsection


     
