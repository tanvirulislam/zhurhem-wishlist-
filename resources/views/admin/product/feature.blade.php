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
                        <h2>Add feature</h2>
                    </div>
                    <div class="body">
                         <form action="{{ route('admin.product.feature_store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" value="{{Session::get('productId')}}" name="product_id">
                        <div class="form-row">
                            <div class="form-group col-md-12 col-sm-12">
                            <label for="exampleFormControlInput1"><b>Feature</b></label>
                             <textarea id="ckeditor" name="feature"></textarea>
                            
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


    <script type="text/javascript">
    $(document).ready(function(){
    var maxFieldLimit = 20; //Input fields increment limitation
    var add_more_field = $('.addextras'); //Add button selector
    var Fieldwrapper = $('.input_field_wrapper'); //Input field wrapper
    var fieldHTML = '<div class="form-row"><div class="form-group col-md-6 col-sm-12"><label for="exampleFormControlInput1"><b>Size and fit</b></label><input type="text" name="size_and_fit[]" placeholder="Enter cloth size" class="form-control" id="exampleFormControlInput1" ></div></div>';

    var x = 1; //Initial field counter is 1
    $(".addextras").click(function(){ //Once add button is clicked

        if(x < maxFieldLimit){ //Check maximum number of input fields
            x++; //Increment field counter
            $(Fieldwrapper).append(fieldHTML); // Add field html
        }
    });
    $(Fieldwrapper).on('click', '.remove_button', function(e){ //Once remove button is clicked
        e.preventDefault();
        $(this).parent('div').remove(); //Remove field html
        x--; //Decrement field counter
    });
});
</script>

@endsection

 
  

