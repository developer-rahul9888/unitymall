<!DOCTYPE html>
<html lang="en">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <meta name="description" content="multikart">
  <meta name="keywords" content="multikart">
  <meta name="author" content="multikart">
  <link rel="icon" href="{{ asset('assets/images/icon/logo/37.ico') }}" type="image/x-icon" />
  <link rel="shortcut icon" href="{{ asset('assets/images/icon/logo/37.ico') }}" type="image/x-icon" />
  <title>Unitymall</title>

  <!--Google font-->
  <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900" rel="stylesheet">
  <link rel="preconnect" href="https://fonts.gstatic.com/">
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700;800;900&amp;display=swap"
    rel="stylesheet">

  <!-- Icons -->
  <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/font-awesome.css') }}">

  <!-- Animate icon -->
  <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/animate.css') }}">

  <!-- Themify icon -->
  <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/themify-icons.css') }}">

  <!-- Bootstrap css -->
  <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/bootstrap.css') }}">

  <!-- Theme css -->
  <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/style.css') }}">


</head>

<body class="theme-color-1 bg-light">


  <!-- invoice 1 start -->
  <section class="theme-invoice-1 section-b-space">
    <div class="container">
      <div class="row">
        <div class="col-xl-8 m-auto">
          <div class="invoice-wrapper">
            <div class="invoice-header">
              <div class="upper-icon">
                <img src="https://themes.pixelstrap.com/multikart/assets/images/invoice/invoice.svg" class="img-fluid" alt="">
              </div>
              <div class="row header-content">
                <div class="col-md-6">
                    <img src="{{ asset('assets/images/icon/logo.png') }}" class="img-fluid" alt="">
                    <div class="mt-md-4 mt-3">
                    <h4 class="mb-2">
                      Unitymall INC
                    </h4>
                    <h4>karnataka</h4>
                    <h4 class="mb-2">info@unitymall.in</h4>
                    <h4 class="mb-0">GST No.  29AAYPU6483H1ZI </h4>
                  </div>
                </div>
                <div class="col-md-6 text-md-end mt-md-0 mt-4">
                  <h2>invoice</h2>
                  <div class="mt-md-4 mt-3">
                    <h4 class="mb-2">
                    {{ $invoice->p_name }}
                    </h4>
                    <h4 class="mb-2">
                    {{ $invoice->p_address }}
                    </h4>
                    <h4 class="mb-0">{{ $invoice->p_city }} {{ $invoice->p_state }}, {{ $invoice->p_zip }}</h4>
                  </div>
                </div>
              </div>
              <div class="detail-bottom">
                <ul>
                  <li><span>issue date :</span><h4> {{ $invoice->o_date->format('j F, Y g:i a') }}</h4></li>
                  <li><span>invoice no :</span><h4> {{ $invoice->id }}</h4></li>
                  <li><span>email :</span><h4> {{ $invoice->p_email }}</h4></li>
                  <li><span>phone :</span><h4> {{ $invoice->p_phone }}</h4></li>
                </ul>
              </div>
            </div>
            <div class="invoice-body table-responsive-md">
              <table class="table table-borderless mb-0">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">description</th>
                    <th scope="col">hsn</th>
                    <th scope="col">price</th>
                    <th scope="col">Qty.</th>
                    <th scope="col">net amount</th>
                    <th scope="col">gst</th>
                    <th scope="col"></th>
                    <th scope="col"></th>
                    <th scope="col">total</th>
                  </tr>
                </thead>
                <tbody>
                @php $subTotal = 0; $totalTax = 0; @endphp
                @foreach($invoice->orderItems as $key=>$item)
                  @php $dividendTaxValue = ($item->tax+100)/100; $actual_price = round($item->price/$dividendTaxValue,2);   @endphp
                  <tr>
                    <th scope="row">{{$key+1}}</th>
                    <td>{{ $item->product->pname }}</td>
                    <td>{{ $item->product->hsn }}</td>
                    <td>{{ $actual_price }}</td>
                    <td>{{ $item->quantity }}</td>
                    <td>{{ $netAmount = $actual_price*$item->quantity }}</td>
                    <td colspan="3">{{ $tax = $item->total-$netAmount }} ( {{$item->tax}} %)</td>
                    <td>{{ $item->total }}</td>
                  </tr>
                @php $totalTax += $tax; $subTotal += $netAmount; @endphp
                @endforeach
                </tbody>
                <tfoot>
                  <tr>
                    <td colspan="3" rowspan="3">
                    <table class="table mb-0">
                        <thead>
                          <tr>
                            <th scope="col">Texable Value</th>
                            <th scope="col">CGST Amount</th>
                            <th scope="col">SGST Amount</th>
                          </tr>
                          <tbody>
                            <tr >
                              <td scope="col">{{ $subTotal }}</td>
                              <td scope="col">{{ round($totalTax/2,2) }}</td>
                              <td scope="col">{{ round($totalTax/2,2) }}</td>
                            </tr>
                          </tbody>
                    </thead>
                    </table>
                    </td>
                    <td colspan="3" rowspan="3">
                    <td class="font-bold text-dark" colspan="3">SUB TOTAL</td>
                    <td class="font-bold text-theme"> {{ $subTotal }}</td>
                  </tr>
                  <tr>
                    <td class="font-bold text-dark" colspan="3">TAX</td>
                    <td class="font-bold text-theme"> {{ $totalTax }}</td>
                  </tr>
                  <tr>
                    <td class="font-bold text-dark" colspan="3">SHIPPING</td>
                    <td class="font-bold text-theme"> {{ number_format($invoice->shipping,2) }}</td>
                  </tr>
                  <tr>
                    <td colspan="6"></td>
                    <td class="font-bold text-dark" colspan="3">GRAND TOTAL</td>
                    <td class="font-bold text-theme"> {{ number_format($invoice->total_amount,2) }}</td>
                  </tr>
                </tfoot>
              </table>
            </div>
            <div class="invoice-footer text-end">
              
              <div class="buttons">
                @if($invoice->status == 'Pending' && $invoice->total_amount != 1298)
                <a href="{{ url('user/cancel-order/'.$invoice->id) }}" class="btn black-btn btn-solid rounded-2 me-2">Cancel Order</a>
                @endif
                <a href="#" class="btn black-btn btn-solid rounded-2 me-2" onclick="window.print();">export as PDF</a>
                <a href="#" class="btn btn-solid rounded-2" onclick="window.print();">print</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- invoice 1 end -->


  <!-- latest jquery-->
  <script src="../assets/js/jquery-3.3.1.min.js"></script>

  <!-- Bootstrap js-->
  <script src="../assets/js/bootstrap.bundle.min.js"></script>

</body>

</html>