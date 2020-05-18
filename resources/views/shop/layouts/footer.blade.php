<div class="footer">
    <div class="row">
        <div class="col-md-3">
            <img src="/frontend/img/logo-ecogreen-nobackground.png" width="250px" style="border-radius: 5px">
            <div class="content">
                <p> Chúng tôi luôn ưu tiên mang đến những sản phẩm tốt nhất cho quý khách</p>
            </div>
        </div>
        <div class="col-md-3">
            <a href="{{ route('shop.product') }}" style="text-decoration: none;"><h3>Sản phẩm</h3></a>


            <ul>
                <?php
                    $footer_categories = \App\Category::where('is_active', 1)->get();
                    $blogs = \App\Post::where('is_active', 1)->limit(5)->orderBy('id', 'desc')->get();
                ?>
                @foreach($footer_categories as $category)
                        <li> <a href="{{ route('shop.product') }}">{{ $category->name }}</a>  </li>
                @endforeach
{{--                <li> <a href="#">Công nghệ xanh</a>  </li>--}}
{{--                <li> <a href="#">Đồ dùng da dụng</a> </li>--}}
{{--                <li> <a href="#">Đồ dùng văn phòng</a> </li>--}}
{{--                <li> <a href="#">Thời trang</a> </li>--}}
            </ul>
        </div>
        <div class="col-md-3">
            <a href="{{ route('blog') }}" style="text-decoration: none;"><h3>Blog kiến thức</h3></a>
            <ul>
                @foreach($blogs as $blog)
                    <li> <a href="{{ route('blog.detail', [ 'id' => $blog->id]) }}">{{ substr($blog->title,0,20 )."..." }}</a>  </li>
                @endforeach
{{--                <li> <a href="#">Môi trường</a>  </li>--}}
{{--                <li> <a href="#">Đồ dùng tái chế</a></li>--}}
{{--                <li> <a href="#">Cuộc sống thường ngày </a></li>--}}
            </ul>
        </div>
        <div class="col-md-3">
            <h3> Liên hệ </h3>
            <ul>
                <li> <i class="far fa-envelope"></i> contact.ecogreen@gmail.com</li>
                <li> <i class="fab fa-facebook-f"></i>facebook.com/lucnguyenxk</li>
                <li> <i class="fas fa-phone-alt"></i>+84 354830236</li>
            </ul>
        </div>
    </div>

</div>
<div class="footer-bottom">
    <p> Copy right <strong> Group 8 </strong>  April, 2020</p>
</div>
