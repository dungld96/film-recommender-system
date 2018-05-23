@extends('layouts.film')

@section('content')

<div class="container">
  <div class="container_wrap">
    <div class="header_top">
      <div class="col-sm-3 logo"><a href="#"><img src="{{asset('movie/images/logo.png')}}" alt=""/></a></div>
      <div class="col-sm-6 nav">
        <ul>
         <li> <span class="simptip-position-bottom simptip-movable" data-tooltip="comic"><a href="#"> </a></span></li>
         <li><span class="simptip-position-bottom simptip-movable" data-tooltip="movie"><a href="{{ route('movies') }}"> </a> </span></li>
         <li><span class="simptip-position-bottom simptip-movable" data-tooltip="video"><a href="#"> </a></span></li>
         <li><span class="simptip-position-bottom simptip-movable" data-tooltip="game"><a href="#"> </a></span></li>
         <li><span class="simptip-position-bottom simptip-movable" data-tooltip="tv"><a href="#"> </a></span></li>
         <li><span class="simptip-position-bottom simptip-movable" data-tooltip="more"><a href="#"> </a></span></li>
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
  <div class="slider">
   <div class="callbacks_container">
    <ul class="rslides" id="slider">
      <li><img src="{{asset('movie/images/banner.jpg')}}" class="img-responsive" alt=""/>
        <div class="button">
          <a href="#" class="hvr-shutter-out-horizontal">Watch Now</a>
        </div>
      </li>
      <li><img src="{{asset('movie/images/banner1.jpg')}}" class="img-responsive" alt=""/>
        <div class="button">
          <a href="#" class="hvr-shutter-out-horizontal">Watch Now</a>
        </div>
      </li>
      <li><img src="{{asset('movie/images/banner2.jpg')}}" class="img-responsive" alt=""/>
        <div class="button">
          <a href="#" class="hvr-shutter-out-horizontal">Watch Now</a>
        </div>
      </li>
    </ul>
  </div>
  <div class="banner_desc">
    <div class="col-md-9">
      <ul class="list_1">
        <li>Published <span class="m_1">Feb 20, 2015</span></li>
        <li>Updated <span class="m_1">Feb 20 2015</span></li>
        <li>Rating <span class="m_1"><img src="{{asset('movie/images/rating.png')}}" alt=""/></span></li>
      </ul>
    </div>
    <div class="col-md-3 grid_1">
      <ul class="list_1 list_2">
        <li><i class="icon1"> </i><p>2,548</p></li>
        <li><i class="icon2"> </i><p>215</p></li>
        <li><i class="icon3"> </i><p>546</p></li>
      </ul>
    </div>
  </div>
</div>

