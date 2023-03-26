@extends('shop.layouts.master')


@section('content-wrapper')

 <!-- breadcrumb start -->
 <div class="breadcrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="page-title">
                        <h2>cart</h2>
                    </div>
                </div>
                <div class="col-sm-6">
                    <nav aria-label="breadcrumb" class="theme-breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                            <li class="breadcrumb-item active">cart</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb End -->


    <!--section start-->
    <section class="cart-section section-b-space">
        <div class="container">
            <div class="row">
                
                <div class="col-sm-12 table-responsive-xs">
                    <table class="table cart-table">
                        <thead>
                            <tr class="table-head">
                                <th scope="col">image</th>
                                <th scope="col">product name</th>
                                <th scope="col">price</th>
                                <th scope="col">Coins</th>
                                <th scope="col">quantity</th>
                                <th scope="col">action</th>
                                <th scope="col">total</th>
                            </tr>
                        </thead>
                        <tbody>
                        @php $total = $shipping = $coin = 0 @endphp
                        @if(session('cart'))
                        @foreach(session('cart') as $id => $details)
                        @php $total += $details['price'] * $details['quantity']; $coin += $details['coin']; $shipping += $details['shipping']; @endphp
                            <tr data-id="{{ $id }}">
                                <td>
                                    <a href="#"><img src="{{ $details['image'] }}" alt=""></a>
                                </td>
                                <td><a href="#">{{ $details['name'] }}</a>
                                    <div class="mobile-cart-content row">
                                        <div class="col">
                                            <div class="qty-box">
                                                <div class="input-group">
                                                    <input type="text" name="quantity" class="form-control input-number"
                                                        value="1">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <h2 class="td-color">₹{{ $details['price'] }}</h2>
                                        </div>
                                        <div class="col">
                                            <h2 class="td-color"><a href="#" class="icon"><i class="ti-close"></i></a>
                                            </h2>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <h2>₹{{ $details['price'] }}</h2>
                                </td>
                                <td>
                                    <h2>{{ $details['coin'] }}</h2>
                                </td>
                                <td>
                                    <div class="qty-box">
                                        <div class="input-group">
                                            <input type="number" name="quantity" class="form-control input-number quantity update-cart"
                                                value="{{ $details['quantity'] }}">
                                        </div>
                                    </div>
                                </td>
                                <td><a class="remove-from-cart" href="javascript:;" class="icon"><i class="ti-close"></i></a></td>
                                <td>
                                    <h2 class="td-color">₹{{ $details['price'] * $details['quantity'] }}</h2>
                                </td>
                            </tr>

                            @endforeach
                            @endif
                        </tbody>
                        
                       
                    </table>
                    <div class="table-responsive-md">
                        <table class="table cart-table ">
                            <tfoot>
                                <tr>
                                    <td>total price :</td>
                                    <td>
                                        <h2>₹{{ $total }}</h2>
                                    </td>
                                </tr>
                                <tr>
                                    <td>shipping Charges:</td>
                                    <td>
                                        <h2>₹{{ ($shipping < 500)?$shipping:0 }}</h2>
                                    </td>
                                </tr>
                                <tr>
                                    <td>total Coins :</td>
                                    <td>
                                        <h2>{{ $coin }}</h2>
                                    </td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
            <div class="row cart-buttons">
                <div class="col-6"><a href="{{url('/')}}" class="btn btn-solid">continue shopping</a></div>
                <div class="col-6"><a href="{{url('/checkout')}}" class="btn btn-solid">check out</a></div>
            </div>
        </div>
    </section>
    <!--section end-->

@endsection


@section('scripts')
<script type="text/javascript">
  
    $(".update-cart").change(function (e) {
        e.preventDefault();
        var ele = $(this);
  
        $.ajax({
            url: '{{ route('update.cart') }}',
            method: "patch",
            data: {
                _token: '{{ csrf_token() }}', 
                id: ele.parents("tr").attr("data-id"), 
                quantity: ele.parents("tr").find(".quantity").val()
            },
            success: function (response) {
               window.location.reload();
            }
        });
    });
  
    $(".remove-from-cart").click(function (e) {
        e.preventDefault();
  
        var ele = $(this);
  
        if(confirm("Are you sure want to remove?")) {
            $.ajax({
                url: '{{ route('remove.from.cart') }}',
                method: "DELETE",
                data: {
                    _token: '{{ csrf_token() }}', 
                    id: ele.parents("tr").attr("data-id")
                },
                success: function (response) {
                    window.location.reload();
                }
            });
        }
    });
  
</script>
@endsection