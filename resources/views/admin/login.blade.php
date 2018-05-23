@extends('layouts.film')

@section('content')
<div class="container">
        <div class="container_wrap">
            <div class="header_top">
                <div class="col-sm-3 logo"><a href="index.html"><img src="images/logo.png" alt=""/></a></div>
                <div class="col-sm-6 nav">
                    <!-- <ul>
                        <li> <span class="simptip-position-bottom simptip-movable" data-tooltip="comic"><a href="movie.html"> </a></span></li>
                        <li><span class="simptip-position-bottom simptip-movable" data-tooltip="movie"><a href="movie.html"> </a> </span></li>
                        <li><span class="simptip-position-bottom simptip-movable" data-tooltip="video"><a href="movie.html"> </a></span></li>
                        <li><span class="simptip-position-bottom simptip-movable" data-tooltip="game"><a href="movie.html"> </a></span></li>
                        <li><span class="simptip-position-bottom simptip-movable" data-tooltip="tv"><a href="movie.html"> </a></span></li>
                        <li><span class="simptip-position-bottom simptip-movable" data-tooltip="more"><a href="movie.html"> </a></span></li>
                    </ul> -->
                </div>
                <div class="col-sm-3 header_right">
                    <!-- <ul class="header_right_box">
                        <li><img src="images/p1.png" alt=""/></li>
                        <li><p><a href="login.html">Carol Varois</a></p></li>
                        <li class="last"><i class="edit"> </i></li>
                        <div class="clearfix"> </div>
                    </ul> -->
                </div>
                <div class="clearfix"> </div>
            </div>
            <div class="content">
                <div class="register">
                    <div class="col-md-offset-4 login-right login-admin">
                        <h3>Quản trị hệ thống gợi ý phim</h3>
                        <p>Vui lòng điền thông tin tài khoản quản trị</p>
                        <form action="{{ route('admin-login') }}" method="POST" role="form">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <div>
                                <span>Email<label>*</label></span>
                                <input type="text" name="email" class="input-form"> 
                            </div>
                            <div>
                                <span>Password<label>*</label></span>
                                <input type="password" class="input-form" name="password" > 
                            </div>
                            <a class="forgot" href="#">Forgot Your Password?</a>
                            <button type="submit" class="acount-btn" style="border: none">Đăng nhập</button>
                        </form>
                    </div>  
                    <div class="clearfix"> </div>
                </div>
            </div>
        </div>
    </div>
@endsection