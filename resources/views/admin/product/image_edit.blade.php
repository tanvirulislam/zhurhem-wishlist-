@extends('admin.master.master')
@section('title')
Add image
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

                    <li class="breadcrumb-item">Update image</li>
                 
                </ul>
            </div>
        </div>
    </div>
    <div class="container-fluid">
    	
        
        <div class="row clearfix mt-5">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="card">
                    <div class="header">
                        <h2>Update image</h2>
                       
                    </div>
                    <div class="body">
                         <form action="{{ route('admin.product.image_update') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <input type="hidden" value="{{$id}}" class="form-control" id="name" name="id" placeholder="Enter Name">

                        <div class="form-row">
                        @foreach($size_fit as $size_fits)
                            <div class="form-group col-md-8 col-sm-12">
                                <label for="exampleFormControlInput1"><b>Image</b></label>
                                <input type="file" name="image[]" value="{{$size_fits->image}}"  placeholder="Enter cloth size" class="form-control" id="exampleFormControlInput1" >
                            </div>
                       @endforeach
                        <div class="col-md-4">
                                <label for="name">Button</label>
                            <button type="button" class="btn btn-success btn-block mr-3 addextras" id="inputextras">Add</button>
                        </div>
                        </div>

                        <div class="input_field_wrapper">
                              
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
    var fieldHTML = '<div class="form-row"><div class="form-group col-md-6 col-sm-12"><label for="exampleFormControlInput1"><b>image</b></label><input type="file" name="image[]" placeholder="Enter cloth size" class="form-control" id="exampleFormControlInput1" ></div></div>';

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

 
  

