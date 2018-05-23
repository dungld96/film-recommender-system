
@extends('layouts.film')

 @section('content')

 <div class="container">
  <div class="container_wrap">
    <div class="header_top">
      <div class="col-sm-3 logo"><a href="{{ route('home') }}"><img src="{{asset('movie/images/logo.png')}}" alt=""/></a></div>
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
     <h1 class="m_2">Tất cả phim</h1>
     <div class="search">
    {{-- <form>
      <input type="text" value="Search..." onfocus="this.value='';" onblur="if (this.value == '') {this.value ='';}">
      <input type="submit" value="">
    </form> --}}
  </div>
  <div class="clearfix"> </div>
</div>
<div class="box_2 row">
  @foreach ($objMovies as $m)

  <div class="col-md-3 movie-1-4">
    <a href="{{route('single-film',['movie_id' => $m->movieId])}}"><img src="{{asset('movie/images/pic1.jpg')}}" class="img-responsive" alt=""/></a>
    <div class="caption1">
      <ul class="list_3">
        <li><i class="icon5"> </i><p>3,548</p></li>
      </ul>
      <i class="icon4"> </i>
      <p class="m_3"><a href="{{route('single-film',['movie_id' => $m->movieId])}}">{{$m->title}}</a></p>
    </div>
  </div>
  @endforeach
  <!-- paginate -->
  <div class="col-md-12">
    <!--pagination-->
    <div class="text-center">
      {!! $objMovies->links() !!}
    </div>
    <!--pagination-->
  </div>
</div>
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





