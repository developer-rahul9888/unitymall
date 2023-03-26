 <!-- footer start -->
 <footer class="footer-light footer-expand pb-0">
        <div class="section-t-space section-b-space light-layout">
            <div class="container">
                <div class="row footer-theme partition-f">
                    

                    <div class="col">
                        <div class="sub-title">
                            <div class="footer-title">
                                <h4>Company</h4>
                            </div>
                            <div class="footer-contant">
                                <ul>
                                    <li><a href="{{url('/')}}"> About Us </a></li>
                                    <li><a href="{{url('/')}}"> Vision</a></li>
                                    <li><a href="{{url('/')}}"> Mission</a></li>
                                    <li><a href="{{url('/')}}"> Q & A </a></li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="col">
                        <div class="sub-title">
                            <div class="footer-title">
                                <h4>Policy Info</h4>
                            </div>
                            <div class="footer-contant">
                                <ul>
                                    <li><a href="{{url('/refund-policy')}}"> Return Policy </a></li>
                                    <li><a href="{{url('/terms-of-use')}}"> Terms of Use</a></li>
                                    <li><a href="{{url('/privacy')}}"> Privacy Policy</a></li>
                                    <li><a href="{{url('/payment-privacy')}}"> Payment Policy </a></li>
                                    <li><a href="{{url('/shipping-policy')}}"> Shipping Policy </a></li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="col">
                        <div class="sub-title">
                            <div class="footer-title">
                                <h4>Business With Us</h4>
                            </div>
                            <div class="footer-contant">
                                <ul>
                                    <li><a href="{{url('/')}}"> Sell on Unittymall </a></li>
                                    <li><a href="{{url('/')}}"> Advertise on Unittymall</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="col">
                        <div class="sub-title">
                            <div class="footer-title">
                                <h4>Special Links</h4>
                            </div>
                            <div class="footer-contant">
                                <ul>
                                    <li><a href="{{url('/')}}"> Become an influencer </a></li>
                                    <li><a href="{{url('/')}}"> Become a Affiliate</a></li>
                                    <li><a href="{{url('/')}}"> Student Programme</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="col">
                        <div class="sub-title">
                            <div class="footer-title">
                                <h4>Connect With Us</h4>
                            </div>
                            <div class="footer-contant">
                                <ul>
                                    <li><a href="{{url('/')}}"> Instagram </a></li>
                                    <li><a href="{{url('/')}}"> Facebook</a></li>
                                    <li><a href="{{url('/')}}"> YouTube</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="col">
                        <div class="sub-title">
                            <div class="footer-title">
                                <h4>Quick Links</h4>
                            </div>
                            <div class="footer-contant">
                                <ul>
                                    @foreach($categories->take(5) as $category)
                                    <li><a href="{{url('category/'.$category->id)}}">{{ $category->c_name }}</a></li>
                                    @endforeach
                                    <li><a href="{{url('points')}}">Combo Pack</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col">
                        <div class="sub-title">
                            <div class="footer-title">
                                <h4>store information</h4>
                            </div>
                            <div class="footer-contant">
                                <ul class="contact-list">
                                    <li><i class="fa fa-map-marker"></i>Unitymall Store,Gokul Road (Airport Road), Hubballi, Karnataka
                                        582-101</li>
                                    <li><i class="fa fa-envelope"></i>Email Us: <a href="#">support@unitymall.in</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
        <div class="sub-footer">
            <div class="container">
                <div class="row">
                    <div class="col-xl-6 col-md-6 col-sm-12">
                        <div class="footer-end">
                            <p><i class="fa fa-copyright" aria-hidden="true"></i> 2021-22 Unitymall</p>
                        </div>
                    </div>
                    <div class="col-xl-6 col-md-6 col-sm-12">
                        <div class="payment-card-bottom">
                            <ul>
                                <li>
                                    <a href="#"><img src="../assets/images/icon/visa.png" alt=""></a>
                                </li>
                                <li>
                                    <a href="#"><img src="../assets/images/icon/mastercard.png" alt=""></a>
                                </li>
                                <li>
                                    <a href="#"><img src="../assets/images/icon/paypal.png" alt=""></a>
                                </li>
                                <li>
                                    <a href="#"><img src="../assets/images/icon/american-express.png" alt=""></a>
                                </li>
                                <li>
                                    <a href="#"><img src="../assets/images/icon/discover.png" alt=""></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- footer end -->
    

    <!--modal popup start-->
    <div class="modal fade bd-example-modal-lg theme-modal" id="exampleModal" tabindex="-1" role="dialog"
        aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-body modal10">
                    <div class="container-fluid p-0">
                        <div class="row">
                            <div class="col-12">
                                <div class="modal-bg">
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    <div class="offer-content"><img src="../assets/images/Offer-banner.png"
                                            class="img-fluid blur-up lazyload" alt="">
                                        <h2>newsletter</h2>
                                        <form
                                            action="https://pixelstrap.us19.list-manage.com/subscribe/post?u=5a128856334b598b395f1fc9b&amp;id=082f74cbda"
                                            class="auth-form needs-validation" method="post"
                                            id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form"
                                            target="_blank">
                                            <div class="form-group mx-sm-3">
                                                <input type="text" class="form-control" name="EMAIL" id="mce-EMAIL"
                                                    placeholder="Enter your email" required="required">
                                                <button type="submit" class="btn btn-solid"
                                                    id="mc-submit">subscribe</button>
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
    <!--modal popup end-->


    <!-- Modal -->
    <div class="modal fade" id="deliveryarea" tabindex="-1" aria-labelledby="deliveryareaLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title fw-bold">Delivery Address</h5>
                    <button type="button" class="btn-close position-relative h-auto" data-bs-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">×</span></button>
                  </div>
                <div class="modal-body">
                    <div class="row g-3">
                        <div class="col-12">
                            <label for="name">Select your city to start shopping</label>
                            <select class="form-select" aria-label="Default select example">
                                <option selected>Select City</option>
                                <option value="1">New York</option>
                                <option value="2">Tokyo</option>
                                <option value="3">London</option>
                            </select>
                        </div>
                        <div class="col-12">
                            <label for="name">Enter your area / pincode</label>
                                <input type="text" class="form-control" id="name" placeholder="Enter Pincode"
                                    required="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- modal -->


    <!-- theme setting -->
    <!-- <div class="theme-settings">
        <ul>
            <li class="demo-li">
                <a href="javascript:void(0)" onclick="openSetting()">
                    <div class="setting-sidebar" id="setting-icon">
                        <h5>50+ <br>demo</h5>
                    </div>
                </a>
            </li>
            <li class="demo-li">
                <div class="backend-btn"><a target="_blank" href="https://themes.pixelstrap.com/multikart/back-end/index.html">Admin</a></div>
            </li>
            <li>
                <div class="dark-btn">Dark</div>
            </li>
            <li>
                <div class="rtl-btn">RTL</div>
            </li>
            <li class="input-picker">
                <input id="ColorPicker1" type="color" value="#206664" name="Background">
            </li>
            <li class="input-picker">
                <input id="ColorPicker2" type="color" value="#ee7a63" name="Background">
            </li>
        </ul>
    </div> -->
    <div class="scroll-setting-box">
        <div id="setting_box" class="setting-box">
            <a href="javascript:void(0)" class="overlay" onclick="closeSetting()"></a>
            <div class="setting_box_body">
                <div onclick="closeSetting()">
                    <div class="sidebar-back text-start"><i class="fa fa-angle-left pe-2" aria-hidden="true"></i> Back
                    </div>
                </div>
                <div class="setting-body">
                    <div class="setting-title">
                        <div>
                            <img src="../assets/images/icon/logo.png" class="img-fluid" alt="">
                            <h3>50+ <span>demos</span> <br> suit for any type of online store.</h3>
                        </div>
                    </div>
                    <div class="setting-contant">
                        <div class="row demo-section">
                            <div class="col-md-4 col-6 text-center demo-effects">
                                <div class="set-position">
                                    <a href="vegetables-4.html" class="layout-container">
                                        <img src="../assets/images/landing-page/demo/vegetables-4.jpg"
                                            class="img-fluid bg-img bg-top" alt="">
                                    </a>
                                    <a href="vegetables-4.html" class="demo-text">
                                        <h4>Vegetables 4 <span>New</span>
                                            <h4>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-4 col-6 text-center demo-effects">
                                <div class="set-position">
                                    <a href="vegetables-5.html" class="layout-container">
                                        <img src="../assets/images/landing-page/demo/vegetables-5.jpg"
                                            class="img-fluid bg-img bg-top" alt="">
                                    </a>
                                    <a href="vegetables-5.html" class="demo-text">
                                        <h4>Vegetables 5 <span>New</span>
                                            <h4>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-4 col-6 text-center demo-effects">
                                <div class="set-position">
                                    <a href="gradient.html" class="layout-container">
                                        <img src="../assets/images/landing-page/demo/gradient.jpg"
                                            class="img-fluid bg-img bg-top" alt="">
                                    </a>
                                    <a href="gradient.html" class="demo-text">
                                        <h4>gradient<h4>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-4 col-6 text-center demo-effects">
                                <div class="set-position">
                                    <a href="index.html" class="layout-container">
                                        <img src="../assets/images/landing-page/demo/fashion.jpg"
                                            class="img-fluid bg-img bg-top" alt="">
                                    </a>
                                    <a href="index.html" class="demo-text">
                                        <h4>fashion</h4>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-4 col-6 text-center demo-effects">
                                <div class="set-position">
                                    <a href="fashion-2.html" class="layout-container">
                                        <img src="../assets/images/landing-page/demo/fashion-2.jpg"
                                            class="img-fluid bg-img bg-top" alt="">
                                    </a>
                                    <a href="fashion-2.html" class="demo-text">
                                        <h4>fashion 2</h4>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-4 col-6 text-center demo-effects">
                                <div class="set-position">
                                    <a href="fashion-3.html" class="layout-container">
                                        <img src="../assets/images/landing-page/demo/fashion-3.jpg"
                                            class="img-fluid bg-img bg-top" alt="">
                                    </a>
                                    <a href="fashion-3.html" class="demo-text">
                                        <h4>fashion 3</h4>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-4 col-6 text-center demo-effects">
                                <div class="set-position">
                                    <a href="fashion-4.html" class="layout-container">
                                        <img src="../assets/images/landing-page/demo/fashion-4.jpg"
                                            class="img-fluid bg-img bg-top" alt="">
                                    </a>
                                    <a href="fashion-4.html" class="demo-text">
                                        <h4>fashion 4</h4>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-4 col-6 text-center demo-effects">
                                <div class="set-position">
                                    <a href="fashion-5.html" class="layout-container">
                                        <img src="../assets/images/landing-page/demo/fashion-5.jpg"
                                            class="img-fluid bg-img bg-top" alt="">
                                    </a>
                                    <a href="fashion-5.html" class="demo-text">
                                        <h4>fashion 5</h4>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-4 col-6 text-center demo-effects">
                                <div class="set-position">
                                    <a href="fashion-6.html" class="layout-container">
                                        <img src="../assets/images/landing-page/demo/fashion-6.jpg"
                                            class="img-fluid bg-img bg-top" alt="">
                                    </a>
                                    <a href="fashion-6.html" class="demo-text">
                                        <h4>fashion 6</h4>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-4 col-6 text-center demo-effects">
                                <div class="set-position">
                                    <a href="fashion-7.html" class="layout-container">
                                        <img src="../assets/images/landing-page/demo/fashion-7.jpg"
                                            class="img-fluid bg-img bg-top" alt="">
                                    </a>
                                    <a href="fashion-7.html" class="demo-text">
                                        <h4>fashion 7</h4>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-4 col-6 text-center demo-effects">
                                <div class="set-position">
                                    <a href="furniture.html" class="layout-container">
                                        <img src="../assets/images/landing-page/demo/furniture.jpg"
                                            class="img-fluid bg-img bg-top" alt="">
                                    </a>
                                    <a href="furniture.html" class="demo-text">
                                        <h4>furniture</h4>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-4 col-6 text-center demo-effects">
                                <div class="set-position">
                                    <a href="furniture-2.html" class="layout-container">
                                        <img src="../assets/images/landing-page/demo/furniture-2.jpg"
                                            class="img-fluid bg-img bg-top" alt="">
                                    </a>
                                    <a href="furniture-2.html" class="demo-text">
                                        <h4>furniture 2</h4>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-4 col-6 text-center demo-effects">
                                <div class="set-position">
                                    <a href="furniture-3.html" class="layout-container">
                                        <img src="../assets/images/landing-page/demo/furniture-dark.jpg"
                                            class="img-fluid bg-img bg-top" alt="">
                                    </a>
                                    <a href="furniture-3.html" class="demo-text">
                                        <h4>furniture dark</h4>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-4 col-6 text-center demo-effects">
                                <div class="set-position">
                                    <a href="electronic-1.html" class="layout-container">
                                        <img src="../assets/images/landing-page/demo/electronics.jpg"
                                            class="img-fluid bg-img bg-top" alt="">
                                    </a>
                                    <a href="electronic-1.html" class="demo-text">
                                        <h4>electronics</h4>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-4 col-6 text-center demo-effects">
                                <div class="set-position">
                                    <a href="electronic-2.html" class="layout-container">
                                        <img src="../assets/images/landing-page/demo/electronics-2.jpg"
                                            class="img-fluid bg-img bg-top" alt="">
                                    </a>
                                    <a href="electronic-2.html" class="demo-text">
                                        <h4>electronics 2</h4>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-4 col-6 text-center demo-effects">
                                <div class="set-position">
                                    <a href="electronic-3.html" class="layout-container">
                                        <img src="../assets/images/landing-page/demo/electronics-3.jpg"
                                            class="img-fluid bg-img bg-top" alt="">
                                    </a>
                                    <a href="electronic-3.html" class="demo-text">
                                        <h4>electronics 3</h4>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-4 col-6 text-center demo-effects">
                                <div class="set-position">
                                    <a href="marketplace-demo.html" class="layout-container">
                                        <img src="../assets/images/landing-page/demo/marketplace.jpg"
                                            class="img-fluid bg-img bg-top" alt="">
                                    </a>
                                    <a href="marketplace-demo.html" class="demo-text">
                                        <h4>marketplace</h4>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-4 col-6 text-center demo-effects">
                                <div class="set-position">
                                    <a href="marketplace-demo-2.html" class="layout-container">
                                        <img src="../assets/images/landing-page/demo/marketplace-2.jpg"
                                            class="img-fluid bg-img bg-top" alt="">
                                    </a>
                                    <a href="marketplace-demo-2.html" class="demo-text">
                                        <h4>marketplace 2</h4>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-4 col-6 text-center demo-effects">
                                <div class="set-position">
                                    <a href="marketplace-demo-3.html" class="layout-container">
                                        <img src="../assets/images/landing-page/demo/marketplace-3.jpg"
                                            class="img-fluid bg-img bg-top" alt="">
                                    </a>
                                    <a href="marketplace-demo-3.html" class="demo-text">
                                        <h4>marketplace 3</h4>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-4 col-6 text-center demo-effects">
                                <div class="set-position">
                                    <a href="marketplace-demo-4.html" class="layout-container">
                                        <img src="../assets/images/landing-page/demo/marketplace-4.jpg"
                                            class="img-fluid bg-img bg-top" alt="">
                                    </a>
                                    <a href="marketplace-demo-4.html" class="demo-text">
                                        <h4>marketplace 4</h4>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-4 col-6 text-center demo-effects">
                                <div class="set-position">
                                    <a href="vegetables.html" class="layout-container">
                                        <img src="../assets/images/landing-page/demo/vegetables.jpg"
                                            class="img-fluid bg-img bg-top" alt="">
                                    </a>
                                    <a href="vegetables.html" class="demo-text">
                                        <h4>vegetables</h4>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-4 col-6 text-center demo-effects">
                                <div class="set-position">
                                    <a href="vegetables-2.html" class="layout-container">
                                        <img src="../assets/images/landing-page/demo/vegetables-2.jpg"
                                            class="img-fluid bg-img bg-top" alt="">
                                    </a>
                                    <a href="vegetables-2.html" class="demo-text">
                                        <h4>vegetables 2</h4>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-4 col-6 text-center demo-effects">
                                <div class="set-position">
                                    <a href="vegetables-3.html" class="layout-container">
                                        <img src="../assets/images/landing-page/demo/vegetables-3.jpg"
                                            class="img-fluid bg-img bg-top" alt="">
                                    </a>
                                    <a href="vegetables-3.html" class="demo-text">
                                        <h4>vegetables 3</h4>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-4 col-6 text-center demo-effects">
                                <div class="set-position">
                                    <a href="jewellery.html" class="layout-container">
                                        <img src="../assets/images/landing-page/demo/jewellery.jpg"
                                            class="img-fluid bg-img bg-top" alt="">
                                    </a>
                                    <a href="jewellery.html" class="demo-text">
                                        <h4>jewellery</h4>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-4 col-6 text-center demo-effects">
                                <div class="set-position">
                                    <a href="jewellery-2.html" class="layout-container">
                                        <img src="../assets/images/landing-page/demo/jewellery-2.jpg"
                                            class="img-fluid bg-img bg-top" alt="">
                                    </a>
                                    <a href="jewellery-2.html" class="demo-text">
                                        <h4>jewellery 2</h4>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-4 col-6 text-center demo-effects">
                                <div class="set-position">
                                    <a href="jewellery-3.html" class="layout-container">
                                        <img src="../assets/images/landing-page/demo/jewellery-3.jpg"
                                            class="img-fluid bg-img bg-top" alt="">
                                    </a>
                                    <a href="jewellery-3.html" class="demo-text">
                                        <h4>jewellery 3</h4>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-4 col-6 text-center demo-effects">
                                <div class="set-position">
                                    <a href="bags.html" class="layout-container">
                                        <img src="../assets/images/landing-page/demo/bag.jpg"
                                            class="img-fluid bg-img bg-top" alt="">
                                    </a>
                                    <a href="bags.html" class="demo-text">
                                        <h4>bag</h4>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-4 col-6 text-center demo-effects">
                                <div class="set-position">
                                    <a href="watch.html" class="layout-container">
                                        <img src="../assets/images/landing-page/demo/watch.jpg"
                                            class="img-fluid bg-img bg-top" alt="">
                                    </a>
                                    <a href="watch.html" class="demo-text">
                                        <h4>watch</h4>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-4 col-6 text-center demo-effects">
                                <div class="set-position">
                                    <a href="medical.html" class="layout-container">
                                        <img src="../assets/images/landing-page/demo/medical.jpg"
                                            class="img-fluid bg-img bg-top" alt="">
                                    </a>
                                    <a href="medical.html" class="demo-text">
                                        <h4>medical</h4>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-4 col-6 text-center demo-effects">
                                <div class="set-position">
                                    <a href="perfume.html" class="layout-container">
                                        <img src="../assets/images/landing-page/demo/perfume.jpg"
                                            class="img-fluid bg-img bg-top" alt="">
                                    </a>
                                    <a href="perfume.html" class="demo-text">
                                        <h4>perfume</h4>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-4 col-6 text-center demo-effects">
                                <div class="set-position">
                                    <a href="yoga.html" class="layout-container">
                                        <img src="../assets/images/landing-page/demo/yoga.jpg"
                                            class="img-fluid bg-img bg-top" alt="">
                                    </a>
                                    <a href="yoga.html" class="demo-text">
                                        <h4>yoga</h4>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-4 col-6 text-center demo-effects">
                                <div class="set-position">
                                    <a href="christmas.html" class="layout-container">
                                        <img src="../assets/images/landing-page/demo/christmas.jpg"
                                            class="img-fluid bg-img bg-top" alt="">
                                    </a>
                                    <a href="christmas.html" class="demo-text">
                                        <h4>christmas</h4>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-4 col-6 text-center demo-effects">
                                <div class="set-position">
                                    <a href="bicycle.html" class="layout-container">
                                        <img src="../assets/images/landing-page/demo/bicycle.jpg"
                                            class="img-fluid bg-img bg-top" alt="">
                                    </a>
                                    <a href="bicycle.html" class="demo-text">
                                        <h4>bicycle</h4>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-4 col-6 text-center demo-effects">
                                <div class="set-position">
                                    <a href="marijuana.html" class="layout-container">
                                        <img src="../assets/images/landing-page/demo/marijuana.jpg"
                                            class="img-fluid bg-img bg-top" alt="">
                                    </a>
                                    <a href="marijuana.html" class="demo-text">
                                        <h4>marijuana</h4>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-4 col-6 text-center demo-effects">
                                <div class="set-position">
                                    <a href="gym-product.html" class="layout-container">
                                        <img src="../assets/images/landing-page/demo/gym.jpg"
                                            class="img-fluid bg-img bg-top" alt="">
                                    </a>
                                    <a href="gym-product.html" class="demo-text">
                                        <h4>gym</h4>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-4 col-6 text-center demo-effects">
                                <div class="set-position">
                                    <a href="tools.html" class="layout-container">
                                        <img src="../assets/images/landing-page/demo/tools.jpg"
                                            class="img-fluid bg-img bg-top" alt="">
                                    </a>
                                    <a href="tools.html" class="demo-text">
                                        <h4>tools</h4>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-4 col-6 text-center demo-effects">
                                <div class="set-position">
                                    <a href="shoes.html" class="layout-container">
                                        <img src="../assets/images/landing-page/demo/shoes.jpg"
                                            class="img-fluid bg-img bg-top" alt="">
                                    </a>
                                    <a href="shoes.html" class="demo-text">
                                        <h4>shoes</h4>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-4 col-6 text-center demo-effects">
                                <div class="set-position">
                                    <a href="books.html" class="layout-container">
                                        <img src="../assets/images/landing-page/demo/books.jpg"
                                            class="img-fluid bg-img bg-top" alt="">
                                    </a>
                                    <a href="books.html" class="demo-text">
                                        <h4>books</h4>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-4 col-6 text-center demo-effects">
                                <div class="set-position">
                                    <a href="kids.html" class="layout-container">
                                        <img src="../assets/images/landing-page/demo/kids.jpg"
                                            class="img-fluid bg-img bg-top" alt="">
                                    </a>
                                    <a href="kids.html" class="demo-text">
                                        <h4>kids</h4>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-4 col-6 text-center demo-effects">
                                <div class="set-position">
                                    <a href="game.html" class="layout-container">
                                        <img src="../assets/images/landing-page/demo/game.jpg"
                                            class="img-fluid bg-img bg-top" alt="">
                                    </a>
                                    <a href="game.html" class="demo-text">
                                        <h4>game</h4>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-4 col-6 text-center demo-effects">
                                <div class="set-position">
                                    <a href="beauty.html" class="layout-container">
                                        <img src="../assets/images/landing-page/demo/beauty.jpg"
                                            class="img-fluid bg-img bg-top" alt="">
                                    </a>
                                    <a href="beauty.html" class="demo-text">
                                        <h4>beauty</h4>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-4 col-6 text-center demo-effects">
                                <div class="set-position">
                                    <a href="left_sidebar-demo.html" class="layout-container">
                                        <img src="../assets/images/landing-page/demo/left-sidebar.jpg"
                                            class="img-fluid bg-img bg-top" alt="">
                                    </a>
                                    <a href="left_sidebar-demo.html" class="demo-text">
                                        <h4>left sidebar</h4>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-4 col-6 text-center demo-effects">
                                <div class="set-position">
                                    <a href="video-slider.html" class="layout-container">
                                        <img src="../assets/images/landing-page/demo/video-slider.jpg"
                                            class="img-fluid bg-img bg-top" alt="">
                                    </a>
                                    <a href="video-slider.html" class="demo-text">
                                        <h4>video slider</h4>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-4 col-6 text-center demo-effects">
                                <div class="set-position">
                                    <a href="metro.html" class="layout-container">
                                        <img src="../assets/images/landing-page/demo/metro.jpg"
                                            class="img-fluid bg-img bg-top" alt="">
                                    </a>
                                    <a href="metro.html" class="demo-text">
                                        <h4>metro</h4>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-4 col-6 text-center demo-effects">
                                <div class="set-position">
                                    <a href="goggles.html" class="layout-container">
                                        <img src="../assets/images/landing-page/demo/goggles.jpg"
                                            class="img-fluid bg-img bg-top" alt="">
                                    </a>
                                    <a href="goggles.html" class="demo-text">
                                        <h4>goggles</h4>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-4 col-6 text-center demo-effects">
                                <div class="set-position">
                                    <a href="flower.html" class="layout-container">
                                        <img src="../assets/images/landing-page/demo/flower.jpg"
                                            class="img-fluid bg-img bg-top" alt="">
                                    </a>
                                    <a href="flower.html" class="demo-text">
                                        <h4>flower</h4>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-4 col-6 text-center demo-effects">
                                <div class="set-position">
                                    <a href="light.html" class="layout-container">
                                        <img src="../assets/images/landing-page/demo/light.jpg"
                                            class="img-fluid bg-img bg-top" alt="">
                                    </a>
                                    <a href="light.html" class="demo-text">
                                        <h4>light</h4>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-4 col-6 text-center demo-effects">
                                <div class="set-position">
                                    <a href="nursery.html" class="layout-container">
                                        <img src="../assets/images/landing-page/demo/nursery.jpg"
                                            class="img-fluid bg-img bg-top" alt="">
                                    </a>
                                    <a href="nursery.html" class="demo-text">
                                        <h4>nursery</h4>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-4 col-6 text-center demo-effects">
                                <div class="set-position">
                                    <a href="pets.html" class="layout-container">
                                        <img src="../assets/images/landing-page/demo/pets.jpg"
                                            class="img-fluid bg-img bg-top" alt="">
                                    </a>
                                    <a href="pets.html" class="demo-text">
                                        <h4>pets</h4>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-4 col-6 text-center demo-effects">
                                <div class="set-position">
                                    <a href="video.html" class="layout-container">
                                        <img src="../assets/images/landing-page/demo/video.jpg"
                                            class="img-fluid bg-img bg-top" alt="">
                                    </a>
                                    <a href="video.html" class="demo-text">
                                        <h4>video</h4>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-4 col-6 text-center demo-effects">
                                <div class="set-position">
                                    <a href="lookbook-demo.html" class="layout-container">
                                        <img src="../assets/images/landing-page/demo/lookbook.jpg"
                                            class="img-fluid bg-img bg-top" alt="">
                                    </a>
                                    <a href="lookbook-demo.html" class="demo-text">
                                        <h4>lookbook</h4>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-4 col-6 text-center demo-effects">
                                <div class="set-position">
                                    <a href="full-page.html" class="layout-container">
                                        <img src="../assets/images/landing-page/demo/full-page.jpg"
                                            class="img-fluid bg-img bg-top" alt="">
                                    </a>
                                    <a href="full-page.html" class="demo-text">
                                        <h4>full page</h4>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-4 col-6 text-center demo-effects">
                                <div class="set-position">
                                    <a href="instagram-shop.html" class="layout-container">
                                        <img src="../assets/images/landing-page/demo/instagram.jpg"
                                            class="img-fluid bg-img bg-top" alt="">
                                    </a>
                                    <a href="instagram-shop.html" class="demo-text">
                                        <h4>instagram</h4>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-4 col-6 text-center demo-effects">
                                <div class="set-position">
                                    <a href="parallax.html" class="layout-container">
                                        <img src="../assets/images/landing-page/demo/parallax.jpg"
                                            class="img-fluid bg-img bg-top" alt="">
                                    </a>
                                    <a href="parallax.html" class="demo-text">
                                        <h4>parallax</h4>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- theme setting -->


    <!-- Add to cart modal popup start-->
    <div class="modal fade bd-example-modal-lg theme-modal cart-modal" id="addtocart" tabindex="-1" role="dialog"
        aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-body modal1">
                    <div class="container-fluid p-0">
                        <div class="row">
                            <div class="col-12">
                                <div class="modal-bg addtocart">
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    <div class="media">
                                        <a href="#">
                                            <img class="img-fluid blur-up lazyload pro-img"
                                                src="../assets/images/fashion/product/43.jpg" alt="">
                                        </a>
                                        <div class="media-body align-self-center text-center">
                                            <a href="#">
                                                <h6>
                                                    <i class="fa fa-check"></i>Item
                                                    <span>men full sleeves</span>
                                                    <span> successfully added to your Cart</span>
                                                </h6>
                                            </a>
                                            <div class="buttons">
                                                <a href="#" class="view-cart btn btn-solid">Your cart</a>
                                                <a href="#" class="checkout btn btn-solid">Check out</a>
                                                <a href="#" class="continue btn btn-solid">Continue shopping</a>
                                            </div>

                                            <div class="upsell_payment">
                                                <img src="../assets/images/payment_cart.png"
                                                    class="img-fluid blur-up lazyload" alt="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="product-section">
                                        <div class="col-12 product-upsell text-center">
                                            <h4>Customers who bought this item also.</h4>
                                        </div>
                                        <div class="row" id="upsell_product">
                                            <div class="product-box col-sm-3 col-6">
                                                <div class="img-wrapper">
                                                    <div class="front">
                                                        <a href="#">
                                                            <img src="../assets/images/fashion/product/1.jpg"
                                                                class="img-fluid blur-up lazyload mb-1"
                                                                alt="cotton top">
                                                        </a>
                                                    </div>
                                                    <div class="product-detail">
                                                        <h6><a href="#"><span>cotton top</span></a></h6>
                                                        <h4><span>$25</span></h4>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="product-box col-sm-3 col-6">
                                                <div class="img-wrapper">
                                                    <div class="front">
                                                        <a href="#">
                                                            <img src="../assets/images/fashion/product/34.jpg"
                                                                class="img-fluid blur-up lazyload mb-1"
                                                                alt="cotton top">
                                                        </a>
                                                    </div>
                                                    <div class="product-detail">
                                                        <h6><a href="#"><span>cotton top</span></a></h6>
                                                        <h4><span>$25</span></h4>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="product-box col-sm-3 col-6">
                                                <div class="img-wrapper">
                                                    <div class="front">
                                                        <a href="#">
                                                            <img src="../assets/images/fashion/product/13.jpg"
                                                                class="img-fluid blur-up lazyload mb-1"
                                                                alt="cotton top">
                                                        </a>
                                                    </div>
                                                    <div class="product-detail">
                                                        <h6><a href="#"><span>cotton top</span></a></h6>
                                                        <h4><span>$25</span></h4>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="product-box col-sm-3 col-6">
                                                <div class="img-wrapper">
                                                    <div class="front">
                                                        <a href="#">
                                                            <img src="../assets/images/fashion/product/19.jpg"
                                                                class="img-fluid blur-up lazyload mb-1"
                                                                alt="cotton top">
                                                        </a>
                                                    </div>
                                                    <div class="product-detail">
                                                        <h6><a href="#"><span>cotton top</span></a></h6>
                                                        <h4><span>$25</span></h4>
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
            </div>
        </div>
    </div>
    <!-- Add to cart modal popup end-->


    <!-- Quick-view modal popup start-->
    <div class="modal fade bd-example-modal-lg theme-modal" id="quick-view" tabindex="-1" role="dialog"
        aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content quick-view-modal">
                <div class="modal-body">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <div class="row">
                        <div class="col-lg-6  col-xs-12">
                            <div class="quick-view-img">
                                <img src="../assets/images/pro3/1.jpg" alt="" class="img-fluid blur-up lazyload">
                            </div>
                        </div>
                        <div class="col-lg-6 rtl-text">
                            <div class="product-right">
                                <h2> Women Pink Shirt </h2>
                                <h3>$32.96 </h3>
                                <ul class="color-variant">
                                    <li class="bg-light0"></li>
                                    <li class="bg-light1"></li>
                                    <li class="bg-light2"></li>
                                </ul>
                                <div class="border-product">
                                    <h6 class="product-title">product details</h6>
                                    <p>Sed ut perspiciatis, unde omnis iste natus error sit voluptatem accusantium
                                        doloremque laudantium</p>
                                </div>
                                <div class="product-description border-product">
                                    <div class="size-box">
                                        <ul>
                                            <li class="active"><a href="javascript:void(0)">s</a></li>
                                            <li><a href="javascript:void(0)">m</a></li>
                                            <li><a href="javascript:void(0)">l</a></li>
                                            <li><a href="javascript:void(0)">xl</a></li>
                                        </ul>
                                    </div>
                                    <h6 class="product-title">quantity</h6>
                                    <div class="qty-box">
                                        <div class="input-group">
                                            <span class="input-group-prepend">
                                                <button type="button" class="btn quantity-left-minus" data-type="minus"
                                                    data-field="">
                                                    <i class="ti-angle-left"></i>
                                                </button>
                                            </span>
                                            <input type="text" name="quantity" class="form-control input-number"
                                                value="1">
                                            <span class="input-group-prepend">
                                                <button type="button" class="btn quantity-right-plus" data-type="plus"
                                                    data-field="">
                                                    <i class="ti-angle-right"></i>
                                                </button>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="product-buttons">
                                    <a href="#" class="btn btn-solid">add to cart</a>
                                    <a href="#" class="btn btn-solid">view detail</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Quick-view modal popup end-->