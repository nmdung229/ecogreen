
<div class="menu">
    <div class="container d-flex justify-content-between">
        <div class="logo">
            <a href="{{ route('shop.home') }}"><img src="/frontend/img/eco-green-logo.jpg" alt="" width="170px" height="50px" style="margin-top: 30px;"></a>
        </div>
        <div class="menu-top">
            <ul>
                <li> <a href="{{ route('shop.home') }}"> Trang chủ</a></li>
                <li> <a href="{{ route('shop.product') }}"> Sản phẩm </a></li>
                <li> <a href="{{ route('blog') }}"> Blog </a></li>
                @if(\Illuminate\Support\Facades\Auth::user())
                    <li style="color: yellowgreen">{{ "Hello, " . Auth::user()->name}}</li>
                    <li><a href="{{ route('getLogout') }}">Đăng xuất</a></li>
                @else
                    <li><a href="{{ route('getUserLogin') }}">Đăng nhập</a></li>
                @endif




            </ul>
            <ul>
                <li class="btn-show-cart" onclick="showCartBox()"> <a href="javascript:void(0)"> <i class="fas fa-shopping-cart"></i> <sup class="cart-count">0</sup> </a></li>
            </ul>
        </div>

    </div>
</div>
