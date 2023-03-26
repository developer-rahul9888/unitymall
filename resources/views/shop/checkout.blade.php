@extends('shop.layouts.master')


@section('content-wrapper')

  <!-- breadcrumb start -->
    <div class="breadcrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="page-title">
                        <h2>Check-out</h2>
                    </div>
                </div>
                <div class="col-sm-6">
                    <nav aria-label="breadcrumb" class="theme-breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Check-out</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb End -->


    <!-- section start -->
    <section class="section-b-space">
        <div class="container">
            <div class="checkout-page">
                <div class="checkout-form">
                @php $user = Auth::user(); @endphp
                @if (count($errors) > 0)
                    <div class = "alert alert-danger">
                        <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                        </ul>
                    </div>
                @endif
                @if(session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif
                    @if(session('error'))
                        <div class="alert alert-danger">{{session('error')}}</div>
                    @endif
                    <form method="post" action="{{url('checkout')}}">
                    @csrf
                        <div class="row">
                            <div class="col-lg-6 col-sm-12 col-xs-12">
                                <div class="checkout-title">
                                    <h3>Billing Details</h3>
                                </div>
                                <div class="row check-out">
                                    <div class="form-group col-md-6 col-sm-6 col-xs-12">
                                        <div class="field-label">First Name</div>
                                        <input type="text" name="f_name" placeholder="" value="{{ old('f_name',($user)?$user->f_name:'') }}">
                                    </div>
                                    <div class="form-group col-md-6 col-sm-6 col-xs-12">
                                        <div class="field-label">Last Name</div>
                                        <input type="text" name="l_name" placeholder="" value="{{ old('l_name',($user)?$user->l_name:'') }}">
                                    </div>
                                    <div class="form-group col-md-6 col-sm-6 col-xs-12">
                                        <div class="field-label">Phone</div>
                                        <input type="text" name="phone" placeholder="" value="{{ old('phone',($user)?$user->phone:'') }}">
                                    </div>
                                    <div class="form-group col-md-6 col-sm-6 col-xs-12">
                                        <div class="field-label">Email Address</div>
                                        <input type="text" name="email" placeholder="" value="{{ old('email',($user)?$user->email:'') }}">
                                    </div>
                                    <div class="form-group col-md-12 col-sm-12 col-xs-12">
                                        <div class="field-label">Country</div>
                                        <select name="country">
                                            <option selected value="India">India</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-12 col-sm-12 col-xs-12">
                                        <div class="field-label">Address</div>
                                        <input type="text" name="address" placeholder="Street address" value="{{ old('address',($user)?$user->address:'') }}">
                                    </div>
                                    <div class="form-group col-md-12 col-sm-12 col-xs-12">
                                        <div class="field-label">Town/City</div>
                                        <input type="text" name="city" placeholder="" value="{{ old('city',($user)?$user->city:'') }}">
                                    </div>
                                    <div class="form-group col-md-12 col-sm-6 col-xs-12">
                                        <div class="field-label">State / County</div>
                                        <input type="text" name="state" placeholder="" value="{{ old('state',($user)?$user->state:'') }}">
                                    </div>
                                    <div class="form-group col-md-12 col-sm-6 col-xs-12">
                                        <div class="field-label">Postal Code</div>
                                        <input type="text" name="zipcode" placeholder="" value="{{ old('zipcode',($user)?$user->pincode:'') }}">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-12 col-xs-12">
                                <div class="checkout-details">
                                    <div class="order-box">
                                        <div class="title-box">
                                            <div>Product <span>Total</span></div>
                                        </div>
                                        <ul class="qty">
                                        @php $total = $shipping = 0 @endphp
                                        @if(session('cart'))
                                        @foreach(session('cart') as $id => $details)
                                        @php $total += $details['price'] * $details['quantity']; $shipping += $details['shipping']; @endphp

                                            <li>{{ substr($details['name'],0,30).'..' }} × {{ $details['quantity'] }} <span>₹{{ $details['price'] * $details['quantity'] }}</span></li>

                                            @endforeach
                                        @endif
                                            
                                        </ul>
                                        <ul class="sub-total">
                                            <li>Subtotal <span class="count">₹{{ $total }}</span></li>
                                            <li>Shipping <span class="count">₹{{ ($shipping < 500)?$shipping:0 }}</span></li>
                                        </ul>
                                        <ul class="total">
                                            <li>Total <span class="count">₹{{ ($shipping < 500)?$shipping+$total:0 }}</span></li>
                                        </ul>
                                    </div>
                                    <div class="payment-box">
                                        <div class="upper-box">
                                            <div class="payment-options">
                                                <ul>
                                                    <li>
                                                        <div class="radio-option">
                                                            <input type="radio" name="paymentType" value="razorpay" id="payment-1" checked="checked">
                                                            <label for="payment-1">Online Payments<span
                                                                    class="small-text">Please send a check to Store
                                                                    Name, Store Street, Store Town, Store State /
                                                                    County, Store Postcode.</span></label>
                                                        </div>
                                                    </li>

                                                    <li>
                                                        <div class="radio-option">
                                                            <input type="radio" name="paymentType" id="payment-2" value="wallet">
                                                            <label for="payment-2">Wallet</label>
                                                        </div>
                                                    </li>
                                                    
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="text-end"><button type="submit" class="btn-solid btn">Place Order</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- section end -->
    @if($razorpayOrder)
    @include('shop.razorpayView')
    @endif

@endsection