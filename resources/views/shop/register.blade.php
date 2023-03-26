@extends('shop.layouts.master')


@section('content-wrapper')

<!-- breadcrumb start -->
<div class="breadcrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="page-title">
                        <h2>create account</h2>
                    </div>
                </div>
                <div class="col-sm-6">
                    <nav aria-label="breadcrumb" class="theme-breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">create account</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb End -->


    <!--section start-->
    <section class="register-page section-b-space">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    
                    <div class="theme-card">
                    @if (count($errors) > 0)
                    <div class = "alert alert-danger">
                        <ul>
                            {{ $errors->first() }}
                        
                        </ul>
                    </div>
                    @endif

                    @if(session('success'))
                        <div class="alert alert-success">{{session('success')}}</div>
                    @endif

                    @if(session('error'))
                        <div class="alert alert-danger">{{session('error')}}</div>
                    @endif
                        <form class="theme-form" action="" method="POST">
                        @csrf
                            <div class="form-row row">
                                <div class="col-md-6">
                                    <label for="email">First Name</label>
                                    <input type="text" class="form-control" name="f_name" value="{{old('f_name')}}" placeholder="First Name" 
                                        required="">
                                </div>
                                <div class="col-md-6">
                                    <label for="review">Last Name</label>
                                    <input type="text" class="form-control" name="l_name" value="{{old('l_name')}}" placeholder="Last Name"
                                        required="">
                                </div>

                                <div class="col-md-6">
                                    <label for="Gender">Gender</label>
                                    <select class="form-control" name="gender" required="">
                                        <option selected="" disabled="" value="">Select gender</option>
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                        <option value="Other">Other</option>
                                    </select>
                                    
                                </div>
                                <div class="col-md-6">
                                    <label for="Dob">Dob</label>
                                    <input type="date" class="form-control" name="dob" value="{{old('dob')}}" placeholder="Dob"
                                        required="">
                                </div>

                                <div class="col-md-6">
                                    <label for="review">Phone</label>
                                    <input type="text" class="form-control"
                                        placeholder="Enter your Phone" name="phone" value="{{old('phone')}}" required="">
                                </div>

                                <div class="col-md-6">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control" name="email" value="{{old('email')}}" placeholder="Email" required="">
                                </div>

                                <div class="col-md-6">
                                    <label for="City">City</label>
                                    <input type="text" class="form-control" name="city" value="{{old('city')}}" placeholder="Enter your city" required="">
                                </div>

                                <div class="col-md-6">
                                    <label for="review">Pincode</label>
                                    <input type="text" class="form-control"
                                        placeholder="Enter your Pincode" name="pincode" value="{{old('pincode')}}" required="">
                                </div>

                                <div class="col-md-6">
                                    <label for="State">State</label>
                                    <input type="text" class="form-control" name="state" value="{{old('state')}}" placeholder="Enter your state" required="">
                                </div>

                                <div class="col-md-6">
                                    <label for="review">Referral ID ( Optional )</label>
                                    <input type="text" id="bliss_code_input" class="form-control"
                                        placeholder="Enter your Referral ID" name="direct_customer_id" value="{{old('direct_customer_id',request()->segment(2))}}">
                                        <div id="sponsr_name" style="margin-top: -20px;"></div>
                                </div>

                                <div class="col-md-6">
                                    <label for="review">Password</label>
                                    <input type="password" class="form-control"
                                        placeholder="Enter your password" name="password" value="{{old('password')}}" required="">
                                </div>

                                <div class="col-md-6">
                                    <label for="password_confirmation">Confirm Password</label>
                                    <input type="password" class="form-control"
                                        placeholder="Enter your password" name="password_confirmation" value="{{old('password_confirmation')}}" required="">
                                </div>
                                
                                <div class="col-md-6">
                                    <button type="submit" class="btn btn-solid w-auto">create Account</button>
                                </div>
                                
                                
                            </div>
                        </form>
                    </div>
                </div>

                <div class="col-lg-6 right-login">
                <img src="{{asset('assets/images/Shop-an-Earn-Cashback.webp')}}" style="width: 100%;">
                    <!-- <h3>New Customer</h3>
                    <div class="theme-card authentication-right">
                        <h6 class="title-font">Create A Account</h6>
                        <p>Sign up for a free account at our store. Registration is quick and easy. It allows you to be
                            able to order from our shop. To start shopping click register.</p><a href="{{ url('/register') }}"
                            class="btn btn-solid">Create an Account</a>
                    </div> -->
                </div>
            </div>
        </div>
    </section>
    <!--Section ends-->

@endsection

@section('scripts') 

<script>
var searchRequest = null;

		jQuery(function() {
			var minlength = 5;

			jQuery("#bliss_code_input").keyup(function() {
				var that = this,
					value = $(this).val();
				var username = jQuery(this).val();
				if (value.length >= minlength) {
					if (searchRequest != null)
						searchRequest.abort();
					searchRequest = jQuery.ajax({
						type: "POST",
						url: "{{url('referral-user')}}",
                        data: {
                        "_token": "{{ csrf_token() }}",
                        "username": username
                        },
						dataType: "json",
						success: function(response) {
							jQuery("#sponsr_name").html(response.data);
						}
					});
				}
			});
		});
        </script>
@endsection