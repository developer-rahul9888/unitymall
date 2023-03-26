@extends('shop.layouts.master')


@section('content-wrapper')
  <!-- breadcrumb start -->
  <div class="breadcrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="page-title">
                        <h2>SHIPPING POLICY</h2>
                    </div>
                </div>
                <div class="col-sm-6">
                    <nav aria-label="breadcrumb" class="theme-breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">SHIPPING POLICY</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb End -->

<!-- about section start -->
<section class="about-page section-b-space">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <h4>Order Processing:</h4>
                    <p>Normal order processing can take between 1-3 business days (Monday - Saturday).</p>
                </div>

                <div class="col-sm-12">
                    <h4>Shipping Delivery</h4>
                    <p>The following shipping methods are available.</p>
                </div>

                <div class="col-sm-12">
                    <h4>Standard Ground</h4>
                    <p>(3-7 business days), Second Day (2 business days). Next Day (1 business day) and Same Day (same day). Business days do not include weekends and there is no weekend delivery for any shipping method except Same Day. Some items cannot be shipped using Second Day, Next Day or Same Day due to size, weight and delivery address. These items will only have Standard Ground available. Please note that orders could arrive in multiple packages. You can track your order separately.</p>
                </div>

                <div class="col-sm-12">
                    <h4>Standard Ground</h4>
                    <p>Orders delivered within the 28 states should arrive in 3-7 business days depending on delivery location.</p>
                </div>

                <div class="col-sm-12">
                    <h4>Second Day</h4>
                    <p>Second Day is only available on selected products for our customers who ship orders within the Karnataka State. Second Day delivery orders will be processed on the same day if they are placed by 11.00am on a business day, and should arrive in 2 business days. Orders placed after 11:00 am will be processed on the following business day, and should arrive in 3 business days. All orders must have a valid address. Not all items are eligible for expected delivery.</p>
                </div>

                <div class="col-sm-12">
                    <h4>Next Day</h4>
                    <p>Next Day delivery is only available on select products for customers who ship orders within the Karnataka state. Next Day delivery orders will be processed on the same day if they are placed by 11:00 am on a business day, and should arrive in 1 business day. Orders placed after 11.00am will be processed on the following business day, and should arrive in 2 business days. All orders must have a valid address. Not all items are eligible for expected delivery.</p>
                </div>
            </div>
        </div>
    </section>
    <!-- about section end -->

@endsection