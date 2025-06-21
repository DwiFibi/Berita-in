<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Metas -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="keywords" content="HTML5 Template Iteck Multi-Purpose themeforest" />
    <meta name="description" content="Iteck - Multi-Purpose HTML5 Template" />
    <meta name="author" content="" />

    <!-- Title  -->
    <title>Berita'in</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('img/logoBeritain.png') }}" title="Favicon" sizes="16x16">

    <!-- bootstrap 5 -->
    <link rel="stylesheet" href="{{ asset('css/lib/bootstrap.min.css') }}">

    <!-- font family -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Zilla+Slab:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">

    <!-- ionicons icons -->
    <link rel="stylesheet" href="{{ asset('css/lib/ionicons.css') }}">
    <!-- line-awesome icons -->
    <link rel="stylesheet" href="{{ asset('css/lib/line-awesome.css') }}">
    <!-- animate css -->
    <link rel="stylesheet" href="{{ asset('css/lib/animate.css') }}">
    <!-- fancybox popup -->
    <link rel="stylesheet" href="{{ asset('css/lib/jquery.fancybox.css') }}">
    <!-- lity popup -->
    <link rel="stylesheet" href="{{ asset('css/lib/lity.css') }}">
    <!-- swiper slider -->
    <link rel="stylesheet" href="{{ asset('css/lib/swiper.min.css') }}">
    <!-- icon dark/light mode -->
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet" />
    <!-- font <head> -->
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet" />
    <!-- swiper -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>


    <!-- ====== main style ====== -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    <title>Berita'in</title>

    <!-- ====== styling dropdown ====== -->
    <style>
        .dropdown-menu {
            scrollbar-width: thin;
            scrollbar-color: #ccc #f9f9f9;
        }

        .dropdown-menu::-webkit-scrollbar {
            width: 6px;
        }

        .dropdown-menu::-webkit-scrollbar-track {
            background: #f9f9f9;
        }

        .dropdown-menu::-webkit-scrollbar-thumb {
            background-color: #ccc;
            border-radius: 4px;
        }
    </style>


</head>

<body>
    @yield('content')


    <script src="{{ asset('js/custom/jquery-3.0.0.min.js') }}"></script>
    <script src="{{ asset('js/custom/jquery-migrate-3.0.0.min.js') }}"></script>
    <script src="{{ asset('js/custom/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('js/custom/wow.min.js') }}"></script>
    <script src="{{ asset('js/custom/jquery.fancybox.js') }}"></script>
    <script src="{{ asset('js/custom/lity.js') }}"></script>
    <script src="{{ asset('js/custom/swiper.min.js') }}"></script>
    <script src="{{ asset('js/custom/jquery.waypoints.min.js') }}"></script>
    <script src="{{ asset('js/custom/jquery.counterup.js') }}"></script>
    <script src="{{ asset('js/custom/pace.js') }}"></script>
    <script src="{{ asset('js/custom/back-to-top.js') }}"></script>
    <script src="{{ asset('js/custom/mixitup.min.js') }}"></script>
    <script src="{{ asset('js/custom/parallaxie.js') }}"></script>
    <script src="{{ asset('js/custom/main.js') }}"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
    <script src="https://cdn.jsdelivr.net/npm/toastify-js"></script>



</body>