<div class="content">
  @if (Auth::guest())
  <h1 class="recent recommender">Phim mới cập nhật</h1>
  <ul id="flexiselDemo1">
    <li><img src="{{asset('movie/images/8.jpg')}}" class="img-responsive"/><div class="grid-flex"><a href="#">Syenergy 2mm</a><p>22.10.2014 | 14:40</p></div></li>
    <li><img src="{{asset('movie/images/7.jpg')}}" class="img-responsive"/><div class="grid-flex"><a href="#">Surf Yoke</a><p>22.01.2015 | 14:40</p></div></li>
    <li><img src="{{asset('movie/images/6.jpg')}}" class="img-responsive"/><div class="grid-flex"><a href="#">Salty Daiz</a><p>22.10.2013 | 14:40</p></div></li>
    <li><img src="{{asset('movie/images/1.jpg')}}" class="img-responsive"/><div class="grid-flex"><a href="#">Cheeky Zane</a><p>22.10.2014 | 14:40</p></div></li>
    <li><img src="{{asset('movie/images/2.jpg')}}" class="img-responsive"/><div class="grid-flex"><a href="#">Synergy</a><p>22.10.2013 | 14:40</p></div></li>
    <li><img src="{{asset('movie/images/7.jpg')}}" class="img-responsive"/><div class="grid-flex"><a href="#">Surf Yoke</a><p>22.01.2015 | 14:40</p></div></li>
    <li><img src="{{asset('movie/images/6.jpg')}}" class="img-responsive"/><div class="grid-flex"><a href="#">Salty Daiz</a><p>22.10.2013 | 14:40</p></div></li>
    <li><img src="{{asset('movie/images/7.jpg')}}" class="img-responsive"/><div class="grid-flex"><a href="#">Surf Yoke</a><p>22.01.2015 | 14:40</p></div></li>
    <li><img src="{{asset('movie/images/6.jpg')}}" class="img-responsive"/><div class="grid-flex"><a href="#">Salty Daiz</a><p>22.10.2013 | 14:40</p></div></li>
    <li><img src="{{asset('movie/images/7.jpg')}}" class="img-responsive"/><div class="grid-flex"><a href="#">Surf Yoke</a><p>22.01.2015 | 14:40</p></div></li>
    <li><img src="{{asset('movie/images/6.jpg')}}" class="img-responsive"/><div class="grid-flex"><a href="#">Salty Daiz</a><p>22.10.2013 | 14:40</p></div></li>
  </ul>
  @else
  <h1 class="recent recommender">Phim gợi ý cho bạn</h3>
   <ul id="flexiselDemo3">
    @foreach ($data as $movies)
    <li style="height:100%">
      <a href="{{route('single-film',['movie_id' => $movies['movieId']])}}"><img src="{{empty($movies['image']) ? asset('movie/images/8.jpg') : $movies['image']}}" class="img-responsive"/></a>
      <div class="grid-flex"><a href="{{route('single-film',['movie_id' => $movies['movieId']])}}">{{empty($movies['title']) ? "No Name" : $movies['title']}}</a><p>{{empty($movies['datepublished']) ? "Không rõ" : $movies['datepublished']}} | 1h 47p</p></div>
    </li>
    @endforeach
  </ul>
  @endif
</div>
<div class="content">
  <div class="box_1">
   <h1 class="m_2">Phim được xem nhiều</h1>
   <div class="search">
    {{-- <form>
      <input type="text" value="Search..." onfocus="this.value='';" onblur="if (this.value == '') {this.value ='';}">
      <input type="submit" value="">
    </form> --}}
  </div>
  <div class="clearfix"> </div>
</div>
<div class="box_2">
  <div class="col-md-5 grid_3">
    <div class="row_1">
      <div class="col-md-6 grid_4"><a href="#">
        <div class="grid_2">
          <img src="{{asset('movie/images/pic1.jpg')}}" class="img-responsive" alt=""/>
          <div class="caption1">
            <ul class="list_3">
              <li><i class="icon5"> </i><p>3,548</p></li>
            </ul>
            <i class="icon4"> </i>
            <p class="m_3">Guardians of the Galaxy</p>
          </div>
        </div>
        <div class="grid_2 col_1">
          <img src="{{asset('movie/images/pic2.jpg')}}" class="img-responsive" alt=""/>
          <div class="caption1">
            <ul class="list_3">
              <li><i class="icon5"> </i><p>3,548</p></li>
            </ul>
            <i class="icon4"> </i>
            <p class="m_3">Guardians of the Galaxy</p>
          </div>
        </div>
      </a></div>
      <div class="col-md-6 grid_7">
       <div class="col_2">
        <ul class="list_4">
          <li><i class="icon1"> </i><p>2,548</p></li>
          <li><i class="icon2"> </i><p>215</p></li>
          <li><i class="icon3"> </i><p>546</p></li>
          <li>Rating : &nbsp;&nbsp;<p><img src="{{asset('movie/images/rating1.png')}}" alt=""/></p></li>
          <li>Release Date : &nbsp;<span class="m_4">Mar 15, 2015</span> </li>
          <div class="clearfix"> </div>
        </ul>
        <div class="m_5"><a href="#"><img src="{{asset('movie/images/pic3.jpg')}}" class="img-responsive" alt=""/></a></div>
      </div>
    </div>
    <div class="clearfix"> </div>
  </div>
  <div class="row_2">
    <a href="#"><img src="{{asset('movie/images/pic4.jpg')}}" class="img-responsive" alt=""/></a>
  </div>
