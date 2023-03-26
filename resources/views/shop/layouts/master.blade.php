
<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1.0">
    <meta name="description" content="multikart">
    <meta name="keywords" content="multikart">
    <meta name="author" content="multikart">
    <link rel="icon" href="{{ asset('assets/images/icon/logo/37.ico') }}" type="image/x-icon" />
    <link rel="shortcut icon" href="{{ asset('assets/images/icon/logo/37.ico') }}" type="image/x-icon" />
    <title>Unitymall</title>

    <!--Google font-->
    <link rel="preconnect" href="https://fonts.googleapis.com/">
    <link rel="preconnect" href="https://fo nts.gstatic.com/">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/themify-icons/0.1.2/css/themify-icons.css">
        {{-- for extra head data --}}
        @yield('head')

        {{-- seo meta data --}}
        @yield('seo')

        {{-- all styles --}}
        @include('shop.styles')

        {{-- Extra Styles --}}
        @yield('styles')

</head>


<body class="theme-color-30 mulish-font">

    

        @section('body-header')
        
        {{--  header  --}}
            @include('shop.layouts.header')

        @show


        {{-- main app --}}
        @yield('content-wrapper')

        {{-- footer --}}
        @section('footer')
            

        @include('shop.layouts.footer')

            
        

        <!-- tap to top -->
        <div class="tap-top">
            <div>
                <i class="fa fa-angle-double-up"></i>
            </div>
        </div>
        <!-- tap to top End -->

        @show
        {{-- all scripts --}}
        @include('shop.scripts')

        @yield('scripts')

        </body>
</html>