<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>@yield('title')</title>
    <script src="https://kit.fontawesome.com/23f1789103.js" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.gstatic.com" />
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Archivo:wght@400;500;700&display=swap" rel="stylesheet" />
    <!-- Favicon -->
    <link rel="shortcut icon" href="{{asset('/')}}public/front/img/logo.png" type="image/x-icon" />
    <!-- Glidejs Carousel -->
    <link rel="stylesheet" href="{{asset('/')}}public/front/node_modules/@glidejs/glide/dist/css/glide.core.min.css" />
    <link rel="stylesheet" href="{{asset('/')}}public/front/node_modules/@glidejs/glide/dist/css/glide.theme.min.css" />
    <!-- Animate On Scroll -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet" />

    <link rel="stylesheet" href="{{asset('/')}}public/front/css/style.css" />
    @yield('css')

    <style type="text/css">
    .cart-img {
        position: relative;
    }

    .cart-img .item-counter {
        position: absolute;
        bottom: -10px;
        right: 5px;
    }

    .cart-image-link {
        position: relative;
    }

    .item-counter2 {
        position: absolute;
        bottom: -5px;
    }

    .mobile-logo-link {
        display: inherit;
    }


    .mobile-shopping-cart-link {
        display: flex;
        align-items: center;
        justify-content: flex-end;
    }

    @font-face {
        font-family: gill;
        src: url('{{ asset('public/admin/font/GillSans.otf') }}');
    }

    @font-face {
        font-family: gothic;
        src: url('{{ asset('public/admin/font/gothic/gothic.ttf') }}');
    }

    @media (max-width: 575.98px) {
      .header_top{
        display: none !important;
      }
    }

    </style>

</head>

<body>


    @include('front.include.header')

    @yield('body')

    @include('front.include.footer')

    <!-- JavaScript Links  -->
    <!-- JavaScript Links  -->
    <!-- JavaScript Links  -->
    <!-- JavaScript Links  -->
    <!-- JavaScript Links  -->
    <!-- JavaScript Links  -->
    <!-- Glidejs -->
    <script src="{{asset('/')}}public/front/node_modules/@glidejs/glide/dist/glide.min.js"></script>
    <!-- Animate On Scroll AOS -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="{{asset('/')}}public/front/js/index.js"></script>
    <script src="{{asset('/')}}public/front/js/banner.js"></script>
    <script src="{{asset('/')}}public/front/js/slider.js"></script>
    <script src="{{asset('/')}}public/front/js/products.js"></script>
    <!-- JavaScript Links  -->
    <!-- JavaScript Links  -->
    <!-- JavaScript Links  -->
    <!-- JavaScript Links  -->
    <!-- JavaScript Links  -->
    <!-- JavaScript Links  -->
</body>

</html>