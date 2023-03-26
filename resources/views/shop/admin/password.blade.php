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
                                                    <h4>password</h4>
                                                    <a class="edit-link" href="javascript:;">edit</a>
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
                        <form class="theme-form" action="" method="POST">
                        @csrf
                            <div class="form-row row">
                                
                                <div class="col-md-12">
                                    <label for="email">Current password</label>
                                    <input type="text" class="form-control" name="currentPassword" value="{{ old('currentPassword') }}"
                                        required="">
                                </div>
                                <div class="col-md-12">
                                    <label for="review">New password</label>
                                    <input type="text" class="form-control" name="password" value="{{ old('password') }}" 
                                        required="">
                                </div>
                                <div class="col-md-12">
                                    <label for="review">Retype new password</label>
                                    <input type="text" class="form-control" name="confirm_password" value="{{ old('confirm_password') }}" 
                                        required="">
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

@endsection