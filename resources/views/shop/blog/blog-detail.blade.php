@extends('shop.layouts.main')
@section('background')
    <div class="background">
        <img src="{{ asset($data->thumbnail) }}" alt="" class="img-fluid">
    </div>
@endsection
@section('content')
    <div class="banner blog-banner">
        <div class="container">
            <div class="content">
                <h2 class="container">{{ $data->title }}</h2>
                <p class="container"> <span><?php $create = date('M d, Y', strtotime($data->created_at)); echo $create ?></span> <span> by </span> <span> {{ $author }} </span> </p>
            </div>
        </div>
    </div>
    <div class="link-summary">
        <div class="container">
            <p>
                <a href="/"> Trang chủ </a>
                <span><i class="fas fa-angle-right"></i> </span>
                <a href="{{ route('blog') }}"> Bài viết </a>
                <span> <i class="fas fa-angle-right"></i></span>
                <a href="#"> Chi tiết bài viết </a>
            </p>
        </div>

    </div>
    <div class="content-blog">
{{--        Sáng 6/5, Ban chỉ đạo quốc gia phòng chống dịch Covid-19 họp dưới sự chủ trì của Phó thủ tướng Vũ Đức Đam - Trưởng ban chỉ đạo.--}}

{{--        Sau giai đoạn tập trung chống dịch, cuộc họp lần này bàn về việc tính toán xác suất rủi ro dịch bệnh, nới lỏng một số biện pháp phòng, chống dịch, giãn cách xã hội như: Dự phòng cá nhân, vận tải hành khách, tổ chức hoạt động thi đấu thể thao, sự kiện tập trung đông người nơi công cộng; mở lại một số dịch vụ không thiết yếu…--}}
        <div class="blog-content" style="position: relative; background: #fff!important">
            <div class="container" >
                {!! $data->content !!}
                <div class="author" style="padding: 20px 0;">
                    <p><b><i>Bài viết được đăng tải bởi <?php echo \App\User::findorFail($data->user_id)->name; ?></i></b></p>
                </div>
            </div>
        </div>


{{--        <div class="container" style="position: relative; background: #fff!important">--}}
{{--                {!! $data->content !!}--}}
{{--            </div>--}}
    </div>
@endsection
