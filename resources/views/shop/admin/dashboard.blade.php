@extends('shop.layouts.master')
@section('content-wrapper')


<style>
    .copy-link-div {
    position: relative;
    /* width: 300px; */
    display: flex;
    margin: 15px 0;
}
.copy-link-input {
    /* position: absolute; */
    width: 100%;
    padding: 10px;
    border-radius: 10px;
    font-size: 15px;
    font-weight: 400;
}
.copy-link-button {
    align-items: center;
    position: absolute;
    right: 6px;
    padding: 6px 20px;
    border-radius: 10px;
    background: #B4261D;
    color: white;
    border-color: #B4261D;
    font-size: 15px;
    font-weight: 400;
    margin: 4px 0;
}
.welcome-msg {
    margin: auto;
    margin: 15px;
    padding: 10px;
}
    </style>
    <!-- breadcrumb start -->
    <div class="breadcrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="page-title">
                        <h2>dashboard</h2>
                    </div>
                </div>
                <div class="col-sm-6">
                    <nav aria-label="breadcrumb" class="theme-breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">dashboard</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb End -->


    <!--  dashboard section start -->
    <section class="dashboard-section section-b-space user-dashboard-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                @include('shop.admin.sidebar')
                </div>
                <div class="col-lg-9">
                    <div class="faq-content tab-content">
                    <div class="tab-pane fade show active" id="info">
                            <div class="counter-section">

                                    <div class="row">
                                        
                                        <div class="col-md-6">
                                        <div class="welcome-msg">
                                        <h4>Hello, {{ Auth::user()->f_name.' '.Auth::user()->l_name }} !</h4></div>

                                    </div>
                                        <div class="col-md-6">
                                            <div class="copy-link-div">
                                    <input class="copy-link-input" value="{{url('register/'.Auth::user()->customer_id)}}">
                                    <button type="button" class="copy-link-button">Copy</button>
                                    </div>
                                        </div>
                                    </div>


                                
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="counter-box">
                                            <img src="../assets/images/icon/dashboard/sale.png" class="img-fluid">
                                            <div>
                                                <h3>{{ Auth::user()->orders()->where('status','!=','Process')->count() }}</h3>
                                                <h5>Total Order</h5>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="counter-box">
                                            <img src="../assets/images/icon/dashboard/homework.png" class="img-fluid">
                                            <div>
                                                <h3>{{ Auth::user()->orders(['status'=>'Pending'])->count() }}</h3>
                                                <h5>Pending Orders</h5>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="counter-box">
                                            <img src="../assets/images/icon/dashboard/order.png" class="img-fluid">
                                            <div>
                                                <h3>{{ Auth::user()->reward_wallet }}</h3>
                                                <h5>Reward Point</h5>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="counter-box">
                                            <img src="../assets/images/icon/dashboard/order.png" class="img-fluid">
                                            <div>
                                                <h3>{{ Auth::user()->bliss_amount }}</h3>
                                                <h5>Wallet</h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">

                                </div>
                                <div class="box-account box-info">
                                    <div class="box-head">
                                        <h4>Account Information</h4>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="box">
                                                <div class="box-title">
                                                    <h3>Contact Information</h3><a href="{{url('user/profile/edit')}}">Edit</a>
                                                </div>
                                                <div class="box-content">
                                                    <h6>{{ Auth::user()->f_name.' '.Auth::user()->l_name }}</h6>
                                                    <h6>{{ Auth::user()->email }}</h6>
                                                    <h6><a href="{{url('user/password')}}">Change Password</a></h6>
                                                </div>
                                            </div>
                                        </div>
                                        
                                    </div>
                                    <!-- <div class="box mt-3">
                                        <div class="box-title">
                                            <h3>Address Book</h3><a href="#">Manage Addresses</a>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <h6>Default Billing Address</h6>
                                                <address>You have not set a default billing address.<br><a href="#">Edit
                                                        Address</a></address>
                                            </div>
                                            <div class="col-sm-6">
                                                <h6>Default Shipping Address</h6>
                                                <address>You have not set a default shipping address.<br><a
                                                        href="#">Edit Address</a></address>
                                            </div>
                                        </div>
                                    </div> -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--  dashboard section end -->


    <!-- Modal start -->
    <div class="modal logout-modal fade" id="logout" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Logging Out</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Do you want to log out?
                </div>
                <div class="modal-footer">
                    <a href="#" class="btn btn-dark btn-custom" data-bs-dismiss="modal">no</a>
                    <a href="index.html" class="btn btn-solid btn-custom">yes</a>
                </div>
            </div>
        </div>
    </div>
    <!-- modal end -->

    
@endsection

@section('scripts')

<script>
var $temp = $(".copy-link-input");
var $url = $temp.val();

$('.copy-link-button').on('click', function() {
  $temp.val($url).select();
  document.execCommand("copy");
  $(".copy-link-button").text("Copied!");
})

</script>


@endsection