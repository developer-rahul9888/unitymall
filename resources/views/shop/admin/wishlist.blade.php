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
                    
                            <div class="row">
                                <div class="col-12">
                                    <div class="card dashboard-table mt-0">
                                        <div class="card-body table-responsive-sm">
                                            <div class="top-sec">
                                                <h3>My Wishlist</h3>
                                            </div>
                                            <div class="table-responsive-xl">
                                                <table class="table cart-table wishlist-table">
                                                    <thead>
                                                        <tr class="table-head">
                                                            <th scope="col">image</th>
                                                            <th scope="col">Order Id</th>
                                                            <th scope="col">Product Details</th>
                                                            <th scope="col">Price</th>
                                                            <th scope="col">Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>
                                                                <a href="javascript:void(0)">
                                                                    <img src="../assets/images/pro3/1.jpg"
                                                                        class="blur-up lazyloaded" alt="">
                                                                </a>
                                                            </td>
                                                            <td>
                                                                <span class="mt-0">#125021</span>
                                                            </td>
                                                            <td>
                                                                <span>Purple polo tshirt</span>
                                                            </td>
                                                            <td>
                                                                <span class="theme-color fs-6">$49.54</span>
                                                            </td>
                                                            <td>
                                                                <a href="javascript:void(0)"
                                                                    class="btn btn-xs btn-solid">
                                                                    Move to Cart
                                                                </a>
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td>
                                                                <a href="javascript:void(0)">
                                                                    <img src="../assets/images/pro3/2.jpg"
                                                                        class="blur-up lazyloaded" alt="">
                                                                </a>
                                                            </td>
                                                            <td>
                                                                <span class="mt-0">#125367</span>
                                                            </td>
                                                            <td>
                                                                <span>Sleevless white top</span>
                                                            </td>
                                                            <td>
                                                                <span class="theme-color fs-6">$49.54</span>
                                                            </td>
                                                            <td>
                                                                <a href="javascript:void(0)"
                                                                    class="btn btn-xs btn-solid">
                                                                    Move to Cart
                                                                </a>
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td>
                                                                <a href="javascript:void(0)">
                                                                    <img src="../assets/images/pro3/27.jpg"
                                                                        class="blur-up lazyloaded" alt="">
                                                                </a>
                                                            </td>
                                                            <td>
                                                                <span>#125948</span>
                                                            </td>
                                                            <td>
                                                                <span>multi color polo tshirt</span>
                                                            </td>
                                                            <td>
                                                                <span class="theme-color fs-6">$49.54</span>
                                                            </td>
                                                            <td>
                                                                <a href="javascript:void(0)"
                                                                    class="btn btn-xs btn-solid">
                                                                    Move to Cart
                                                                </a>
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td>
                                                                <a href="javascript:void(0)">
                                                                    <img src="../assets/images/pro3/28.jpg"
                                                                        class="blur-up lazyloaded" alt="">
                                                                </a>
                                                            </td>
                                                            <td>
                                                                <span>#127569</span>
                                                            </td>
                                                            <td>
                                                                <span>Candy red solid tshirt</span>
                                                            </td>
                                                            <td>
                                                                <span class="theme-color fs-6">$49.54</span>
                                                            </td>
                                                            <td>
                                                                <a href="javascript:void(0)"
                                                                    class="btn btn-xs btn-solid">
                                                                    Move to Cart
                                                                </a>
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td>
                                                                <a href="javascript:void(0)">
                                                                    <img src="../assets/images/pro3/33.jpg"
                                                                        class="blur-up lazyloaded" alt="">
                                                                </a>
                                                            </td>
                                                            <td>
                                                                <span>#125753</span>
                                                            </td>
                                                            <td>
                                                                <span>multicolored polo tshirt</span>
                                                            </td>
                                                            <td>
                                                                <span class="theme-color fs-6">$49.54</span>
                                                            </td>
                                                            <td>
                                                                <a href="javascript:void(0)"
                                                                    class="btn btn-xs btn-solid">
                                                                    Move to Cart
                                                                </a>
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td>
                                                                <a href="javascript:void(0)">
                                                                    <img src="../assets/images/pro3/34.jpg"
                                                                        class="blur-up lazyloaded" alt="">
                                                                </a>
                                                            </td>
                                                            <td>
                                                                <span>#125021</span>
                                                            </td>
                                                            <td>
                                                                <span>Men's Sweatshirt</span>
                                                            </td>
                                                            <td>
                                                                <span class="theme-color fs-6">$49.54</span>
                                                            </td>
                                                            <td>
                                                                <a href="javascript:void(0)"
                                                                    class="btn btn-xs btn-solid">
                                                                    Move to Cart
                                                                </a>
                                                            </td>
                                                        </tr>
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