@extends('shop.layouts.main');
@section('background')

    <div class="background">
        <img src="https://images.pexels.com/photos/132037/pexels-photo-132037.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940d" alt="" class="img-fluid">
    </div>

@endsection
@section('content')

    <div class="banner">
        <div class="container">
            <div class="img">

            </div>
            <div class="content">
                <p> Một thứ gì đó</p>
                <h2> Cùng nhau tạo nên cuộc sống xanh-sạch-đẹp</h2>
            </div>
        </div>
    </div>
    <div class="box-product ">
        <div class="container">
            <div class="title">
            </div>
            <div class="row">
                <div class="col-md-3">
                    <div class="category">
                        <ul>

                            @foreach($categories as $key => $category)
                                <li><a href="{{ route('shop.product.byCategory', [ 'id' => $category->id ]) }}" id="category-name"> {{ $category->name }}<span>{{ $quantityPerCategory[$key] }}</span></a></li>
                            @endforeach

{{--                            <li class="active"> Đồ gia dụng <span> 6</span></li>--}}
{{--                            <li> Đồ công nghệ <span>20</span></li>--}}
{{--                            <li> Đô văn dùng <span> 30</span></li>--}}
{{--                            <li> Đồ dùng cá nhân <span>21</span></li>--}}
                        </ul>
                    </div>

                </div>
                <div class="col-md-9">
                    <div class="title">
                        <h2> Tất cả sản phẩm </h2>
                        <div>
                            <select name="#" id="">
                                <option value="0"> Sắp xếp theo </option>
                                <option value="0"> Sản phẩm mới </option>
                                <option value="0"> Giá cao đến thấp</option>
                                <option value="0"> Giá thấp đến cao </option>
                            </select>
                        </div>

                    </div>
                    <div class="list-product">
                        @foreach($products as $item)
                            @if($item->stock == 0)
                                <div class="product" id="product-{{ $item->id }}">
                                    <div class="img">
                                        <img src="{{ asset($item->image) }}" alt="" class="img-fluid">
                                        <span class="price"> {{ number_format($item->sale,0,",",".") }}Đ </span>

                                        <span class="soldOut"> SOLD OUT </span>





                                    </div>
                                    <p class="name">{{ $item->name }}</p>
                                    <div class="tools">
                                        <button class="btn-custom-01 btn-add-card" data-id = "{{ $item->id }}" disabled> <span>Mua ngay</span>  </button>
                                        <a href=" {{ route('shop.product.show', [ 'id' => $item->id]) }}"><button class="btn-custom-02"> <span> Xem chi tiết </span> </button></a>
                                    </div>
                                </div>
                            @else
                                <div class="product" id="product-{{ $item->id }}">
                                    <div class="img">
                                        <img src="{{ asset($item->image) }}" alt="" class="img-fluid">
                                        <span class="price"> {{ number_format($item->sale,0,",",".") }}Đ </span>



                                        <span class="new"> NEW </span>



                                    </div>
                                    <p class="name">{{ $item->name }}</p>
                                    <div class="tools">
                                        <button class="btn-custom-01 btn-add-card" data-id = "{{ $item->id }}"> <span>Mua ngay</span>  </button>
                                        <a href=" {{ route('shop.product.show', [ 'id' => $item->id]) }}"><button class="btn-custom-02"> <span> Xem chi tiết </span> </button></a>
                                    </div>
                                </div>
                            @endif



                        @endforeach

