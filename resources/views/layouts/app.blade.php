<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{-- Dynamic title --}}
    <title>@yield('title')</title>

    {{-- SEO Added Meta tags--}}
    <meta name="description" content="@yield('meta_description')">
    <meta name="keywords" content="@yield('meta_keyword')">
    <meta name="author" content="Funda of Web It">



    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('assets/css/styles.css') }}" rel="stylesheet">
    
    {{-- Custom-styles --}}
    <link href="{{ asset('assets/css/custom.css') }}" rel="stylesheet">
    
    {{-- Owl Carousel css --}}
    <link href="{{ asset('assets/css/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/owl.theme.default.min.css') }}" rel="stylesheet">


</head>
<body>
    <div id="app">
      
        @include('layouts.inc.frontend-navbar')

        <main>
            @yield('content')
        </main>
         @include('layouts.inc.frontend-footer')
    </div>

        <!-- Scripts -->

        {{-- Jquery --}}
    <script src="{{ asset('assets/js/jquery-3.6.0.min.js') }}"></script>

    {{-- Bootstrap Bundle js --}}
    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
    
    {{-- Owl Carousel js --}}
    <script src="{{ asset('assets/js/owl.carousel.min.js') }}"></script>

    <script>
        $('.category-carousel').owlCarousel({
    loop:true,
    margin:10,
    nav:true,
    dots:false,
    responsive:{
        0:{
            //Show 2 carousel per page
            items:2
        },
        600:{
            items:3
        },
        1000:{
            items:4
        }
    }
})
    </script>
</body>
</html>
