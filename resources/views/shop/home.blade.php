@extends('shop.layouts.main')
@section('content')
    <div class="slider">
        <div class="slider-container">
            <div class="slider__container">

                @foreach($banners as $slide)
                    <div class="slider-item" style="display: block;">
                        <a href="{{ $slide->url }}">
                            <div class="img">
                                <img src="{{ asset($slide->image) }}" alt="{{ $slide->slug }}">
                            </div>
                            <div class="content">
                                <p class="title"> {{ $slide->title }}</p>
                                <p> {!! $slide->description !!} </p>
                            </div>
                        </a>

                    </div>

                @endforeach

{{--                <div class="slider-item" style="display: none;">--}}
{{--                    <a href="#">--}}
{{--                        <div class="img">--}}
{{--                            <img src="https://static.wixstatic.com/media/1c272d_eb123c0ca3154f01b35399bc0f28a589~mv2_d_4992_3328_s_4_2.jpg/v1/fill/w_1899,h_719,al_c,q_85,usm_0.66_1.00_0.01/1c272d_eb123c0ca3154f01b35399bc0f28a589~mv2_d_4992_3328_s_4_2.webp">--}}
{{--                        </div>--}}
{{--                        <div class="content">--}}
{{--                            <p class="title"> Sản phẩm được làm 100% hữu cơ  </p>--}}
{{--                            <p> Chất lượng - Đảm bảo - Uy tín </p>--}}
{{--                        </div>--}}
{{--                    </a>--}}

{{--                </div>--}}
{{--                <div class="slider-item" style="display: none;">--}}
{{--                    <a href="#">--}}
{{--                        <div class="img">--}}
{{--                            <img src="https://images.pexels.com/photos/461428/pexels-photo-461428.jpeg?auto=compress&amp;cs=tinysrgb&amp;dpr=2&amp;h=650&amp;w=940">--}}
{{--                        </div>--}}
{{--                        <div class="content">--}}
{{--                            <p class="title"> Bạn đã biết gì về đồ dùng hữu cơ </p>--}}
{{--                            <p> tin tức mới nhất   </p>--}}
{{--                        </div>--}}
{{--                    </a>--}}
{{--                </div>--}}
                <div class="btn-direct">
                    <button class="prew"> <i class="fas fa-angle-left"></i> </button>
                    <button class="next"> <i class="fas fa-angle-right"></i> </button>
                </div>
            </div>
        </div>
    </div>
    <div class="section-01">
        <div class="box-content container">
            <div class="box-titles">
                <h2> Giảm giá trong ngày </h2>
                <p> Mua nhanh để không bỏ lỡ những ưu đãi cực tốt !</p>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="img">
                        <img src="/frontend//img/anh03.webp" alt="" class="img-fluid">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="content">
                        <p class="name"> Ống hút gỗ </p>
                        <p class="price"> 100.000Đ</p>
                        <p class="des"> An toàn, sạch sẽ, thân thiện với môi trường và có thể tái sử dụng tối đa 100 lần.</p>
                        <p class="d-flex count-time">
                            <span class="day">02  </span>
                            <span> : </span>
                            <span class="hour"> 22 </span>
                            <span> : </span>
                            <span class="minutes"> 02</span>
                            <span> : </span>
                            <span class="second"> 00 </span>
                        </p>
                        <div class="d-flex">
                            <button class="addToCart btn-custom-01"> <span> Tiếp tục</span></button>
                            <button class="btn-custom-01 like"> <span> <i class="far fa-heart"></i> </span> </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="section-02">
        <div class="container">
            <div class="box-titles">
                <h2> Sản phẩm bán chạy</h2>
                <p> 2 sản phẩm cốt lõi của team <b>Ecogreen</b> luôn tự hào có thể chiều lòng những khách hàng khó tính nhất</p>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="content text-right">
                        <p class="name"> Bột giặt</p>
                        <p class="des"> Thành phần gồm những nguyên liệu thiên nhiên, hoàn toàn không có chất tẩy rửa gây hại đến sức khỏe người dùng.  </p>
                        <p class="price"> 199.000Đ</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="img">
                        <img src="/frontend//img/anh-png-01.webp" alt="" class="img-fluid">
                    </div>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-6">
                    <div class="img text-right" >
                        <img src="/frontend//img/anh-png-02.webp" alt="" class="img-fluid">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="content text-left">
                        <p class="name"> Son tự nhiên </p>
                        <p class="des"> Chiết xuất từ thành phần thiên nhiên, hoàn toàn không chứa chì.  </p>
                        <p class="price"> 299.000Đ</p>
                    </div>
                </div>
            </div>
            <div class="text-center">
                <button class="btn-custom-01"><a href="{{ route('shop.product') }}" style="text-decoration: none;"> <span> Xem nhiều hơn</span>  </a></button>
            </div>
        </div>
    </div>
    <div class="section-03">
        <div class="container">
            <div class="box-titles">
                <h2> Sản phẩm mới </h2>
                <p></p>
            </div>
            <div class="list-products">

                @foreach($products as $item)
                    <div class="product-item" id="{{ $item->id }}">
                        <div class="img">
                            <img src="{{ asset($item->image) }}" alt="" class="img-fluid" style="width: 100%; max-height: 288.6px">
                        </div>
                        <div class="post-product">
                            <p>{{ (strlen($item->name) <= 35) ? $item->name : substr($item->name,0,35) . "..." }}</p>
                        </div>
                        <p class="price">{{  number_format($item->sale,0,",",".") }}Đ</p>
                        <div class="d-flex justify-content-start">
                            <button class="btn-custom-01 btn-add-card" data-id = "{{ $item->id }}"> <span>  Mua ngay </span></button>
                            <a href="{{ route('shop.product.show',['id' => $item->id])}}"><button class="btn-custom-02" > <span>  Xem chi tiết </span></button></a>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>

    </div>
    <div class="section-04">
        <div class="categories">
            @foreach($categories as $category)
                <div class="category">
                    <a href=" {{ route('shop.product.byCategory', [ 'id' => $category->id ]) }}">
                        <img src="{{ ($category->image != null ) ? $category->image  : "https://vietcetera.com/wp-content/uploads/2020/01/song-xanh-featured.jpg" }}" alt="" class="img-fluid">
                        <div class="content">
                            <p class="title">
                                {{ $category->name }}
                            </p>
                            <p class="post"><?php $create = date('M d, Y', strtotime($category->created_at)); echo $create ?></p>
                        </div>
                    </a>
                </div>
            @endforeach


