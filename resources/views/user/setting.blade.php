@extends('front.master.master')
@section('title')
Setting | Zaytun Restaurant 
@endsection

@section('body')
 <!--================Banner Area =================-->
        <section class="banner_area">
            <div class="container">
                <div class="banner_content">
                    <h4>Setting</h4>
                    <a href="#">Home</a>
                    <a class="active" href="">Setting</a>
                </div>
            </div>
        </section>
        <!--================End Banner Area =================-->
       <!--================Contact Area =================-->
        <section class="contact_area">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <div class="contact_details">
                            <h3 class="contact_title">Contact Info</h3>
                            
                            <div class="media">
                                <div class="media-left">
                                    <i class="fa fa-map-marker"></i>
                                </div>
                                <div class="media-body">
                                    <h4>Address</h4>
                                    <h5>Opposite of IDB Bhaban, Begum Rokeya Sarani, Beside of Air force Museum
Dhaka, Bangladesh</h5>
                                </div>
                            </div>
                            <div class="media">
                                <div class="media-left">
                                    <i class="fa fa-phone"></i>
                                </div>
                                <div class="media-body">
                                    <h4>Phone</h4>
                                    <h5>+8801922-119623</h5>
                                </div>
                            </div>
                            <div class="media">
                                <div class="media-left">
                                    <i class="fa fa-envelope-o"></i>
                                </div>
                                <div class="media-body">
                                    <h4>Email</h4>
                                    <h5>support@zaytunbd.com
</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="row contact_form_area">
                            <h3 class="contact_title">Send Message</h3>
                                                 <div class="alert alert-success d-none" id="msg_div">
              <span id="res_message"></span>
      </div>
                            <form id="contact_us" method="post" action="javascript:void(0)">
                              
                                <div class="form-group col-md-12">
                                  <input type="text" class="form-control" id="name" name="name" placeholder="Your Name*">
                                  <span class="text-danger">{{ $errors->first('name') }}</span>
                                </div>
                               
                             <div class="form-group col-md-12">
                                  <input type="email" class="form-control" id="email" name="email" placeholder="Your Email*">
                                  <span class="text-danger">{{ $errors->first('email') }}</span>
                                </div>

                              <div class="form-group col-md-12">
                                  <input type="text" class="form-control" id="phone" name="phone" placeholder="Your Phone Number">
                                  <span class="text-danger">{{ $errors->first('phone') }}</span>
                                </div>   
                                 
                                <div class="form-group col-md-12">
                                  <textarea class="form-control" id="message" name="message" placeholder="Write Message"></textarea>
                                  <span class="text-danger">{{ $errors->first('message') }}</span>
                                </div>
           
                                <div class="form-group col-md-12">
                                    <button class="btn btn-default submit_btn" type="submit" id="send_form">Send Message</button>
                                 </div>
                            </form>
                            <div id="success">
                                <p>Your text message sent successfully!</p>
                            </div>
                            <div id="error">
                                <p>Sorry! Message not sent. Something went wrong!!</p>
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