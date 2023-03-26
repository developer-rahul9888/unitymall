@extends('shop.layouts.master')
@section('content-wrapper')

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
                            <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
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
                                    <div class="card dashboard-table mt-0">
                                        <div class="card-body table-responsive-sm">
                                            <div class="top-sec">
                                                <h3>My Orders</h3>
                                            </div>
                                            <div class="table-responsive-xl">
                                                <table class="table cart-table order-table">
                                                    <thead>
                                                        <tr class="table-head">
                                                            <th scope="col">Order Id</th>
                                                            <th scope="col">Shipping Details</th>
                                                            <th scope="col">Status</th>
                                                            <th scope="col">Price</th>
                                                            <th scope="col">View</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                    @if($orders->count() > 0)
                                                        @foreach ($orders as $order)
                                                        <tr>
                                                            
                                                            <td>
                                                                <span class="mt-0">#{{ $order->id }}</span>
                                                            </td>
                                                            <td>
                                                                <span class="fs-6">{{ $order->p_address }}</span>
                                                            </td>
                                                            <td>
                                                                @if($order->status == 'Failed')
                                                                <span
                                                                    class="badge rounded-pill bg-danger custom-badge">Failed</span>
                                                                @else
                                                                <span
                                                                    class="badge rounded-pill bg-success custom-badge">{{ $order->status }}</span>
                                                                @endif
                                                            </td>
                                                            <td>
                                                                <span class="theme-color fs-6">₹{{ $order->total_amount }}</span>
                                                            </td>
                                                            <td>
                                                                @if($order->status != 'Failed')
                                                                <a target="_blank" href="{{ url('/user/invoice/'.$order->id) }}">
                                                                    <i class="fa fa-eye text-theme"></i>
                                                                </a>
                                                                @endif
                                                            </td>
                                                        </tr>
                                                        @endforeach
                                                    @else 
                                                    <tr><td colspan="5">
                                                                <span class="mt-0">No Record Found</span>
                                                            </td></tr>
                                                    @endif
                                                        
                                                    </tbody>
                                                </table>
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