<!-- latest jquery-->
<script src="{{ asset('assets/js/jquery-3.3.1.min.js') }}"></script>

<!-- portfolio js -->
<script src="{{ asset('assets/js/isotope.min.js') }}"></script>
<script src="{{ asset('assets/js/main.js') }}"></script>

<!-- menu js-->
<script src="{{ asset('assets/js/menu.js') }}"></script>
<script src="{{ asset('assets/js/sticky-menu.js') }}"></script>

<!-- ajax search js -->
<script src="{{ asset('assets/js/typeahead.bundle.min.js') }}"></script>
<script src="{{ asset('assets/js/typeahead.jquery.min.js') }}"></script>
<script src="{{ asset('assets/js/ajax-custom.js') }}"></script>

<!-- feather icon js-->
<script src="{{ asset('assets/js/feather.min.js') }}"></script>

<!-- lazyload js-->
<script src="{{ asset('assets/js/lazysizes.min.js') }}"></script>

<!-- slick js-->
<script src="{{ asset('assets/js/slick.js') }}"></script>
<script src="{{ asset('assets/js/slick-animation.min.js') }}"></script>

<!-- Bootstrap js-->
<script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>

<!-- Bootstrap Notification js-->
<script src="{{ asset('assets/js/bootstrap-notify.min.js') }}"></script>

<!-- Theme js-->
<!-- <script src="{{ asset('assets/js/theme-setting.js') }}"></script>
<script src="{{ asset('assets/js/color-setting.js') }}"></script> -->
<script src="{{ asset('assets/js/script.js') }}"></script>
<script src="{{ asset('assets/js/custom-slick-animated.js') }}"></script>


<script>
    // $(window).on('load', function () {
    //     setTimeout(function () {
    //         $('#exampleModal').modal('show');
    //     }, 2500);
    // });

    function openSearch() {
        document.getElementById("search-overlay").style.display = "block";
    }

    function closeSearch() {
        document.getElementById("search-overlay").style.display = "none";
    }
    feather.replace();
</script>