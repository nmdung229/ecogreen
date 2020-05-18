<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>{{ (isset($title)) ? "$title" : '' }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css?family=Gotu|Montserrat:200,300,400,500,600,700|Quicksand:300,400,500,600|Source+Code+Pro:300,400,500,600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
    <link rel="stylesheet" href="/frontend/css/layout.css">
    <link rel="stylesheet" href="/frontend/css/index.css">
    <link rel="stylesheet" href="/frontend/css/product.css">
    <link rel="stylesheet" href="/frontend/css/productDetail.css">
    <link rel="stylesheet" href="/frontend/css/cartDetails.css">
    <link rel="stylesheet" href="/frontend/css/blog.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.0/jquery.min.js"></script>

</head>
<body>
    @yield('background')
<header>
    @include('shop.layouts.header')
</header>
    @yield('content')
<footer>
    @include('shop.layouts.footer')
</footer>
    @include('shop.layouts.cart')
    <script src="/frontend/js/cart.js"></script>
    <script src="/frontend/js/layout.js"></script>
</body>
</html>
