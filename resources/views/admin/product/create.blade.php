@extends('admin.master.master')
@section('title')
Add Product
@endsection
@section('body')
<section class="content">
    <div class="block-header">
        <div class="row">
            <div class="col-lg-7 col-md-6 col-sm-12">
                <h2>Admin
                <small class="text-muted">Welcome to Admin Panel</small>
                </h2>
            </div>
            <div class="col-lg-5 col-md-6 col-sm-12">
                <ul class="breadcrumb float-md-right">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i class="zmdi zmdi-home"></i>Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('admin.product') }}">Product</a></li>

                    <li class="breadcrumb-item">Create Product</li>
                 
                </ul>
            </div>
        </div>
    </div>
    <div class="container-fluid">
    	
        
        <div class="row clearfix mt-5">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="card">
                    <div class="header">
                        <h2>Add Product</h2>
                       
                    </div>
                    <div class="body">
                         <form action="{{ route('admin.product.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-row">
                            <div class="form-group col-md-6 col-sm-12">
                            <label for="exampleFormControlSelect1"><b>Catagory name</b></label>
                            <select name="category_slug" id="prod_cat_id" class="form-control" id="exampleFormControlSelect1" >
                            @foreach($category as $catagories)
                            <option value="{{$catagories->category_slug}}">{{$catagories->name}}</option>
                            @endforeach
                            </select>
                            </div>
                            
                        
                            <div class="form-group col-md-6 col-sm-12" id="subcategory">
                            <label for="exampleFormControlSelect1"><b>Subcategory  Name</b></label>
                            <select class="form-control productname" name="subcategory_slug">
                            <option value="0" disabled="true" selected="true">Select Subcategory</option>
                            </select>
                            </div>
                        </div>
                      
                        <div class="row">
                            <div class="form-group col-md-6 col-sm-12">
                            <label for="exampleFormControlInput1"><b>Name</b></label>
                            <input type="text" name="name" class="form-control" id="exampleFormControlInput1"
                             placeholder="name">
                            
                            </div>
                       
                            <div class="form-group col-md-6 col-sm-12">
                            <label for="exampleFormControlInput1"><b>Price</b></label>
                            <input type="number" name="price" class="form-control" id="exampleFormControlInput1"
                             placeholder="Enter price">
                            
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-12 col-sm-12">
                            <label for="exampleFormControlInput1"><b>Description</b></label>
                            <!-- <input type="text" name="desc" class="form-control" id="exampleFormControlInput1"
                             placeholder="Enter description"> -->

                             <textarea id="ckeditor" name="desc">
                                
                            </textarea>
                            
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6 col-sm-12">
                            <label for="exampleFormControlInput1"><b> Cloth name</b></label>
                            <input type="text" name="cloth_name" placeholder="Enter cloth name" class="form-control" id="exampleFormControlInput1" >
                            
                            </div>

                            <div class="form-group col-md-6 col-sm-12">
                            <label for="exampleFormControlInput1"><b>Size</b></label>
                            <select name="size[]" id="roles" class="form-control" multiple="multiple">
                            @foreach($size as $sizes)
                            <option value="{{ $sizes->size }}">{{ $sizes->size }}</option>
                            @endforeach
                            </select>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6 col-sm-12">
                                <label for="exampleFormControlSelect1"><b>Stock</b></label>
                                <input type="text" name="stock" placeholder="Enter stock " class="form-control" id="exampleFormControlInput1" >
                               
                            </div>
                        
                            <div class="form-group col-md-6 col-sm-12">
                                <label for="exampleFormControlSelect1"><b>Status</b></label>
                                <select name="status" class="form-control" id="exampleFormControlSelect1">
                                <option value="2">Feature product</option>
                                <option value="1">Active</option>
                                <option value="0">Inactive</option>

                                </select>
                            </div>

                            <div class="form-group col-md-6 col-sm-12">
                                <label for="exampleFormControlSelect1"><b>Title Image</b></label>
                                <input type="file" name="image" placeholder="Enter stock " class="form-control" id="exampleFormControlInput1" >
                               
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
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
<script>
    $(document).ready(function() {
        $('.select2').select2();
    })
</script>

     <script>
    /**
         * Check all the permissions
         */
         $("#checkPermissionAll").click(function(){
             if($(this).is(':checked')){
                 // check all the checkbox
                 $('input[type=checkbox]').prop('checked', true);
             }else{
                 // un check all the checkbox
                 $('input[type=checkbox]').prop('checked', false);
             }
         });
         function checkPermissionByGroup(className, checkThis){
            const groupIdName = $("#"+checkThis.id);
            const classCheckBox = $('.'+className+' input');
            if(groupIdName.is(':checked')){
                 classCheckBox.prop('checked', true);
             }else{
                 classCheckBox.prop('checked', false);
             }
            implementAllChecked();
         }
         function checkSinglePermission(groupClassName, groupID, countTotalPermission) {
            const classCheckbox = $('.'+groupClassName+ ' input');
            const groupIDCheckBox = $("#"+groupID);
            // if there is any occurance where something is not selected then make selected = false
            if($('.'+groupClassName+ ' input:checked').length == countTotalPermission){
                groupIDCheckBox.prop('checked', true);
            }else{
                groupIDCheckBox.prop('checked', false);
            }
            implementAllChecked();
         }
        
</script>

    

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

 
  

