<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title> Đăng nhập </title>
    <link href="https://fonts.googleapis.com/css?family=Gotu|Montserrat:200,300,400,500,600,700|Quicksand:300,400,500,600|Source+Code+Pro:300,400,500,600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/frontend/css/login.css">
</head>
<body>
<div class="login-form">
    <div class="login-top">
        <h2> <b>Eco Green</b> </h2>
        <div class="img-logo">
            <img src="/frontend/img/Laiday Refill Logo-03.webp" alt="">
        </div>
    </div>
    @if(count($errors) > 0)

            @foreach($errors->all() as $error)
                <p style="color: red;"> {{ $error }}</p>
            @endforeach

    @endif
    @if(session('status'))
        <ul>
            <li> {{ session('status') }}</li>
        </ul>
    @endif
    <form action="{{route('postLogin')}}" method="post" role="form">
        {{ csrf_field() }}
        <div class="login">
            <div class="form-group">
                <p> Tài khoản </p>
                <input type="email" name="email" placeholder="abc@gmail.com">
            </div>
            <div class="form-group">
                <p> Mật khẩu </p>
                <input type="password" name="password" placeholder="Nhập mật khẩu tại đây">
            </div>
            <div class="form-group">
                <p class="forgot-password"> <a href=""> Quên mật khẩu?</a></p>
            </div>
        </div>
        <div class="login-footer">
            <button type="submit"> Đăng nhập </button>
            <p> <a href="{{ route('getCreateMembership') }}"> Bạn chưa có tài khoản? </a></p>
        </div>
    </form>
</div>
</body>
</html>
