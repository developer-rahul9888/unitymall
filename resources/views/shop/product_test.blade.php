@extends('shop.layouts.master')


@section('content-wrapper')

<!-- breadcrumb start -->
<div class="breadcrumb-section">
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
                            <li class="breadcrumb-item"><a href="index.html">home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">collection</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
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
                                            <div class="row margin-res">

                                            @foreach ($products as $product)
                                            @php $percent = ''; $class = ''; $qty = 0; $cart = session()->get('cart', []); 
                                                if($product->cost < $product->price) {
                                                    $diff = ($product->price - $product->cost)*100;
                                                    $percent = floor($diff/$product->price);
                                                }
                                                if(isset($cart[$product->id])) {
                                                    $class = 'open'; $qty = $cart[$product->id]['quantity'];
                                                }  @endphp
                                                <div class="col-lg-2 col-6 col-grid-box">
                        <div class="product-box product-wrap" data-id="{{ $product->id }}">
                            <div class="img-wrapper">
                                @if($percent)
                                <div class="lable-block"><span class="lable3">{{$percent}}% OFF</span> </div>
                                @endif
                                <div class="front">
                                <a href="{{url('/product-details/'.$product->p_id)}}"><img alt="" src="{{ asset('../main-admin/images/product/'.$product->image) }}"
                                                                class="img-fluid blur-up lazyload bg-img"></a>
                                </div>
                                <div class="addtocart_btn">
                                    <button class="add-button add_cart" title="Add to cart">
                                        Add to Cart
                                    </button>
                                    <div class="qty-box cart_qty {{ $class }}">
                                        <div class="input-group">
                                            <button type="button" class="btn quantity-left-minus" data-type="minus"
                                                data-field="">
                                                <i class="fa fa-minus" aria-hidden="true"></i>
                                            </button>
                                            <input type="text" name="quantity"
                                                class="form-control input-number qty-input" value="{{ $qty }}">
                                            <button type="button" class="btn quantity-right-plus" data-type="plus"
                                                data-field="">
                                                <i class="fa fa-plus" aria-hidden="true"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="product-detail text-center">
                                
                                <a href="product-page(no-sidebar).html">
                                    <h6>{{ $product->pname }}</h6>
                                </a>
                                <h4>₹{{ $product->cost }}<del>₹{{ $product->price }}</del></h4>
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
                                                                    <li class="page-item"><a class="page-link" href="{{ url('product?page='.($currentPage-1)) }}"
                                                                        aria-label="Previous"><span
                                                                            aria-hidden="true"><i
                                                                                class="fa fa-chevron-left"
                                                                                aria-hidden="true"></i></span> <span
                                                                            class="sr-only">Previous</span></a></li>
                                                                
                                                                @endif
                                                                
                                                                
                                                                @if($max >=$number)
                                                                <li class="page-item active"><a class="page-link"
                                                                        href="{{ url('product?page='.$number) }}">{{ $number; }}</a></li>
                                                                
                                                                @endif

                                                                @php $number = $page++; @endphp
                                                                @if($max >=$number)
                                                                <li class="page-item active"><a class="page-link"
                                                                        href="{{ url('product?page='.$number) }}">{{ $number; }}</a></li>
                                                                @endif
                                                                @php $number = $page++; @endphp
                                                                @if($max >=$number)
                                                                <li class="page-item active"><a class="page-link"
                                                                        href="{{ url('product?page='.$number) }}">{{ $number; }}</a></li>
                                                                @endif
                                                                @php $number = $page++; @endphp
                                                                @if($max >=$number)
                                                                <li class="page-item"><a class="page-link" href="{{ url('product?page='.($currentPage+1)) }}"
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
@endsection