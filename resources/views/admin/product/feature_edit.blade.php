@extends('admin.master.master')
@section('title')
Edit Feature
@endsection
<section class="content">
    <div class="container-fluid">
        <div class="row clearfix mt-5">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="card">
                    <div class="header">
                        <h2>Edit Feature</h2>
                        
                    </div>
                    <div class="body">
                     <form action="{{ route('admin.product.feature_update') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <input type="hidden" value="{{$id}}" class="form-control" id="name" name="product_id" placeholder="Enter Name">
                        <input type="hidden" value="{{$feature->id}}" class="form-control" id="name" name="id" placeholder="Enter Name">

                        <label for="exampleFormControlInput1"><b>Feature</b></label>
                        <textarea id="ckeditor" name="feature" >{{$feature->feature}}</textarea>
                        
                        <button type="submit" class="btn btn-primary mt-4 pr-4 pl-4">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</section>

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


     
