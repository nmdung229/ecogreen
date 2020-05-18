@extends('shop.layouts.main')
@section('background')
    <div class="background">
        <img src="https://images.pexels.com/photos/2292919/pexels-photo-2292919.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940" alt="" class="img-fluid">
    </div>
@endsection
@section('content')


    <div class="banner">
        <div class="container">
            <div class="img">

            </div>
            <div class="content">
                <p> Chi tiết </p>
                <h2> Giỏ hàng của bạn</h2>
            </div>
        </div>
    </div>
    <div class="card-details">
        <div class="container">
            <h2> Danh sách sản phẩm </h2>
            <?php $total = 0; $vat = 0; ?>
            <div class="row">
                <div class="col-md-8">
                    <div class="product-buy">
                        @foreach($result as $key => $item)
                            <?php $total += $item['product']->sale*$item['quantity'];  ?>
                            <div class="product product-{{ $item['product']->id }}" data-id = "{{ $item['product']->id }}">
                                <div class="img">
                                    <img src="{{ asset($item['product']->image) }}" alt="{{ $item['product']->slug }}">
                                </div>
                                <div class="content">
                                    <div class="info">
                                        <p class="product-name">  {{ $item['product']->name }} </p>
                                        <p class="price"> <span class="old">{{number_format($item['product']->price,0,",",".") }}Đ </span> &nbsp {{number_format($item['product']->sale,0,",",".") }}Đ</p>
                                        <p class="text-uppercase"> Số lượng</p>
                                        <div class="form-group d-flex quantity">

                                            <button class="minus"><i class="fas fa-minus"></i> </button>
                                            <input type="number" name="quantity" value="{{ $item['quantity'] }}">
                                            <button class="plus"> <i class="fas fa-plus"></i></button>
                                        </div>
                                    </div>
                                    <div class="money-product">
                                        <p> Thành tiền: <span class="money">{{number_format($item['product']->sale*$item['quantity'],0,",",".") }}Đ</span></p>
                                    </div>
                                </div>
                                <a href="javascript:void(0)" onclick="removeItemfromCart({{ $item['product']->id }})" ><button class="delete"><i class="fas fa-times"></i></button></a>
                            </div>
                        @endforeach


                    </div>
                </div>
                <div class="col-md-4">
                    <div class="pay">
                        <p class="d-flex justify-content-between">
                            <span> Tổng số tiền: </span>
                            <span><?php echo number_format($total,0,",",".") . 'Đ'  ?></span>
                        </p>
                        <p class="d-flex justify-content-between">
                            <span> VAT: </span>
                            <span><?php echo number_format($vat,0,",",".") . 'Đ'  ?></span>
                        </p>
                        <p class="d-flex justify-content-between sum-money">
                            <span> Tổng số tiền: </span>
                            <span class="money"><?php echo number_format($total+$vat,0,",",".") . 'Đ'  ?></span>
                        </p>
                        <a href="#"><button>Tiến hành đặt hàng</button></a>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <div class="product-relation">
        <div class="container">
            <h3> Có thể bạn quan tâm  </h3>
            <div class="list-product">
                <div class="product">
                    <div class="img">
                        <img src="https://static.wixstatic.com/media/651a17_a89994a4d8f04f35a5c450ffc7c44e0e~mv2.jpg/v1/fill/w_370,h_370,al_c,q_80,usm_0.66_1.00_0.01/651a17_a89994a4d8f04f35a5c450ffc7c44e0e~mv2.webp" alt="" class="img-fluid">
                        <span class="price"> 99.000Đ </span>
                        <span class="new"> NEW </span>
                    </div>
                    <p class="name">Bột giặt thân thiện</p>
                    <div class="tools">
                        <button class="btn-custom-01"> <span>Mua ngay</span>  </button>
                        <button class="btn-custom-02"> <span> Xem chi tiết </span> </button>
                    </div>
                </div>

                <div class="product">
                    <div class="img">
                        <img src="https://static.wixstatic.com/media/c57a90_38d2f428874945b3b1cf339936e66660~mv2.jpg/v1/fill/w_370,h_370,al_c,q_80,usm_0.66_1.00_0.01/c57a90_38d2f428874945b3b1cf339936e66660~mv2.webp" alt="" class="img-fluid">
                        <span class="price"> 490.000Đ </span>
                        <span class="new"> NEW </span>
                    </div>
                    <p class="name">Bình thủy tinh refil 10l</p>
                    <div class="tools">
                        <button class="btn-custom-01"> <span>Mua ngay</span>  </button>
                        <button class="btn-custom-02"> <span> Xem chi tiết </span> </button>
                    </div>
                </div>

                <div class="product">
                    <div class="img">
                        <img src="https://static.wixstatic.com/media/651a17_d757f7f1c629422aa7e62d66d6e2db3e~mv2.jpg/v1/fill/w_370,h_370,al_c,q_80,usm_0.66_1.00_0.01/651a17_d757f7f1c629422aa7e62d66d6e2db3e~mv2.webp" alt="" class="img-fluid">
                        <span class="price"> 150.000Đ </span>
                        <span class="new"> NEW </span>
                    </div>
                    <p class="name">Nếp thơm cao cấp</p>
                    <div class="tools">
                        <button class="btn-custom-01"> <span>Mua ngay</span>  </button>
                        <button class="btn-custom-02"> <span> Xem chi tiết </span> </button>
                    </div>
                </div>
                <div class="product">
                    <div class="img">
                        <img src="https://static.wixstatic.com/media/651a17_a89994a4d8f04f35a5c450ffc7c44e0e~mv2.jpg/v1/fill/w_370,h_370,al_c,q_80,usm_0.66_1.00_0.01/651a17_a89994a4d8f04f35a5c450ffc7c44e0e~mv2.webp" alt="" class="img-fluid">
                        <span class="price"> 99.000Đ </span>
                        <span class="new"> NEW </span>
                    </div>
                    <p class="name">Bột giặt thân thiện</p>
                    <div class="tools">
                        <button class="btn-custom-01"> <span>Mua ngay</span>  </button>
                        <button class="btn-custom-02"> <span> Xem chi tiết </span> </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
