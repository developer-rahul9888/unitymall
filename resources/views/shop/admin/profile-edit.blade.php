@extends('shop.layouts.master')
@section('content-wrapper')

    @php $user = Auth::user();  @endphp
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
                                                @if (count($errors) > 0)
                    <div class = "alert alert-danger">
                        <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                        </ul>
                    </div>
                    @endif

                    @if(session('success'))
                        <div class="alert alert-success">{{session('success')}}</div>
                    @endif

                    @if(session('error'))
                        <div class="alert alert-danger">{{session('error')}}</div>
                    @endif
                        <form class="theme-form" action="" method="POST" enctype="multipart/form-data">
                        @csrf
                            <div class="form-row row">
                                <div class="col-md-6">
                                    <label for="email">Profile Image</label>
                                    <input type="file" class="form-control" name="file">
                                </div>
                                <div class="col-md-6">
                                    <label for="email">First Name</label>
                                    <input type="text" class="form-control" name="f_name" value="{{ old('f_name',$user->f_name) }}" placeholder="First Name" 
                                        required="">
                                </div>
                                <div class="col-md-6">
                                    <label for="review">Last Name</label>
                                    <input type="text" class="form-control" name="l_name" value="{{ old('l_name',$user->l_name) }}" placeholder="Last Name"
                                        required="">
                                </div>
                                <div class="col-md-6">
                                    <label for="Gender">Gender</label>
                                    <select class="form-control" name="gender">
                                    <option selected="" disabled="" value="">Select gender</option>
                                    <option value="Male">Male</option>
                                    <option selected="selected" value="Female">Female</option>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label for="Date Of Birth">Date Of Birth</label>
                                    <input type="date" class="form-control"
                                        placeholder="Enter your Date Of Birth" name="dob" value="{{ old('dob',$user->dob) }}" required="">
                                </div>
                                <div class="col-md-6">
                                    <label for="Phone">Phone</label>
                                    <input type="text" class="form-control"
                                        placeholder="Enter your Phone" name="phone" value="{{ old('phone',$user->phone) }}" required="">
                                </div>
                                <div class="col-md-6">
                                    <label for="Email">Email Address</label>
                                    <input type="email" class="form-control"
                                        placeholder="Enter your email" name="email" value="{{ old('email',$user->email) }}" required="">
                                </div>
                                <div class="col-md-6">
                                    <label for="Country">Country</label>
                                    <input type="text" class="form-control"
                                        placeholder="Enter your Country" name="country" value="{{ old('country',$user->country) }}" required="">
                                </div>
                                <div class="col-md-6">
                                    <label for="Address">Address</label>
                                    <input type="text" class="form-control"
                                        placeholder="Enter your Address" name="address" value="{{ old('address',$user->address) }}" required="">
                                </div>
                                <div class="col-md-6">
                                    <label for="State">State</label>
                                    <input type="text" class="form-control"
                                        placeholder="Enter your State" name="state" value="{{ old('state',$user->state) }}" required="">
                                </div>

                                <div class="col-md-6">
                                    <label for="Pincode">Pincode</label>
                                    <input type="text" class="form-control"
                                        placeholder="Enter your Pincode" name="pincode" value="{{ old('pincode',$user->pincode) }}" required="">
                                </div>

                                
                                <div class="col-md-12">
                                <button type="submit" class="btn btn-solid w-auto">Save</button>
                                </div>
                            </div>
                        </form>
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