{{--                        <div class="product">--}}
{{--                            <div class="img">--}}
{{--                                <img src="https://static.wixstatic.com/media/651a17_a89994a4d8f04f35a5c450ffc7c44e0e~mv2.jpg/v1/fill/w_370,h_370,al_c,q_80,usm_0.66_1.00_0.01/651a17_a89994a4d8f04f35a5c450ffc7c44e0e~mv2.webp" alt="" class="img-fluid">--}}
{{--                                <span class="price"> 99.000Đ </span>--}}
{{--                                <span class="new"> NEW </span>--}}
{{--                            </div>--}}
{{--                            <p class="name">Bột giặt thân thiện</p>--}}
{{--                            <div class="tools">--}}
{{--                                <button class="btn-custom-01"> <span>Mua ngay</span>  </button>--}}
{{--                                <button class="btn-custom-02"> <span> Xem chi tiết </span> </button>--}}
{{--                            </div>--}}
{{--                        </div>--}}

                    </div>
                    {{ $products->links() }}
{{--                    <ul class="pagination">--}}
{{--                        <li> 1 </li>--}}
{{--                        <li> 2 </li>--}}
{{--                        <li> 3 </li>--}}
{{--                        <li> 4 </li>--}}
{{--                    </ul>--}}
                </div>
            </div>

        </div>

    </div>
    <div class="box-sale">
        <div class="content">
            <p> KHUYẾN MÃI </p>
            <h2>  Super Sale </h2>
            <p class="text-sale"> Ưu đãi nhân đôi săn deal </p>
            <div class="timer">
                <div>
                    <p class="number"> 24 </p>
                    <p> weeks </p>
                </div>
                <div>
                    <p class="number"> 24 </p>
                    <p> weeks </p>
                </div>
                <div>
                    <p class="number"> 24 </p>
                    <p> weeks </p>
                </div>
                <div>
                    <p class="number"> 24 </p>
                    <p> weeks </p>
                </div>
                <div>
                    <p class="number"> 24 </p>
                    <p> weeks </p>
                </div>
                <div>
                    <p class="number"> 24 </p>
                    <p> weeks </p>
                </div>
            </div>
            <button> Xem nhanh</button>
        </div>
    </div>
    <div class="box-product-02">
        <div class="container">
            <div class="title">
{{--                <p> welcome</p>--}}
                <h2> Best Sale Products</h2>
                <p class="content"> Những mặt hàng đang giảm giá cực mạnh, đảm bảo uy tín chất lượng, ...</p>
            </div>
            <div class="products-02">
                <div class="product">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="img">
                                <img src="https://static.wixstatic.com/media/1c272d_30169cc0c8794044aed2cc349a957e95~mv2_d_1500_2250_s_2.jpg/v1/fill/w_291,h_291,al_c,q_80,usm_0.66_1.00_0.01/1c272d_30169cc0c8794044aed2cc349a957e95~mv2_d_1500_2250_s_2.webp" alt="" class="img-fluid">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="content">
                                <span class="number"> 01. </span>
                                <h2> Dầu Hữu Cơ  </h2>
                                <p class="summary-content">
                                    Dầu dừa hữu Cơ ở Ecogreen là sản phẩm dầu dừa nguyên chất thuần hữu cơ và được sản xuất theo phương thức tối ưu nhất đảm bảo thời gian từ lúc thu hoạch đến sản xuất trong vòng từ 2 – 4 giờ theo công nghệ sấy lạnh – ép lạnh.
                                </p>
                                <div class="price">
                                    <p> Giá bán </p>
                                    <span class="old"> 1,000,000Đ</span>
                                    <span class="new"> 400,000Đ</span>
                                </div>
                                <div class="d-flex">
                                    <button class="btn-custom-01"> <span>Xem chi tiết</span>  </button>
                                    <button class="btn-custom-02"> <span>Mua ngay</span> </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="product">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="content">
                                <span class="number"> 02. </span>
                                <h2> Bình Thủy Tinh </h2>
                                <p class="summary-content">
                                    Dầu Dừa hữu cơ ở Ecogreen là sản phẩm dầu dừa nguyên chất thuần hữu cơ và được sản xuất theo phương thức tối ưu nhất đảm bảo thời gian từ lúc thu hoạch đến sản xuất trong vòng từ 2 – 4 giờ theo công nghệ sấy lạnh – ép lạnh.
                                </p>
                                <div class="price">
                                    <p> Giá bán </p>
                                    <span class="old"> 700,000Đ</span>
                                    <span class="new"> 390,000Đ</span>
                                </div>
                                <div class="d-flex">
                                    <button class="btn-custom-01"> <span>Xem chi tiết</span>  </button>
                                    <button class="btn-custom-02"> <span>Mua ngay</span> </button>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="img">
                                <img src="https://static.wixstatic.com/media/1c272d_664112f0244d43ff94fdcd6a53c94fa5~mv2_d_1500_2250_s_2.jpg/v1/fill/w_625,h_938,al_c,q_85,usm_0.66_1.00_0.01/1c272d_664112f0244d43ff94fdcd6a53c94fa5~mv2_d_1500_2250_s_2.webp" alt="" class="img-fluid">
                            </div>
                        </div>

                    </div>
                </div>
                <div class="product">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="img">
                                <img src="https://static.wixstatic.com/media/1c272d_30169cc0c8794044aed2cc349a957e95~mv2_d_1500_2250_s_2.jpg/v1/fill/w_291,h_291,al_c,q_80,usm_0.66_1.00_0.01/1c272d_30169cc0c8794044aed2cc349a957e95~mv2_d_1500_2250_s_2.webp" alt="" class="img-fluid">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="content">
                                <span class="number"> 03. </span>
                                <h2> Dầu Hữu Cơ  </h2>
                                <p class="summary-content">
                                    Dầu Dừa Hữu Cơ ở Lại Đây là sản phẩm dầu dừa nguyên chất thuần hữu cơ và được sản xuất theo phương thức tối ưu nhất đảm bảo thời gian từ lúc thu hoạch đến sản xuất trong vòng từ 2 – 4 giờ theo công nghệ sấy lạnh – ép lạnh.
                                </p>
                                <div class="price">
                                    <p> Giá bán </p>
                                    <span class="old"> 1,000,000Đ</span>
                                    <span class="new"> 400,000Đ</span>
                                </div>
                                <div class="d-flex">
                                    <button class="btn-custom-01"> <span>Xem chi tiết</span>  </button>
                                    <button class="btn-custom-02"> <span>Mua ngay</span> </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <script>

    </script>
@endsection
