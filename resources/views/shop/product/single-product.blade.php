@extends('shop.layouts.main');
@section('background')
    <div class="background">
        <img src="https://images.pexels.com/photos/772429/pexels-photo-772429.jpeg?auto=compress&amp;cs=tinysrgb&amp;dpr=2&amp;h=650&amp;w=940" alt="" class="img-fluid">
    </div>
@endsection
@section('content')

    <div class="banner">
        <div class="container">
            <div class="content ">
                <div class="container">
                    <h2> {{ $product->name }} </h2>
                    <p> {{ $vendor->name }} </p>
                </div>

            </div>
        </div>
    </div>
    <div class="product-details">
        <div class="container">
            <div class="row">
                <div class="col-md-7">
                    <div class="box-image">
                        <div class="img-display">
                            <img src="{{ asset($product->image) }}" alt="">
                        </div>
                        <div class="product-images">
                            <img src="https://images.pexels.com/photos/2878713/pexels-photo-2878713.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940" alt="">
                            <img src="https://images.pexels.com/photos/373882/pexels-photo-373882.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940" alt="">
                            <img src="https://images.pexels.com/photos/2253836/pexels-photo-2253836.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940" alt="">
                            <img src="https://images.pexels.com/photos/3522515/pexels-photo-3522515.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940" alt="">
                        </div>
                    </div>

                </div>
                <div class="col-md-5">
                    <div class="box-title">
                        <h2>{{ $product->name }}</h2>
                        <p class="product-code"> Mã: {{ (isset($product->sku)) ? "$product->sku" : "" }}</p>
                        <p class="summary-desciption">{{ $product->summary }}</p>
                        <p class="price">{{  number_format($product->sale,0,",",".") }}Đ</p>
                        <div class="form-group d-flex quantity">
                            <button class="minus"><i class="fas fa-minus"></i> </button>
                            <input type="number" name="quantity" value="1">
                            <button class="plus"> <i class="fas fa-plus"></i></button>
                        </div>
                        <button class="btn-custom-01 btn-add-card" data-id="{{ $product->id }}"> <span>Thêm vào giỏ hàng</span>  </button>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-9">
                    <div class="product-desc">
                        <h3> Thông tin chi tiết sản phẩm  </h3>
                        <div class="content">
                            @if($product->description != null)
                                {!! $product->description !!}
                            @else
                                    LEPIRONIA ARTICULATA GRASS MAT  (65 X 185 CM, SINGLE, L)

                                    ĐỆM CỎ BÀNG ĐƠN (65 X 185 CM)

                                    Price giá: 450,000 đ

                                    Kích thước: 180cm x 65cm

                                    Chất liệu: cỏ bàng

                                    Độ bền: 4-5 năm

                                    Thảm cỏ bàng được thiết kế dành giới văn phòng ngủ nghỉ trưa tại công ty. Sản phẩm được đan bằng tay, nằm mát. Dễ dàng cuộn tròn lại đặt ở góc phòng hoặc mang đi.

                                    Bạn  cũng có thể đặt đệm cỏ  bàng theo kích thước, quy cách nhà hay không gian bạn cần. Hãy inbox Lại Đây để nhập chiều dài và rộng tấm đệm mà bạn muốn đặt: info@laidayrefill.com
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <div class="product-relation">
                <h3> Có thể bạn quan tâm  </h3>
                <div class="list-product">
                    @foreach($relateProduct as $item)
                        <div class="product product-{{ $item->id }}">
                            <div class="img">
                                <img src="{{ asset($item->image) }}" alt="{{ $item->slug }}" class="img-fluid">
                                <span class="price">{{  number_format($item->sale,0,",",".") }}Đ</span>
                                <span class="new">NEW</span>
                            </div>
                            <p class="name">{{ $item->name }}</p>
                            <div class="tools">
                                <button class="btn-custom-01 btn-add-card" data-id="{{ $product->id }}"> <span>Mua ngay</span>  </button>
                                <a href="{{ route('shop.product.show', [ 'id' => $item->id]) }}"><button class="btn-custom-02"> <span> Xem chi tiết </span> </button></a>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
        </div>
    </div>

@endsection