{{--            <div class="category">--}}
{{--                <a href="">--}}
{{--                    <img src="https://vietcetera.com/wp-content/uploads/2020/01/song-xanh-featured.jpg" alt="" class="img-fluid">--}}
{{--                    <div class="content">--}}
{{--                        <p class="title">--}}
{{--                            Ngoài giảm nhựa, chúng ta cần làm gì để sống xanh--}}
{{--                        </p>--}}
{{--                        <p class="post"> April, 21, 2020</p>--}}
{{--                    </div>--}}
{{--                </a>--}}
{{--            </div>--}}


        </div>
    </div>
    <div class="section-05">
        <div class="container">
            <div class="box-blog">
                <div class="row m-0">
                    <div class="col-md-5">
                        <div class="img">
                            <img src="https://vietcetera.com/wp-content/uploads/2020/01/song-xanh-3.jpg" alt="" class="img-fluid">
                        </div>
                    </div>
                    <div class="col-md-7">
                        <div class="content">
                            <h3>{{ $feature_blog[0]->title }}</h3>
                            <p class="post-date"><?php $create = date('M d, Y', strtotime($feature_blog[0]->created_at)); echo $create ?> {{ 'by '. " $authorname" }}</p>
                            <p class="sumary-content">{!! $feature_blog[0]->summary !!}</p>
                            <a href="{{ route('blog.detail', [ 'id' => $feature_blog[0]->id]) }}" class="btn-custom-01"> <span>Xem thêm</span> </a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <script src="/frontend/js/slider.js"></script>
        <script src="/frontend/js/index.js"></script>

{{--        <script src = "/frontend/js/slider.js"></script>--}}
    </div>
@endsection
