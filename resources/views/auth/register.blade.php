@extends('layouts.film')

@section('content')
<div class="container">
    <div class="container_wrap">
        <div class="header_top">
            <div class="col-sm-3 logo"><a href="index.html"><img src="{{asset('movie/images/logo.png')}}" alt=""/></a></div>
            <div class="col-sm-6 nav">
                <ul>
                    <li> <span class="simptip-position-bottom simptip-movable" data-tooltip="comic"><a href="movie.html"> </a></span></li>
                    <li><span class="simptip-position-bottom simptip-movable" data-tooltip="movie"><a href="movie.html"> </a> </span></li>
                    <li><span class="simptip-position-bottom simptip-movable" data-tooltip="video"><a href="movie.html"> </a></span></li>
                    <li><span class="simptip-position-bottom simptip-movable" data-tooltip="game"><a href="movie.html"> </a></span></li>
                    <li><span class="simptip-position-bottom simptip-movable" data-tooltip="tv"><a href="movie.html"> </a></span></li>
                    <li><span class="simptip-position-bottom simptip-movable" data-tooltip="more"><a href="movie.html"> </a></span></li>
                </ul>
            </div>
            <div class="col-sm-3 header_right">
                <ul class="header_right_box">
                    <!-- Authentication Links -->
                    @if (Auth::guest())
                    <li><p><a href="{{ route('login') }}">Đăng nhập</a></p></li>
                    <li><p>/</p></li>
                    <li><p><a href="{{ route('register') }}">Đăng ký</a></p></li>
                    @else
                    <li class="dropdown">
                      <p class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><a href="#" >
                        {{ Auth::user()->name }} <span class="caret"></span>
                    </a></p>

                    <ul class="dropdown-menu" role="menu">
                        <li>
                          <p class="text-center"><a href="{{ route('logout') }}" class="logout">
                            Đăng xuất
                        </a></p>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    </li>
                </ul>
            </li>
            @endif

            <div class="clearfix"> </div>
        </ul>
    </div>
    <div class="clearfix"> </div>
</div>
<div class="content">
    <div class="row">
        <div class="register">
            <form class="form-horizontal" method="POST" action="{{ url('register_save') }}">
                {{ csrf_field() }}
                <div class="register-top-grid  col-md-offset-3">
                    <h3 >Đăng ký tài khoản</h3>
                    
                    <div class="form-group">
                        <span>Họ Tên<label>*</label></span>
                        <input type="text" class="form-control" id="InputName"  name="name" placeholder="Họ tên">
                    </div>
                    <div class="form-group">
                        <span>Email<label>*</label></span>
                        <input type="text" class="form-control" id="InputEmail"  name="email" aria-describedby="emailHelp" placeholder="Enter email">
                    </div>
                    <div class="form-group">
                        <span>Mật khẩu<label>*</label></span>
                        <input type="password" id="InputPassword"  name="password" placeholder="Mật khẩu">
                    </div>
                    <div class="form-group">
                        <span>Nhập lại mật khẩu<label>*</label></span>
                        <input type="password" id="InputConfirmPassword" name="confirm-password" placeholder="Nhập lại mật khẩu">
                    </div>

                    <div class="clearfix"> </div>
                    <div class="register-but">
                        <button type="submit" class="btn btn-primary">ĐĂNG KÝ</button>
                        <div class="clearfix"> </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
</div>
</div>
@endsection
