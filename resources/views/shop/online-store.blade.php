@extends('shop.layouts.master')


@section('content-wrapper')


<section class="pt-0">
<div class="row">
<div class="full-banner custom-space p-right text-end">
<img src="../assets/images/fashion/bottom-banner.jpg" alt="" class="bg-img blur-up lazyload">
<div class="container">
<div class="row">
<div class="col-lg-11">
<div class="banner-contain custom-size">
<h2>2022</h2>
<h3>fashion trends</h3>
<h4>special offer</h4>
</div>
</div>
</div>
</div>
</div>
</div>
</section>



    <section class="bg_cls section-b-space">
        <div class="search-section absolute-banner">
            <div class="container">
                <div class="absolute-bg">
                    <h4 class="">find your Store</h4>
                    <form class="row justify-content-md-center ajax-search" action="" method="POST">
                        @csrf
                        <div class="col-md-3 col-12">
                            <div class="form-group mb-0">
                                <input type="text" class="form-control ui-autocomplete-input" id="webstoreSearch" placeholder="Search your webstore" tabindex="0">
                            </div>
                        </div>
                        <div class="col-md-3 col-12 search-col">
                            <div class="search-btn">
                                <button style="width:100%" href="javascript:;" class="btn btn-solid d-block" tabindex="0">search</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>



<!-- breadcrumb start -->
    <!-- <div class="breadcrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="page-title">
                        <h2>collection</h2>
                    </div>
                </div>
                <div class="col-sm-6">
                    <nav aria-label="breadcrumb" class="theme-breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{url('/')}}">home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Online Store</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div> -->
    <!-- breadcrumb end -->


    <!-- section start -->
    <section class="section-b-space ratio_asos addtocart_count ratio_square">
        <div class="collection-wrapper">
            <div class="container">
                <div class="row">
                    <div class="collection-content col">
                        <div class="page-main-content">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="collection-product-wrapper">
                                        <div class="product-wrapper-grid">
                                            <div class="row margin-res category-style-1">
                                            
                                            @foreach($webStores as $store)                          
                                            <div class="col-lg-2 col-6 col-grid-box">
                                            <div class="product-box product-wrap" >
                        <div class="category-block">
                            <a href="{{url('redirecting/'.$store->id)}}" target="_blank">
                                <div class="category-image"><img src="{{asset('../main-admin/images/webstores/'.$store->web_img)}}"
                                        class="img-fluid" alt=""></div>
                            </a>
                            <div class="category-details">
                                <a href="{{url('redirecting/'.$store->id)}}" target="_blank">
                                    <h5>{{$store->web_name}} ({{$store->web_s_dis}})</h5>
                                </a>
                                
                            </div>
                        </div>
                        </div>
                        </div>
                        @endforeach

                                            

                                            </div>
                                        </div>
                                        

                                        <div class="product-pagination">
                                            <div class="theme-paggination-block">
                                                <div class="row">
                                                    <div class="col-xl-6 col-md-6 col-sm-12">
                                                        <nav aria-label="Page navigation">
                                                            <ul class="pagination">
                                                                @php $currentPage = $page;  $number = $page++; @endphp
                                                                @if($page > 1) 
                                                                    <li class="page-item"><a class="page-link" href="{{ url('online-store?page='.($currentPage-1)) }}"
                                                                        aria-label="Previous"><span
                                                                            aria-hidden="true"><i
                                                                                class="fa fa-chevron-left"
                                                                                aria-hidden="true"></i></span> <span
                                                                            class="sr-only">Previous</span></a></li>
                                                                
                                                                @endif
                                                                
                                                                
                                                                @if($max >=$number)
                                                                <li class="page-item active"><a class="page-link"
                                                                        href="{{ url('online-store?page='.$number) }}">{{ $number; }}</a></li>
                                                                
                                                                @endif

                                                                @php $number = $page++; @endphp
                                                                @if($max >=$number)
                                                                <li class="page-item active"><a class="page-link"
                                                                        href="{{ url('online-store?page='.$number) }}">{{ $number; }}</a></li>
                                                                @endif
                                                                @php $number = $page++; @endphp
                                                                @if($max >=$number)
                                                                <li class="page-item active"><a class="page-link"
                                                                        href="{{ url('online-store?page='.$number) }}">{{ $number; }}</a></li>
                                                                @endif
                                                                @php $number = $page++; @endphp
                                                                @if($max >=$number)
                                                                <li class="page-item"><a class="page-link" href="{{ url('online-store?page='.($currentPage+1)) }}"
                                                                        aria-label="Next"><span aria-hidden="true"><i
                                                                                class="fa fa-chevron-right"
                                                                                aria-hidden="true"></i></span> <span
                                                                            class="sr-only">Next</span></a></li>
                                                                @endif
                                                            </ul>
                                                        </nav>
                                                    </div>
                                                    <div class="col-xl-6 col-md-6 col-sm-12">
                                                        <div class="product-search-count-bottom">
                                                            <h5>Showing Products {{($currentPage-1)*$limit + 1}}-{{$currentPage*$limit}} of {{ $totalCount }} Result</h5>
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
    </section>
    <!-- section End -->




