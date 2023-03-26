@extends('shop.layouts.master')


@section('content-wrapper')
  <!-- breadcrumb start -->
  <div class="mb-5">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-sm-6">
                    <div class="h-100 p-5 text-white">
                        <h2 class="display-5 fw-bold lh-1 mb-3">Join Unitymall Gift Your Voucher Club Membership @ just Rs. 1298/-</h2>
                            <p class="fs-6 text-muted">Get Opportunity to Earn Free Gift Vouchers from more than 200+ Brands Worth Rs. 6.65 Crores.</p>
                            <button class="btn btn-solid btn-lg px-4 me-md-2 membership-click" type="button">Buy Now</button>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="h-100 p-5">
                        <img src="{{asset('assets/images/membership_hero_section.png')}}" class="d-block mx-lg-auto img-fluid" loading="lazy">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb End -->


      <!-- breadcrumb start -->
  <div class="mb-5">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <div class="h-100 p-5">
                        <img src="{{asset('assets/images/membership_feature.png')}}" class="d-block mx-lg-auto img-fluid" loading="lazy">
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="h-100 p-5 text-white">
                        <h2 class="display-5 fw-bold lh-1 mb-3">We Provide Many Features You Can Use</h2>
                            <p class="fs-6 text-muted">Become A Gift Your Voucher Club Member &amp; Enjoy The Free Shopping From Your Favourite More Than 200+ Big Brands.</p>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
    <!-- breadcrumb End -->

    <div class="container">
    <div class="row">

        <div class="pricing-header p-3 pb-md-4 mx-auto text-center">
        <h2 class="fw-normal">Choose Your Plan</h2>
        <p class="fs-6 text-muted">Let's choose the package that is best for you and explore it happily and cheerfully.</p>
        </div>
    </div>
    </div>


      <!-- breadcrumb start -->
      <div class="mb-5">
        <div class="container border border-light border-3 rounded bg-light">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <div class="h-100 p-5">
                        <img src="{{asset('assets/images/icon/logo/37.png')}}" class="d-block mx-lg-auto img-fluid" loading="lazy">
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="h-100 p-5 text-white">
                        <h2 class="display-5 fw-bold lh-1 mb-3">UNITYMALL PRIME MEMBERSHIP</h2>
                            <p class="display-5 fw-bold lh-1 mb-3 text-danger">₹1298</p>
                            <button class="btn btn-solid btn-lg px-4 me-md-2 membership-click" type="button">Buy Now</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <form action="" method="POST" id="target">
    @csrf
    </form>
    <!-- breadcrumb End -->
    @if($razorpayOrder)
    @include('shop.razorpayView')
    @endif
@endsection

@section('scripts')

<script type="text/javascript">

    $( ".membership-click" ).click(function() {
        $( "#target" ).submit();
    });

</script>


@endsection