<!-- loader start -->
<div class="loader_skeleton">
        <header class="header-style-5 style-light">
            <div class="top-header top-header-dark2">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="header-contact">
                                <ul>
                                    <li>Welcome to Our store Unitymall</li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-6 text-end">
                            <ul class="header-dropdown">
                                <li class="onhover-dropdown mobile-account"> <i class="fa fa-user"
                                        aria-hidden="true"></i>
                                    My Account
                                    <ul class="onhover-show-div">
                                        <li><a href="{{url('login')}}">Login</a></li>
                                        <li><a href="{{url('register')}}">register</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="main-menu">
                            <div class="menu-left">
                                <div class="navbar d-block d-xl-none">
                                    <a href="javascript:void(0)">
                                        <div class="bar-style" ><i
                                                class="fa fa-bars sidebar-bar" aria-hidden="true"></i>
                                        </div>
                                    </a>
                                </div>
                                <div class="brand-logo">
                                <a href="{{url('/')}}"><img src="{{asset('assets/images/icon/logo/37.png')}}"
                                        class="img-fluid blur-up lazyload" alt=""></a>
                                </div>
                            </div>
                            <div>
                            <form class="form_search ajax-search the-basics" role="form" action="{{ url('/search') }}" method="POST">
                                @csrf
                                <input id="query search-autocomplete" name="keyword" type="search" placeholder="Search any Device or Gadgets..."
                                    class="nav-search nav-search-field typeahead" aria-expanded="true" value="{{ (Request::segment(1)=='search')?Request::segment(2):'' }}">
                                <button type="submit" name="nav-submit-button" class="btn-search">
                                    <i class="ti-search"></i>
                                </button>
                            </form>
                            </div>
                            <div class="menu-right pull-right">
                                <div>
                                    <div class="icon-nav d-none d-sm-block">
                                        <ul>
                                        <li class="onhover-div mobile-search d-xl-none d-sm-inline-block d-none">
                                            <div><img src="../assets/images/icon/search.png" onclick="openSearch()"
                                                    class="img-fluid blur-up lazyload" alt=""><i class="ti-search"
                                                    onclick="openSearch()"></i></div>
                                        </li>
                                        
                                        <li class="onhover-div mobile-cart d-sm-inline-block d-none">
                                            <div><img src="{{asset('assets/images/icon/cart.png')}}"
                                                    class="img-fluid blur-up lazyload" alt=""><i
                                                    class="ti-shopping-cart"></i></div>
                                            <span class="cart_qty_cls">0</span>
                                        </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="bottom-part bottom-light">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-3">
                            <div class="category-menu d-none d-xl-block h-100">
                                <div class="toggle-sidebar">
                                    <i class="fa fa-bars sidebar-bar"></i>
                                    <h5 class="mb-0">shop by category</h5>
                                </div>
                            </div>
                            <div class="sidenav fixed-sidebar marketplace-sidebar svg-icon-menu">
                                <nav>
                                    <div>
                                        <div class="sidebar-back text-start d-xl-none d-block"><i
                                                class="fa fa-angle-left pe-2" aria-hidden="true"></i> Back</div>
                                    </div>
                                </nav>
                            </div>
                        </div>
                        <div class="col-xl-9">
                            <div class="main-nav-center">
                                <nav class="text-start">
                                    <div class="toggle-nav"><i class="fa fa-bars sidebar-bar"></i></div>
                                    <ul class="sm pixelstrap sm-horizontal">
                                        <li>
                                        <div class="mobile-back text-end">Back<i class="fa fa-angle-right ps-2"
                                                    aria-hidden="true"></i></div>
                                        </li>
                                        <li><a href="{{url('/')}}">Home</a></li>
                                        <li><a href="{{url('/product')}}">Product</a></li>
                                        <!-- <li><a href="{{url('/contact')}}">Contact</a></li> -->
                                        <li><a href="{{url('/online-store')}}">Web Store</a></li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <section class="p-0">
            <div class="home-slider">
                <div class="home"></div>
            </div>
        </section>
        <section class="banner-padding absolute-banner pb-0 ratio2_1">
            <div class="container absolute-bg">
                <div class="row partition2">
                    <div class="col-md-4">
                        <a href="#">
                            <div class="collection-banner p-right text-center">
                                <div class="ldr-bg">
                                    <div class="contain-banner banner-3">
                                        <div>
                                            <h4></h4>
                                            <h2></h2>
                                            <h6></h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-4">
                        <a href="#">
                            <div class="collection-banner p-right text-center">
                                <div class="ldr-bg">
                                    <div class="contain-banner banner-3">
                                        <div>
                                            <h4></h4>
                                            <h2></h2>
                                            <h6></h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-4">
                        <a href="#">
                            <div class="collection-banner p-right text-center">
                                <div class="ldr-bg">
                                    <div class="contain-banner banner-3">
                                        <div>
                                            <h4></h4>
                                            <h2></h2>
                                            <h6></h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <!-- loader end -->


    <!-- top panel start -->
    <!-- <div class="top-panel-adv">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-10">
                    <div class="panel-left-content">
                        <h4 class="mb-0">Welcome to Multikart!! Delivery in <span>10 Minutes.</span> </h4>
                        <div class="delivery-area d-md-block d-none">
                            <div>
                                <h5>Limited Time offer</h5>
                                <h4>code: 25FsfuABdS</h4>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-2">
                    <a href="javascript:void(0)" class="close-btn"><i data-feather="x"></i></a>
                </div>
            </div>
        </div>
    </div> -->
    <!-- top panel end -->


  <!-- header start -->
  <header class="header-style-5 style-light">
        <div class="mobile-fix-option"></div>
        <div class="top-header top-header-dark2">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="header-contact">
                            <ul>
                                <li>Welcome to Our store Unitymall</li>
                                <!-- <li><i class="fa fa-phone" aria-hidden="true"></i>Call Us: 123 - 456 - 7890</li> -->
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-6 text-end">
                    <ul class="header-dropdown">
                    <li class="mobile-wishlist"><a href="{{ url('points') }}"><i class="fa fa-store" aria-hidden="true"></i></a>
                            </li>
                        <li class="onhover-dropdown mobile-account"><i class="fa fa-user" aria-hidden="true"></i>
                            My Account
                            <ul class="onhover-show-div">
                            @if(Auth::check())
                                <li><a href="{{url('/user')}}">Dashboard</a></li>
                                <li><a href="{{url('/user/logout')}}">Logout</a></li>
                            @else
                                <li><a href="{{url('/login')}}">Login</a></li>
                                <li><a href="{{url('/register')}}">register</a></li>

                            @endif
                            </ul>
                        </li>
                    </ul>
                </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="main-menu">
                        <div class="menu-left">
                            <div class="navbar d-block d-xl-none">
                                <a href="javascript:void(0)">
                                    <div class="bar-style" id="toggle-sidebar-res"><i class="fa fa-bars sidebar-bar"
                                            aria-hidden="true"></i>
                                    </div>
                                </a>
                            </div>
                            <div class="brand-logo">
                            <a href="{{ url('/'); }}"><img src="{{asset('assets/images/icon/logo/37.png')}}"
                                    class="img-fluid blur-up lazyload" alt=""></a>
                            </div>
                        </div>
                        <div>
                        <form class="form_search ajax-search the-basics" role="form" action="{{ url('/search') }}" method="POST">
                            @csrf
                            <input  name="keyword" type="search" placeholder="Search any Device or Gadgets..."
                                class="nav-search nav-search-field typeahead" aria-expanded="true" value="{{ (Request::segment(1)=='search')?Request::segment(2):'' }}">
                            <button type="submit" name="nav-submit-button" class="btn-search">
                                <i class="ti-search"></i>
                            </button>
                        </form>
                        </div>
                        <div class="menu-right pull-right">
                            <div>
                                <div class="icon-nav">
                                    <ul>
                                        <li class="onhover-div mobile-search d-xl-none d-inline-block">
                                            <div><img src="../assets/images/icon/search.png" onclick="openSearch()"
                                                    class="img-fluid blur-up lazyload" alt=""> <i class="ti-search"
                                                    onclick="openSearch()"></i></div>
                                            <div id="search-overlay" class="search-overlay">
                                                <div> <span class="closebtn" onclick="closeSearch()"
                                                        title="Close Overlay">×</span>
                                                    <div class="overlay-content">
                                                        <div class="container">
                                                            <div class="row">
                                                                <div class="col-xl-12">
                                                                    <form action="{{ url('/search') }}" method="POST">
                                                                        @csrf
                                                                        <div class="form-group">
                                                                            <input type="text" name="keyword" class="form-control"
                                                                                id="exampleInputPassword1"
                                                                                placeholder="Search a Product">
                                                                        </div>
                                                                        <button type="submit" class="btn btn-primary"><i
                                                                                class="fa fa-search"></i></button>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="onhover-div mobile-cart">
                                        
                                        <div><a href="{{ url('/cart'); }}"><img src="{{asset('assets/images/icon/cart.png')}}"
                                                class="img-fluid blur-up lazyload" alt=""><i
                                                class="ti-shopping-cart"></i></a></div>
                                        <span class="cart_qty_cls">0</span>
                                        
                                        
                                    </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="bottom-part bottom-light">
            <div class="container">
                <div class="row">
                    <div class="col-xl-3">
                        <div class="category-menu d-none d-xl-block h-100">
                            <div id="toggle-sidebar" class="toggle-sidebar">
                                <i class="fa fa-bars sidebar-bar"></i>
                                <h5 class="mb-0">shop by category</h5>
                            </div>
                        </div>
                        <div class="sidenav fixed-sidebar marketplace-sidebar svg-icon-menu">
                            <nav>
                                <div>
                                    <div class="sidebar-back text-start d-xl-none d-block"><i
                                            class="fa fa-angle-left pe-2" aria-hidden="true"></i> Back</div>
                                </div>
                                <ul id="sub-menu" class="sm pixelstrap sm-vertical">
                                    @foreach($categories as $category)
                                    <li> <a href="{{url('category/'.$category->id)}}">{{ $category->c_name }}</a>
                                    </li>
                                    @endforeach
                                    
                                </ul>
                            </nav>
                        </div>
                    </div>
                    <div class="col-xl-9">
                        <div class="main-nav-center">
                            <nav id="main-nav" class="text-start">
                                <div class="toggle-nav"><i class="fa fa-bars sidebar-bar"></i></div>
                                <ul id="main-menu" class="sm pixelstrap sm-horizontal">
                                    <li>
                                        <div class="mobile-back text-end">Back<i class="fa fa-angle-right ps-2"
                                                aria-hidden="true"></i></div>
                                    </li>
                                    <li><a href="{{url('/')}}">Home</a></li>
                                    <li><a href="{{url('/product')}}">Product</a></li>
                                    <!-- <li><a href="{{url('/contact')}}">Contact</a></li> -->
                                    <li><a href="{{url('/online-store')}}">Web Store</a></li>
                                    <li class="float-end"><a class="text-white btn btn-solid hover-solid btn-animation add-button" href="{{url('membership')}}">Prime Member</a></li>
                                    
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- header end -->