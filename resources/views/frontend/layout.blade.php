<!DOCTYPE html>
{{--<html  xml:lang="ar"  xmlns="http://www.w3.org/1999/xhtml" dir="ltr" lang="ar-AR">--}}
<html>
<head>

    <!-- Meta Tag -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name='copyright' content=''>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Title Tag  -->
    <title>Mohammad Abo Sultan Shop | @yield('title' , '')</title>
    <!-- Favicon -->
    <link rel="icon" type="image/png" href="{{ asset('assets/frontend/images/favicon.png') }}">
    <!-- Web Font -->
    <link
        href="https://fonts.googleapis.com/css?family=Poppins:200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&display=swap"
        rel="stylesheet">

    <!-- StyleSheet -->
@yield('extra-css')
{{--    <style>--}}
{{--        html {--}}
{{--            direction: rtl;--}}
{{--            text-align: right;--}}
{{--        }--}}
{{--    </style>--}}
<!-- Bootstrap -->
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/bootstrap.css') }}">
    <!-- Magnific Popup -->
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/magnific-popup.min.css') }}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/font-awesome.css') }}">
    <!-- Fancybox -->
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/jquery.fancybox.min.css') }}">
    <!-- Themify Icons -->
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/themify-icons.css') }}">
    <!-- Nice Select CSS -->
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/niceselect.css') }}">
    <!-- Animate CSS -->
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/animate.css') }}">
    <!-- Flex Slider CSS -->
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/flex-slider.min.css') }}">
    <!-- Owl Carousel -->
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/owl-carousel.css') }}">
    <!-- Slicknav -->
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/slicknav.min.css') }}">

    <!-- Eshop StyleSheet -->
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/reset.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/frontend/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/responsive.css') }}">
    @if(config('app.locale') == 'ar')
        <link rel="stylesheet" href="{{ asset('assets/frontend/bootstrap-rtl.css') }}">
    @endif


</head>
<body class="js">

@include('frontend.partials.preload')


@include('frontend.partials.header')


@yield('content')




@include('frontend.partials.footer')


<!-- Jquery -->
<script src="{{ asset('assets/frontend/js/jquery.min.js') }}"></script>
<script src="{{ asset('assets/frontend/js/jquery-migrate-3.0.0.js') }}"></script>
<script src="{{ asset('assets/frontend/js/jquery-ui.min.js') }}"></script>
<!-- Popper JS -->
<script src="{{ asset('assets/frontend/js/popper.min.js') }}"></script>
<!-- Bootstrap JS -->
<script src="{{ asset('assets/frontend/js/bootstrap.min.js') }}"></script>
<!-- Color JS -->
<script src="{{ asset('assets/frontend/js/colors.js') }}"></script>
<!-- Slicknav JS -->
<script src="{{ asset('assets/frontend/js/slicknav.min.js') }}"></script>
<!-- Owl Carousel JS -->
<script src="{{ asset('assets/frontend/js/owl-carousel.js') }}"></script>
<!-- Magnific Popup JS -->
<script src="{{ asset('assets/frontend/js/magnific-popup.js') }}"></script>
<!-- Waypoints JS -->
<script src="{{ asset('assets/frontend/js/waypoints.min.js') }}"></script>
<!-- Countdown JS -->
<script src="{{ asset('assets/frontend/js/finalcountdown.min.js') }}"></script>
<!-- Nice Select JS -->
<script src="{{ asset('assets/frontend/js/nicesellect.js') }}"></script>
<!-- Flex Slider JS -->
<script src="{{ asset('assets/frontend/s/flex-slider.js') }}j"></script>
<!-- ScrollUp JS -->
<script src="{{ asset('assets/frontend/js/scrollup.js') }}"></script>
<!-- Onepage Nav JS -->
<script src="{{ asset('assets/frontend/js/onepage-nav.min.js') }}"></script>
<!-- Easing JS -->
<script src="{{ asset('assets/frontend/js/easing.js') }}"></script>
<!-- Active JS -->
<script src="{{ asset('assets/frontend/js/active.js') }}"></script>

<!-- product option values -->
    <script>

        $(document).on('change', '.selectBox', function () {


            //get all select option
            var selectOptions = $('.selectBox option:selected');
            var arr = new Array();

            selectOptions.each(function () {
                var val = $(this).val();
                if (!(val == null || val == '')) {
                    arr.push($(this).val());
                }
            });

            if (arr.length > 0) {
                $('.quickview-content').animate({'opacity': '0.4'});

                $.ajaxSetup({
                    header: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    }
                });

                $.ajax({
                    url: '{{ url('/') }}' + '/product/' + "{{ $product->id }}" + '/variant-price',
                    method: 'GET',
                    data: {values: arr},
                    success: function (response) {
                        var price = response.variant_price;
                        $('.variant-price').text(price)
                        $('.quickview-content').animate({'opacity': '1'});
                    },
                    error: function (e) {
                        $('.quickview-content').animate({'opacity': '1'});

                        $('.quantity').remove();
                        $('.default-social').html('<button class="btn btn-unavailable " > UNAVAILABLE </button>');
                        $('.add-to-cart').remove();


                        if (confirm('Reload this page some item invalid!')) {
                            location.reload();
                        }
                    }
                })

            }else
            {
                $('.variant-price').text('')
            }


        })
    </script>

@yield('extra-js')


</body>
</html>