</div>
<div class="col-md-5 content_right">
 <div class="row_3">
  <div class="col-md-6 content_right-box"><a href="#">
    <div class="grid_2">
      <img src="{{asset('movie/images/pic6.jpg')}}" class="img-responsive" alt=""/>
      <div class="caption1">
        <ul class="list_5">
          <li><i class="icon5"> </i><p>3,548</p></li>
        </ul>
        <i class="icon4 icon6"> </i>
        <p class="m_3">Guardians of the Galaxy</p>
      </div>
    </div>
  </a></div>
  <div class="col-md-6 grid_5"><a href="#">
    <div class="grid_2">
      <img src="{{asset('movie/images/pic7.jpg')}}" class="img-responsive" alt=""/>
      <div class="caption1">
        <ul class="list_5">
          <li><i class="icon5"> </i><p>3,548</p></li>
        </ul>
        <i class="icon4 icon6"> </i>
        <p class="m_3">Guardians of the Galaxy</p>
      </div>
    </div>
  </a></div>
  <div class="clearfix"> </div>
</div>
<div class="video">
  <iframe width="100%" height="" src="https://www.youtube.com/embed/s1QeoSedWmM" frameborder="0" allowfullscreen></iframe>
</div>
<div class="row_5">
  <div class="col-md-6">
    <div class="col_2">
      <ul class="list_4">
        <li><i class="icon1"> </i><p>2,548</p></li>
        <li><i class="icon2"> </i><p>215</p></li>
        <li><i class="icon3"> </i><p>546</p></li>
        <li>Rating : &nbsp;&nbsp;<p><img src="{{asset('movie/images/rating1.png')}}" alt=""></p></li>
        <div class="clearfix"> </div>
      </ul>

    </div>
  </div>
  <div class="col-md-6 m_6"><a href="#">
    <img src="{{asset('movie/images/pic8.jpg')}}" class="img-responsive" alt=""/>
  </a></div>
</div>
</div>
<div class="col-md-2 grid_6">
  <div class="m_7"><a href="#"><img src="{{asset('movie/images/pic9.jpg')}}" class="img-responsive" alt=""/></a></div>
  <div class="caption1">
    <ul class="list_5">
      <li><i class="icon5"> </i><p>3,548</p></li>
    </ul>
    <i class="icon4 icon6"> </i>
    <p class="m_3">Guardians of the Galaxy</p>
  </div>
  <div class="col_2 col_3">
    <ul class="list_4">
      <li><i class="icon1"> </i><p>2,548</p></li>
      <li><i class="icon2"> </i><p>215</p></li>
      <li><i class="icon3"> </i><p>546</p></li>
      <li>Rating : &nbsp;&nbsp;<p><img src="{{asset('movie/images/rating1.png')}}" alt=""></p></li>
      <li>Release : &nbsp;<span class="m_4">Mar 15, 2015</span> </li>
      <div class="clearfix"> </div>
    </ul>
    <div class="m_8"><a href="#"><img src="{{asset('movie/images/pic10.jpg')}}" class="img-responsive" alt=""/></a></div>
  </div>
</div>
<div class="clearfix"> </div>
</div>
</div>
</div>
</div>
<script type="text/javascript">
  $(function(){
    $(".logout").click(function(event){
      event.preventDefault();

      alert( "Bạn có muốn đăng xuất không" );
      $('#logout-form').submit();
    });
    
  });

  $(window).load(function() {
    $("#flexiselDemo3").flexisel({
      visibleItems: 5,
      animationSpeed: 1000,
      autoPlay: true,
      autoPlaySpeed: 3000,        
      pauseOnHover: true,
      enableResponsiveBreakpoints: true,
      responsiveBreakpoints: { 
        portrait: { 
          changePoint:480,
          visibleItems: 1
        }, 
        landscape: { 
          changePoint:640,
          visibleItems: 2
        },
        tablet: { 
          changePoint:768,
          visibleItems: 3
        }
      }
    });

  });
  $(window).load(function() {
    $("#flexiselDemo1").flexisel({
      visibleItems: 4,
      animationSpeed: 1000,
      autoPlay: true,
      autoPlaySpeed: 3000,        
      pauseOnHover: true,
      enableResponsiveBreakpoints: true,
      responsiveBreakpoints: { 
        portrait: { 
          changePoint:480,
          visibleItems: 1
        }, 
        landscape: { 
          changePoint:640,
          visibleItems: 2
        },
        tablet: { 
          changePoint:768,
          visibleItems: 3
        }
      }
    });

  });
</script>

@endsection





