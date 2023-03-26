@extends('shop.layouts.master')
@section('content-wrapper')
    @php $user = Auth::user(); @endphp
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
                            <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
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
                    
                            <div class="row">
                                <div class="col-12">
                                    <div class="card mt-0">
                                        <div class="card-body">
                                            <div class="dashboard-box">
                                                <div class="dashboard-title">
                                                    <h4>profile</h4>
                                                    <a class="edit-link" href="{{ url('/user/profile/edit') }}">edit</a>
                                                </div>
                                                <div class="dashboard-detail">
                                                    <ul>
                                                        <li>
                                                            <div class="details">
                                                                <div class="left">
                                                                    <h6>First Name</h6>
                                                                </div>
                                                                <div class="right">
                                                                    <h6>{{ ($user->f_name)?$user->f_name:'---' }}</h6>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="details">
                                                                <div class="left">
                                                                    <h6>Last Name</h6>
                                                                </div>
                                                                <div class="right">
                                                                    <h6>{{ ($user->l_name)?$user->l_name:'---' }}</h6>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="details">
                                                                <div class="left">
                                                                    <h6>Gender</h6>
                                                                </div>
                                                                <div class="right">
                                                                    <h6>{{ ($user->gender)?$user->gender:'---' }}</h6>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="details">
                                                                <div class="left">
                                                                    <h6>Date of Birth</h6>
                                                                </div>
                                                                <div class="right">
                                                                    <h6>{{ ($user->dob)?$user->dob:'---' }}</h6>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="details">
                                                                <div class="left">
                                                                    <h6>Joining Date</h6>
                                                                </div>
                                                                <div class="right">
                                                                    <h6>{{ ($user->rdate)?$user->rdate:'---' }}</h6>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="details">
                                                                <div class="left">
                                                                    <h6>Activation Date</h6>
                                                                </div>
                                                                <div class="right">
                                                                    <h6>{{ ($user->package_used)?$user->package_used:'---' }}</h6>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="details">
                                                                <div class="left">
                                                                    <h6>Sponsor ID</h6>
                                                                </div>
                                                                <div class="right">
                                                                    <h6>{{ ($user->direct_customer_id)?$user->direct_customer_id:'---' }}</h6>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="details">
                                                                <div class="left">
                                                                    <h6>Username</h6>
                                                                </div>
                                                                <div class="right">
                                                                    <h6>{{ ($user->customer_id)?$user->customer_id:'---' }}</h6>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="details">
                                                                <div class="left">
                                                                    <h6>email address</h6>
                                                                </div>
                                                                <div class="right">
                                                                    <h6>{{ ($user->email)?$user->email:'---' }}</h6>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="details">
                                                                <div class="left">
                                                                    <h6>Phone</h6>
                                                                </div>
                                                                <div class="right">
                                                                    <h6>{{ ($user->phone)?$user->phone:'---' }}</h6>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="details">
                                                                <div class="left">
                                                                    <h6>Country / Region</h6>
                                                                </div>
                                                                <div class="right">
                                                                    <h6>{{ ($user->country)?$user->country:'---' }}</h6>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="details">
                                                                <div class="left">
                                                                    <h6>street address</h6>
                                                                </div>
                                                                <div class="right">
                                                                    <h6>{{ ($user->address)?$user->address:'---' }}</h6>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="details">
                                                                <div class="left">
                                                                    <h6>city/state</h6>
                                                                </div>
                                                                <div class="right">
                                                                    <h6>{{ ($user->city)?$user->city:'---' }} {{ $user->state }}</h6>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="details">
                                                                <div class="left">
                                                                    <h6>zip</h6>
                                                                </div>
                                                                <div class="right">
                                                                    <h6>{{ ($user->pincode)?$user->pincode:'---' }}</h6>
                                                                </div>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="dashboard-title mt-lg-5 mt-3">
                                                    <h4>Kyc details</h4>
                                                    <a class="edit-link" href="{{ url('/user/kyc/edit') }}">edit</a>
                                                </div>
                                                <div class="dashboard-detail">
                                                    <ul>
                                                        <li>
                                                            <div class="details">
                                                                <div class="left">
                                                                    <h6>PAN Card</h6>
                                                                </div>
                                                                <div class="right">
                                                                    <h6>{{ ($user->pancard)?$user->pancard:'---' }}</h6>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="details">
                                                                <div class="left">
                                                                    <h6>PAN Proof</h6>
                                                                </div>
                                                                <div class="right">
                                                                    <h6>{{ ($user->pancard)?$user->pancard:'---' }}</h6>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="details">
                                                                <div class="left">
                                                                    <h6>Aadhar</h6>
                                                                </div>
                                                                <div class="right">
                                                                    <h6>{{ ($user->aadhar)?$user->aadhar:'---' }}</h6>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="details">
                                                                <div class="left">
                                                                    <h6>Aadhar Proof</h6>
                                                                </div>
                                                                <div class="right">
                                                                    <h6>{{ ($user->aadhar)?$user->aadhar:'---' }}</h6>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        
                                                    </ul>
                                                </div>

                                                <div class="dashboard-title mt-lg-5 mt-3">
                                                    <h4>Bank details</h4>
                                                    <a class="edit-link" href="{{ url('/user/bank/edit') }}">edit</a>
                                                </div>
                                                <div class="dashboard-detail">
                                                    <ul>
                                                        <li>
                                                            <div class="details">
                                                                <div class="left">
                                                                    <h6>Bank Name</h6>
                                                                </div>
                                                                <div class="right">
                                                                    <h6>{{ ($user->bank_name)?$user->bank_name:'---' }}</h6>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="details">
                                                                <div class="left">
                                                                    <h6>Branch</h6>
                                                                </div>
                                                                <div class="right">
                                                                    <h6>{{ ($user->branch)?$user->branch:'---' }}</h6>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="details">
                                                                <div class="left">
                                                                    <h6>Account Type</h6>
                                                                </div>
                                                                <div class="right">
                                                                    <h6>{{ ($user->account_type)?$user->account_type:'---' }}</h6>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="details">
                                                                <div class="left">
                                                                    <h6>Account No.</h6>
                                                                </div>
                                                                <div class="right">
                                                                    <h6>{{ ($user->account_no)?$user->account_no:'---' }}</h6>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="details">
                                                                <div class="left">
                                                                    <h6>IFSC Code</h6>
                                                                </div>
                                                                <div class="right">
                                                                    <h6>{{ ($user->ifsc)?$user->ifsc:'---' }}</h6>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="details">
                                                                <div class="left">
                                                                    <h6>Passbook image or cancel cheque</h6>
                                                                </div>
                                                                <div class="right">
                                                                <img src="{{asset('files/kyc/'.$user->bank_img)}}" width="50">
                                                                </div>
                                                            </div>
                                                        </li>
                                                        
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
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