@endsection

@section('scripts')
<script type="text/javascript">
    
    $("button.add-button").click(function () {
        $(this).next().addClass("open");
        $(".qty-input").val('1');
        triggerNotification('success','Item Successfully added to your cart');
        var ele = $(this);
        $.ajax({
            url: '{{ route('update.cart') }}',
            method: "patch",
            data: {
                _token: '{{ csrf_token() }}', 
                id: ele.parents(".product-box").attr("data-id"), 
                quantity: ele.parents(".product-box").find(".qty-input").val()
            },
            success: function (response) {
                checkcartvalue();
            }
        });
        
    });

    $('.quantity-right-plus').on('click', function () {
    var $qty = $(this).siblings(".qty-input");
    var currentVal = parseInt($qty.val());
    if (!isNaN(currentVal)) {
        $qty.val(currentVal + 1);
    }
    triggerNotification('success','Item Successfully added to your cart');
        var ele = $(this);
        $.ajax({
            url: '{{ route('update.cart') }}',
            method: "patch",
            data: {
                _token: '{{ csrf_token() }}', 
                id: ele.parents(".product-box").attr("data-id"), 
                quantity: ele.parents(".product-box").find(".qty-input").val()
            },
            success: function (response) {
                checkcartvalue();
            }
        });
    });

    $('.quantity-left-minus').on('click', function () {
        var $qty = $(this).siblings(".qty-input");
        var _val = $($qty).val();
        if (_val == '1') {
            var _removeCls = $(this).parents('.cart_qty');
            $(_removeCls).removeClass("open");
        }
        var currentVal = parseInt($qty.val());
        if (!isNaN(currentVal) && currentVal > 0) {
            $qty.val(currentVal - 1);
        }
        var ele = $(this);
        $.ajax({
            url: '{{ route('update.cart') }}',
            method: "patch",
            data: {
                _token: '{{ csrf_token() }}', 
                id: ele.parents(".product-box").attr("data-id"), 
                quantity: ele.parents(".product-box").find(".qty-input").val()
            },
            success: function (response) {
                checkcartvalue();
            }
        });
    });

  
</script>

<script type="text/javascript">
    var cId =  "162830";

    (function(d, t) {
      var s = document.createElement("script");
      s.type = "text/javascript";
      s.async = true;
      s.src = (document.location.protocol == "https:" ? "https://cdn0.cuelinks.com/js/" : "http://cdn0.cuelinks.com/js/")  + "cuelinksv2.js";
      document.getElementsByTagName("body")[0].appendChild(s);
    }());
</script>


<script>



var onlineStore = new Bloodhound({
    datumTokenizer: Bloodhound.tokenizers.obj.whitespace('name'),
    queryTokenizer: Bloodhound.tokenizers.whitespace,
    remote: {
        url: '{{url('/')}}/online-store-search/%QUERY',
        wildcard: '%QUERY'
    },
    });
    onlineStore.initialize();

    $('#webstoreSearch').typeahead({
    hint: true,
    highlight: true,
    minLength: 1
    },
    {
    name: 'onlineStore',
    display: 'name',
    source: onlineStore,
    templates: {
        empty: [
        '<div class="empty-message">',
        'No Record Found !',
        '</div>'
        ].join('\n'),
        suggestion: function (data) {
        return '<a href="'+data.url+'" class="man-section"><div class="image-section"><img ></div><div class="description-section"><h4>'+data.name+'</h4></div></a>';
    }
    }
    });


</script>

@endsection