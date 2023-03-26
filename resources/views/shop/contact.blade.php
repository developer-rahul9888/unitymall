@extends('shop.layouts.master')


@section('content-wrapper')

 <!-- breadcrumb start -->
 <div class="breadcrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="page-title">
                        <h2>contact</h2>
                    </div>
                </div>
                <div class="col-sm-6">
                    <nav aria-label="breadcrumb" class="theme-breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                            <li class="breadcrumb-item active">contact</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb End -->


    <!--section start-->
    <section class="contact-page section-b-space">
        <div class="container">
            <div class="row section-b-space">
                <div class="col-lg-7 map">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1923.086732811542!2d75.61711990806634!3d15.421186197321042!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3bb8fbe1af0bd727%3A0xf14d02f26025a25f!2sUdaya%20Nagar%2C%20Zakir%20Hussain%20Colony%2C%20Hudco%20Colony%2C%20Gadag-Betigeri%2C%20Karnataka%20582103!5e0!3m2!1sen!2sin!4v1655757169278!5m2!1sen!2sin" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe></div>
                <div class="col-lg-5">
                    <div class="contact-right">
                        <ul>
                            <li>
                                <div class="contact-icon"><i class="fa fa-map-marker" aria-hidden="true"></i>
                                    <h6>Address</h6>
                                </div>
                                <div class="media-body">
                                    <p>Gokul Road (Airport Road),
                                    Hubballi 580030,</p>
                                    <p> Karnataka</p>
                                </div>
                            </li>
                            <li>
                                <div class="contact-icon"><img src="../assets/images/icon/email.png"
                                        alt="Generic placeholder image">
                                    <h6>Address</h6>
                                </div>
                                <div class="media-body">
                                    <p>Support@unitymall.in</p>
                                    <p>Info@unitymall.in</p>
                                </div>
                            </li>
                            <li>
                                <div class="contact-icon"><i class="fa fa-fax" aria-hidden="true"></i>
                                    <h6>Fax</h6>
                                </div>
                                <div class="media-body">
                                    <p>Support@unitymall.in</p>
                                    <p>Info@unitymall.in</p>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <form class="theme-form" action="" method="POST">
                        <div class="form-row row">
                            <div class="col-md-6">
                                <label for="name">First Name</label>
                                <input type="text" class="form-control" name="firstName" placeholder="Enter Your name"
                                    required="">
                            </div>
                            <div class="col-md-6">
                                <label for="email">Last Name</label>
                                <input type="text" class="form-control" name="lastName" placeholder="Email" required="">
                            </div>
                            <div class="col-md-6">
                                <label for="review">Phone number</label>
                                <input type="text" class="form-control" name="phone" placeholder="Enter your number"
                                    required="">
                            </div>
                            <div class="col-md-6">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" name="email" placeholder="Email" required="">
                            </div>
                            <div class="col-md-12">
                                <label for="review">Write Your Message</label>
                                <textarea class="form-control" name="message" placeholder="Write Your Message"
                                    id="exampleFormControlTextarea1" rows="6"></textarea>
                            </div>
                            <div class="col-md-12">
                                <button class="btn btn-solid" type="submit">Send Your Message</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!--Section ends-->

@endsection