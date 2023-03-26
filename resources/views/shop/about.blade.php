@extends('shop.layouts.master')


@section('content-wrapper')
  <!-- breadcrumb start -->
  <div class="breadcrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="page-title">
                        <h2>About</h2>
                    </div>
                </div>
                <div class="col-sm-6">
                    <nav aria-label="breadcrumb" class="theme-breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">About</li>
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
                <div class="col-lg-12">
                    <div class="banner-section"><img src="../assets/images/about/vendor.jpg"
                            class="img-fluid blur-up lazyload" alt=""></div>
                </div>
                <div class="col-sm-12">
                    <h4>Start your business with Multikart & reach customers across the World...</h4>
                    <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium,
                    </p>
                    <p>On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and
                        demoralized by the charms of pleasure of the moment, so blinded by desire, that they cannot
                        foresee
                        the pain and trouble that are bound to ensue; and equal blame belongs to those who fail in their
                        duty through weakness of will, which is the same as saying through shrinking from toil and pain.
                        These cases are perfectly simple and easy to distinguish. In a free hour, when our power of
                        choice
                        is untrammelled and when nothing prevents our being able to do what we like best, every pleasure
                        is
                        to be welcomed and every pain avoided. But in certain circumstances and owing to the claims of
                        duty
                        or the obligations of business it will frequently occur that pleasures have to be repudiated and
                        annoyances accepted. The wise man therefore always holds in these matters to this principle of
                        selection: he rejects pleasures to secure other greater pleasures, or else he endures pains to
                        avoid
                        worse pains.</p>
                </div>
            </div>
        </div>
    </section>
    <!-- about section end -->

@endsection