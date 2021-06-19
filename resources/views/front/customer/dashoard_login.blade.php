@extends('front.master.master')
@section('title')
Login | Register
@endsection

@section('body')
<section id="products" style="background:white;color:black">
  <div   class="product-container" style="display: block; background:white
  height: auto;overflow:hidden">
  
  
  <center>
    <div class="shipping login_page" >
        <div class="shipping_title">

            <center><h3 style="padding-top:12px;" class="">Login</h3></center>

        </div>
        <br>
        <form method="POST" action="{{ route('login') }}">
            @csrf
        
            <div class="from_group">
                <label style="color:black;" for="email" class="shipping_label">Email</label>

                <div class="name">
                    <input id="email" type="email" class="form_control" name="email" value="" required autocomplete="email">
                </div>
            </div>

         

            <div class="from_group">
                <label style="color:black;" for="email" class="shipping_label">Password</label>

                <div class="name">
                    <input id="password" type="password" class="form_control" name="password" value="" required>
                </div>
            </div>


            <div class="from_group">
                <button type="submit" class="btn gothic cart_btn">Submit</button>

            </div>

        </form>
    </div>
    <div class="shipping login_page">
        <div class="shipping_title">

            <center><h3 style="padding-top:12px;" class="">Registration</h3></center>

        </div>
        <br>
        <form method="POST" action="{{ route('register') }}">
            @csrf
            <div class="from_group">
                <label style="color:black;" for="email" class="shipping_label">Name</label>

                <div class="name">
                    <input id="email" type="text" class="form_control" name="name" value="" required >
                </div>
            </div>

            <div class="from_group">
                <label style="color:black;" for="email" class="shipping_label">Email</label>

                <div class="name">
                    <input id="email" type="email" class="form_control" name="email" value="" required autocomplete="email">
                </div>
            </div>
            <div class="from_group">
                <label style="color:black;" for="email" class="shipping_label">Phone</label>

                <div class="name">
                    <input id="email" type="number" class="form_control" name="phone" value="" required >
                </div>
            </div>
            <div class="from_group">
                <label style="color:black;" for="email" class="shipping_label">Password</label>

                <div class="name">
                    <input id="email" type="password" class="form_control" name="password" value="" required >
                </div>
            </div>
          

            <div class="from_group">
                <label style="color:black;" for="email" class="shipping_label">Confrim password</label>

                <div class="name">
                    <input id="email" type="password" class="form_control" name="password_confirmation" value="" required >
                </div>
            </div>


            <div class="from_group">
                <button type="submit" class="btn gothic cart_btn">Submit</button>

            </div>

        </form>
    </div>
</center>

</div>
</section>








@endsection