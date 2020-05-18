@extends('shop.layouts.main')
@section('background')
    <div class="background">
        <img src="https://images.pexels.com/photos/1230157/pexels-photo-1230157.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940" alt="" class="img-fluid">
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
    <div class="box-blog">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="list-blog">
                        @foreach($posts as $post)
                            <div class="blog-item" data-id="{{ $post->id }}">
                                <div class="img">
                                    <img src="{{ asset($post->thumbnail) }}" alt="{{ $post->slug }}" class="img-fluid">
{{--                                    <span> NOTE </span>--}}
                                </div>
                                <div class="content">
                                    <h2>{{ $post->title }}</h2>
                                    <p class="post-item">
                                        <span><?php $create = date('M d, Y', strtotime($post->created_at)); echo $create ?></span>
                                        <span> by </span>
                                        <span>{{ \App\User::findorFail($post->user_id)->name }}</span>
                                    </p>
                                    <p class="sumary-content">
                                        {!! $post->summary !!}
                                    </p>
                                    <a href="{{ route('blog.detail', [ 'id' => $post->id]) }}"><button> Xem thêm </button></a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="box-left-blog">
                        <div class="box-header">
                            <h3 class="featured-header"> Bài viết mới </h3>
                        </div>
                        @foreach($features as $item)
                            <div class="new-item">
                                <div class="img">
                                    <img src="{{ asset($item->thumbnail) }}" alt="{{ $item->title }}" class="img-fluid">
                                </div>
                                <div class="content">
                                    <p class="title"> <a href="{{ route('blog.detail', [ 'id' => $item->id]) }}" class="title-featured">{{ $item->title }}</a> </p>
                                    <p class="post-item">
                                        <span class="time-created"><?php $create = date('M d, Y', strtotime($item->created_at)); echo $create ?></span>
                                        <span class="authorname"> by {{ \App\User::findorFail($item->user_id)->name }}</span>
                                    </p>
                                </div>
                            </div>
                        @endforeach

                    </div>

                    <div class="box-left-blog">
                        <div class="box-header">
                            <h3> Tag </h3>
                        </div>
                        <div class="list-tag">
                            <span> Môi trường </span>
                            <span> Ô nhiễm </span>
                            <span> Sức khỏe </span>
                            <span> CO2</span>
                            <span> Sống xanh</span>
                            <span> Sống tối giản</span>
                        </div>

                    </div>
                    <div class="box-left-blog">
                        <div class="box-header">
                            <h3> </h3>
                        </div>
                        <div class="list-img">
{{--                            <a href="#"> <img src="https://images.pexels.com/photos/1108572/pexels-photo-1108572.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940" alt=""></a>--}}
{{--                            <a href="#"> <img src="https://images.pexels.com/photos/1108572/pexels-photo-1108572.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940" alt=""></a>--}}
{{--                            <a href="#"> <img src="https://images.pexels.com/photos/3184291/pexels-photo-3184291.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940" alt=""></a>--}}
{{--                            <a href="#"> <img src="https://images.pexels.com/photos/1108572/pexels-photo-1108572.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940" alt=""></a>--}}
{{--                            <a href="#"> <img src="https://images.pexels.com/photos/3184291/pexels-photo-3184291.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940" alt=""></a>--}}

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
