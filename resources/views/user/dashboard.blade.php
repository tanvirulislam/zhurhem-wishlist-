@extends('front.master.master')
@section('title')
DashBoard | Zaytun Restaurant 
@endsection

@section('body')
<!-- Hero Section Begin -->
   @include('front.include.page-hero')
    <!-- Hero Section End -->

    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section set-bg" data-setbg="{{ asset('/') }}public/front/img/breadcrumb.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Puritee</h2>
                        <div class="breadcrumb__option">
                            <a href="{{ route('index') }}">Home</a>
                            <span>Your List</span>
                            
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
                  <div class="col-md-12 text-center">
                    <div class="btn-group">
                        <a href="{{ route('user.dashboard') }}" type="button" class="btn btn-danger">Home</a>
                        <a href="{{ route('user.address') }}" type="button" class="btn btn-danger">Delivary Address</a>
                      
                      </div>
                  </div>
               </div>
               </div>   
</section>
        <section class="">
            <div class="container">
                <div class="row">
                   <div class="">
                            <h3 class="text-danger text-center ">New  Order {{ $totalOrder }}</h3>
                            </div>
                             <div class="col-md-12">
                        <div class="row contact_form_area">
                          <div class="contact_details">
                            <h3 class="contact_title">New Order</h3>
                            </div>
                            <div class="table-responsive">
      <table class="table table-bordered">
    <thead>
      <tr>
        <th>Id</th>
        <th>Order Id</th>
        <th>Shipping Name</th>
        <th>Shipping Address</th>
        <th>Shipping Phone</th>
        <th>Total Price</th>
         <th>Status</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
      @foreach($ships as $key=>$ship)
      <tr>
        <td>{{ $key+1 }}</td>
        <td>{{ $ship->pin }}</td>
        <td>
          @foreach($infos as $info)
          @if($info->id == $ship->shipping_id)
          {{ $info->name }}
           @endif
          @endforeach
        </td>
        <td>
          @foreach($infos as $info)
          @if($info->id == $ship->shipping_id)
          {{ $info->address }}
          @endif
          @endforeach
        </td>
        <td>
          @foreach($infos as $info)
          @if($info->id == $ship->shipping_id)
          {{ $info->phone }}
 @endif
          @endforeach
        </td>
       <td>{{ $ship->order_total}}</td>
       <td>
        @if($ship->status == 0)
                    <span class="label label-danger">Pending</span>
                    @else
                    <span class="label label-success">Delivaried</span>
                    @endif
       </td>
       <td>
       <a href="{{ route('user.order.detail',$ship->id) }}" type="button" class="btn btn-info text-light"><i class="fa fa-eye"></i></a>
     </td>
      </tr>
     @endforeach
    </tbody>
  </table>
                    
        </div>                    
                                    
                    </div>
                </div>
                    <div class="col-md-12">
                        <div class="row contact_form_area">
                          <div class="contact_details">
                            <h3 class="contact_title">Previous Order</h3>
                            </div>
                            <div class="table-responsive">
     <table class="table table-bordered">
    <thead>
      <tr>
        <th>Id</th>
        <th>Order Id</th>
        <th>Shipping Name</th>
        <th>Shipping Address</th>
        <th>Shipping Phone</th>
        <th>Total Price</th>
         <th>Status</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
      @foreach($orders as $key=>$ship)
      <tr>
        <td>{{ $key+1 }}</td>
        <td>{{ $ship->pin }}</td>
        <td>
          @foreach($infos as $info)
          @if($info->id == $ship->shipping_id)
          {{ $info->name }}
           @endif
          @endforeach
        </td>
        <td>
          @foreach($infos as $info)
          @if($info->id == $ship->shipping_id)
          {{ $info->address }}
          @endif
          @endforeach
        </td>
        <td>
          @foreach($infos as $info)
          @if($info->id == $ship->shipping_id)
          {{ $info->phone }}
 @endif
          @endforeach
        </td>
       <td>{{ $ship->order_total}}</td>
       <td>
        @if($ship->status == 0)
                    <span class="label label-danger">Pending</span>
                    @else
                    <span class="label label-success">Delivaried</span>
                    @endif
       </td>
       <td>
       <a href="{{ route('user.order.detail',$ship->id) }}" type="button" class="btn btn-info text-light"><i class="fa fa-eye"></i></a>
     </td>
      </tr>
     @endforeach
    </tbody>
  </table>
      </div>              
                            
                                    
                    </div>
                </div>
            </div>
          </div>
        </section>
        <!--================End Contact Area =================-->
        
   
        <script>
   if ($("#contact_us").length > 0) {
     $.validator.addMethod(
            "regex",
            function(value, element, regexp) 
            {
                if (regexp.constructor != RegExp)
                    regexp = new RegExp(regexp);
                else if (regexp.global)
                    regexp.lastIndex = 0;
                return this.optional(element) || regexp.test(value);
            },
            "Please check your input."
    );
    $("#contact_us").validate({
      
    rules: {
      name: {
        required: true,
        maxlength: 50
      },
  
       phone: {
            required: true,
            digits:true,
            regex:/(01)[0-9]{9}/,
            maxlength:11
        },
        email: {
                required: true,
                maxlength: 50,
                email: true
            },    
    },
    messages: {
        
      name: {
        required: "Please enter name",
        maxlength: "Your last name maxlength should be 50 characters long."
      },
      phone: {
        required: "Please enter contact number",
        digits: "Please enter only numbers",
        regex:"please add Valid Number",
        maxlength: "The contact number should be 11 digits",
      },
      email: {
          required: "Please enter valid email",
          email: "Please enter valid email",
          maxlength: "The email name should less than or equal to 50 characters",
        },
         
    },
    submitHandler: function(form) {
     $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
      });
      $('#send_form').html('Sending..');
      $.ajax({
        url: "{{ url('send/message1') }}",
        method: 'Post',
        data: $('#contact_us').serialize(),
        success: function( response ) {
            $('#send_form').html('Submit');
            $('#res_message').show();
            $('#res_message').html(response.msg);
            $('#msg_div').removeClass('d-none');
 
            document.getElementById("contact_us").reset(); 
            setTimeout(function(){
            $('#res_message').hide();
            $('#msg_div').hide();
            },10000);
        }
      });
    }
  })
}
</script>

@endsection